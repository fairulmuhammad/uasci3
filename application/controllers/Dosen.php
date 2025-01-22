<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @property Auth_model $Auth_model
* @property User_model $User_model
* @property CI_Session $session
* @property CI_Input $input
* @property CI_Form_validation $form_validation
* @property CI_Loader $load
* @property Student_model $student_model
* @property Grade_model $grade_model

* @property CI_Loader $load
* @property CI_Session $session
* @property CI_Input $input
* @property CI_Form_validation $form_validation
 */
class Dosen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load required models
        $this->load->model('student_model');
        $this->load->model('grade_model');
        
        // Load required libraries and helpers
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');

        // Check if user is logged in and is a dosen
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'dosen') {
            redirect('auth');
        }
    }

    public function dashboard() {
        $data['students'] = $this->student_model->get_all_students();
        $this->load->view('dosen/dashboard', $data);
    }

    public function add_grade() {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('diskusi', 'Diskusi', 'required|numeric');
        $this->form_validation->set_rules('praktikum', 'Praktikum', 'required|numeric');
        $this->form_validation->set_rules('responsi', 'Responsi', 'required|numeric');
        $this->form_validation->set_rules('uts', 'UTS', 'required|numeric');
        $this->form_validation->set_rules('uas', 'UAS', 'required|numeric');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('dosen/dashboard');
        } else {
            $data = [
                'diskusi' => $this->input->post('diskusi'),
                'praktikum' => $this->input->post('praktikum'),
                'responsi' => $this->input->post('responsi'),
                'uts' => $this->input->post('uts'),
                'uas' => $this->input->post('uas'),
                'nilai' => $this->input->post('nilai')
            ];

            $student_id = $this->input->post('mahasiswa_id');
            
            if ($this->grade_model->add_or_update_grade($student_id, $data)) {
                $this->session->set_flashdata('success', 'Nilai berhasil ditambahkan/diupdate');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan/mengupdate nilai');
            }
            
            redirect('dosen/dashboard');
        }
    }
}