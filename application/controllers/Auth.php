<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Auth_model $Auth_model
 * @property User_model $user_model
 * @property Student_model $student_model
 * @property CI_Loader $load
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 */
class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->library('session');
   
    $this->load->helper('url');
    $this->load->database();

    $this->load->model('Auth_model');
  }

  public function index()
  {
    echo $this->session->userdata('role');
    switch ($this->session->userdata('role')) {
      case 'admin':
        redirect('admin/dashboard');
        break;
      case 'dosen':
        redirect('dosen/dashboard');
        break;
      case 'mahasiswa':
        redirect('mahasiswa/dashboard');
        break;
      default:
        $this->load->view('login');
    }
  }

  public function login()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nim', 'NIM', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login');
    } else {
      $nim = $this->input->post('nim');
      $password = $this->input->post('password');

      $user = $this->Auth_model->validate_user($nim, $password);

      if ($user) {
        $this->session->set_userdata([
          'user_id' => $user->id,
          'role' => $user->role
        ]);

        switch ($user->role) {
          case 'admin':
            redirect('admin/dashboard');
            // echo 'admin';
            break;
          case 'dosen':
            redirect('dosen/dashboard');
            break;
          case 'mahasiswa':
            redirect('mahasiswa/dashboard');
            break;
          default:
            redirect('auth'); 
        }
      } else {
        $this->session->set_flashdata('error', 'Invalid username or password');
        redirect('auth');
      }
    }
  }

  
  public function register()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('register');
    } else {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role' => $this->input->post('role'),
        );

        $user_registered = $this->user_model->register_user($data);

        if ($user_registered) {
            if ($this->input->post('role') == 'mahasiswa') {
                $dataReceived = $this->Auth_model->get_all_students();
                $comparing = $this->input->post('username');
                $filteredData = array_filter($dataReceived, function ($item) use ($comparing) {
                    return $item['username'] === $comparing;
                });

                $processedResult = array_map(function ($item) {
                    return [
                        'mahasiswa_id' => $item['id']
                    ];
                }, $filteredData);

                $finalResult = [];
                foreach ($processedResult as $value) {
                    $finalResult['mahasiswa_id'] = $value['mahasiswa_id'];
                }

                // Register student details
                $student_registered = $this->Auth_model->register_student($finalResult);

                if ($student_registered) {
                    $dataReceived2 = $this->Auth_model->get_students();
                    $lastResult = array_filter($dataReceived2, function ($item) use ($finalResult) {
                        return $item['mahasiswa_id'] === $finalResult['mahasiswa_id'];
                    });

                    $latestResult = [];
                    foreach ($lastResult as $value) {
                        $latestResult['mahasiswa_id'] = $value['id'];
                        $latestResult['diskusi'] = 0;
                        $latestResult['praktikum'] = 0;
                        $latestResult['responsi'] = 0;
                        $latestResult['uts'] = 0;
                        $latestResult['uas'] = 0;
                        $latestResult['nilai'] = '';
                    }

                    // Register nilai mahasiswa
                    $this->Auth_model->register_nilaimahasiswa($latestResult);
                }
            }

            $this->session->set_flashdata('register_success', 'Registration successful! Redirecting to login page...');
            redirect('auth/register');
        } else {
            $this->session->set_flashdata('register_error', 'Registration failed. Please try again.');
            redirect('auth/register');
        }
    }
}


  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }
}
