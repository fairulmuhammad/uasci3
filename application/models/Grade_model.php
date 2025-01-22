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
}