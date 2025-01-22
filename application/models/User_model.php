<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function verify_user($username, $password) {
        $query = $this->db->get_where('users', ['username' => $username]);
        if ($query->num_rows() > 0) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }

    public function create_user($data) {
        return $this->db->insert('users', $data);
    }
}