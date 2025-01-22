<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function get_all_students() {
        $this->db->select('nm.*, u.username, s.nim, s.kelas');
        $this->db->from('users u');
        $this->db->join('students s', 'u.id = s.mahasiswa_id');
        $this->db->join('nilai_mahasiswa nm', 's.id = nm.mahasiswa_id', 'left');
        $this->db->where('u.role', 'mahasiswa');
        return $this->db->get()->result();
    }

    public function add_student($user_id, $data) {
        return $this->db->insert('students', array_merge($data, ['mahasiswa_id' => $user_id]));
    }

    public function delete_student($id) {
        return $this->db->delete('students', ['id' => $id]);
    }
}