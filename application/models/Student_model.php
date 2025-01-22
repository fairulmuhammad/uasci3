<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

   
    
        public function get_all_students() {
            return $this->db->select('users.id, users.username')
                            ->from('users')
                            ->where('role', 'mahasiswa')
                            ->get()
                            ->result_array();
        }
        

    
        public function get_mahasiswa_scores($mahasiswa_ids) {
            $this->db->select('users.username, students.id as student_id, 
                               nilai_mahasiswa.diskusi, nilai_mahasiswa.praktikum, 
                               nilai_mahasiswa.responsi, nilai_mahasiswa.uts, 
                               nilai_mahasiswa.uas, nilai_mahasiswa.nilai');
            $this->db->from('nilai_mahasiswa');
            $this->db->join('students', 'nilai_mahasiswa.mahasiswa_id = students.id');
            $this->db->join('users', 'students.mahasiswa_id = users.id');
            $this->db->where('users.role', 'mahasiswa');
            
            $this->db->where_in('users.id', $mahasiswa_ids);
            
            $query = $this->db->get();
            return $query->result_array();
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
        


    
    

    public function add_student($user_id, $data) {
        return $this->db->insert('students', array_merge($data, ['mahasiswa_id' => $user_id]));
    }

    public function delete_student($id) {
        return $this->db->delete('students', ['id' => $id]);
    }
}