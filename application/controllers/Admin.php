<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Auth_model $Auth_model
 * @property User_model $User_model
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_Loader $load
 * @property Student_model $student_model
 * @property Grade_model $grade_model
 * @property User_model $user_model

 * @property CI_Loader $load
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 */
class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('student_model');
    $this->load->model('grade_model');

    $this->load->library('session');
    $this->load->helper('url');
    $this->load->helper('form');

    if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'admin') {
      redirect('auth');
    }
  }

  public function dashboard()
  {
    
    

    if ($this->session->userdata('role') == 'admin') {
      $this->load->model('User_model');
      $data['admin_count'] = $this->User_model->count_users_by_role('admin');
      $data['dosen_count'] = $this->User_model->count_users_by_role('dosen');
      $data['mahasiswa_count'] = $this->User_model->count_users_by_role('mahasiswa');
      $data['users'] = $this->User_model->get_all_users();
      $this->load->view('admin/dashboard', $data);
    } else {
      echo "Access Denied";
    }


  }

  public function edit_user($id)
  {
      $data['user'] = $this->User_model->get_user_by_id($id);
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $username = $this->input->post('username');
          $password = $this->input->post('password');
  
          $datas = [];
  
          if (!empty($password)) {
              $datas['password'] = password_hash($password, PASSWORD_BCRYPT);
          }
  
          if (!empty($username) && $username !== $data['user']->username) {
              $datas['username'] = $username;
          }
  
          if (!empty($datas)) {
              if ($this->User_model->update_user($id, $datas)) {
                  $this->session->set_flashdata('success', 'User updated successfully.');
                  redirect('admin/dashboard');
                  return;
              } else {
                  $this->session->set_flashdata('error', 'Failed to update user. Please try again.');
              }
          } else {
              $this->session->set_flashdata('info', 'No changes were made to the user.');
          }
      }
  
      $this->load->view('admin/edit_user', $data);
  }
  

  public function delete_user($id)
  {
    $this->load->model('User_model');
    $this->User_model->delete_user($id);
    redirect('admin/dashboard');
  }

  public function add_user()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/add_user');
    } else {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        'role' => $this->input->post('role'),
      );

      // Register user first
      $userRegistered = $this->User_model->register_user($data);

      if ($userRegistered) {
        // If role is mahasiswa, process mahasiswa-specific data
        if ($data['role'] === 'mahasiswa') {
          $this->handle_mahasiswa_registration($data['username']);
        }

        $this->session->set_flashdata('register_success', 'Registration successful! Redirecting to dashboard...');
        redirect('admin/dashboard');
      } else {
        $this->session->set_flashdata('register_error', 'Registration failed. Please try again.');
        redirect('admin/add_user');
      }
    }
  }

 
  private function handle_mahasiswa_registration($username)
  {
    $dataReceived = $this->User_model->get_all_students();

    $filteredData = array_filter($dataReceived, function ($item) use ($username) {
      return $item['username'] === $username;
    });

    $processedResult = array_map(function ($item) {
      return ['mahasiswa_id' => $item['id']];
    }, $filteredData);

    $finalResult = [];
    foreach ($processedResult as $value) {
      $finalResult['mahasiswa_id'] = $value['mahasiswa_id'];
    }

    if (!empty($finalResult)) {
      $this->User_model->register_student($finalResult);

      $dataReceived2 = $this->User_model->get_students();
      $lastResult = array_filter($dataReceived2, function ($item) use ($finalResult) {
        return $item['mahasiswa_id'] === $finalResult['mahasiswa_id'];
      });

      $latestResult = [];
      foreach ($lastResult as $value) {
        $latestResult = [
          'mahasiswa_id' => $value['id'],
          'diskusi' => 0,
          'praktikum' => 0,
          'responsi' => 0,
          'uts' => 0,
          'uas' => 0,
          'nilai' => '',
        ];
      }

      $this->User_model->register_nilaimahasiswa($latestResult);
    }
  }
  

}
