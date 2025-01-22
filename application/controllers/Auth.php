<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @property Auth_model $Auth_model
* @property User_model $user_model
* @property CI_Loader $load
* @property CI_Session $session
* @property CI_Input $input
* @property CI_Form_validation $form_validation
 */
class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load models and libraries
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index() {
        // Check if user is already logged in
        if ($this->session->userdata('role')) {
            redirect('dashboard');
        }
        $this->load->view('login');
    }

    public function login() {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->user_model->verify_user($username, $password);
            
            if ($user) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'role' => $user->role
                ]);

                switch($user->role) {
                    case 'admin':
                        redirect('admin/dashboard');
                        break;
                    case 'dosen':
                        redirect('dosen/dashboard');
                        break;
                    case 'mahasiswa':
                        redirect('mahasiswa/dashboard');
                        break;
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('auth');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}