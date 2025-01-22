<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @property Auth_model $Auth_model
* @property User_model $User_model
* 
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
        $this->load->model('student_model');
        $this->load->model('grade_model');
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');

        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'dosen') {
            redirect('auth');
        }
    }

    public function dashboard() {
        
            $data['mahasiswa_count'] = $this->User_model->count_users_by_role('mahasiswa');
            
            $data['students'] = $this->student_model->get_all_students();
            $mahasiswa_id = array_map(function($student) {
                return $student['id'];
            }, $data['students']);;  
            $data['mahasiswa_scores'] = $this->student_model->get_mahasiswa_scores($mahasiswa_id);
            $this->load->view('dosen/dashboard', $data);

        
            
            
    }
    
    
   
    public function add_grade() {
        // Load form validation library
        $this->load->library('form_validation');
        $this->load->model('grade_model');
        $this->load->model('Student_model');
        
        $this->form_validation->set_rules('diskusi', 'Diskusi', 'required|numeric');
        $this->form_validation->set_rules('praktikum', 'Praktikum', 'required|numeric');
        $this->form_validation->set_rules('responsi', 'Responsi', 'required|numeric');
        $this->form_validation->set_rules('uts', 'UTS', 'required|numeric');
        $this->form_validation->set_rules('uas', 'UAS', 'required|numeric');
        $this->form_validation->set_rules('nilai', 'Nilai Akhir', 'required');

        $data['students'] = $this->student_model->get_all_students();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dosen/dashboard', $data); 
        } else {
            $data = [
                'diskusi' => $this->input->post('diskusi'),
                'praktikum' => $this->input->post('praktikum'),
                'responsi' => $this->input->post('responsi'),
                'uts' => $this->input->post('uts'),
                'uas' => $this->input->post('uas'),
                'nilai' => $this->input->post('nilai'),
                'mahasiswa_id' => $this->input->post('mahasiswa_id')

            ];

            $student_id = $this->input->post('mahasiswa_id');

            echo 'Student ID: ' . $student_id . '<br>';
            echo 'Data: <pre>' . print_r($data, true) . '</pre>';
            if ($this->grade_model->add_or_update_grade($student_id, $data)) {
                $this->session->set_flashdata('success', 'Nilai berhasil ditambahkan/diupdate');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan/mengupdate nilai');
            }

            redirect('dosen/dashboard'); 
        }
    }
    
}

    