<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    
    public function add_or_update_grade($student_id, $data) {
        $existing = $this->db->get_where('nilai_mahasiswa', ['mahasiswa_id' => $student_id]);
        
        if ($existing->num_rows() > 0) {
            return $this->db->update('nilai_mahasiswa', $data, ['mahasiswa_id' => $student_id]);
        } else {
            return $this->db->insert('nilai_mahasiswa', array_merge($data, ['mahasiswa_id' => $student_id]));
        }
    }
    

        public function get_student_grades_by_username($username) {
            $this->db->select('students.kelas, nilai_mahasiswa.diskusi, nilai_mahasiswa.praktikum, 
                               nilai_mahasiswa.responsi, nilai_mahasiswa.uts, nilai_mahasiswa.uas, 
                               nilai_mahasiswa.nilai');
            $this->db->from('nilai_mahasiswa');
            $this->db->join('students', 'nilai_mahasiswa.mahasiswa_id = students.id');
            $this->db->join('users', 'students.mahasiswa_id = users.id');
            $this->db->where('users.username', $username);
            $query = $this->db->get();
    
            return $query->result_array();
        }
    
    
    
    
}