<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row(); 
    }

    public function get_all_students() {
        return $this->db->select('users.id, users.username')
                        ->from('users')
                        ->where('role', 'mahasiswa')
                        ->get()
                        ->result_array();
    }

    public function get_students() {
        return $this->db->select('students.id, students.mahasiswa_id')
                        ->from('students')
                        ->get()
                        ->result_array();
    }

    public function validate_user($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $userz = $query->row(); 
        

        if ($query->num_rows() > 0) {
            $user = $query->row(); 

            if (password_verify($password, $user->password)) {
                return $user; 
            } else {
                return false; 
            }
        }

        return false; // User not found
    }

    public function register_student($data) {
        return $this->db->insert('students', $data);
    }
    public function register_nilaimahasiswa($data) {
        return $this->db->insert('nilai_mahasiswa', $data);
    }
   
}
