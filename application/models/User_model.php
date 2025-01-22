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
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function create_user($data) {
        return $this->db->insert('users', $data);
    }
    public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result();
}

public function get_all_students() {
    return $this->db->select('users.id, users.username')
                    ->from('users')
                    ->where('role', 'mahasiswa')
                    ->get()
                    ->result_array();
}

public function register_student($data) {
    return $this->db->insert('students', $data);
}

public function get_students() {
    return $this->db->select('students.id, students.mahasiswa_id')
                    ->from('students')
                    ->get()
                    ->result_array();
}

public function register_nilaimahasiswa($data) {
    return $this->db->insert('nilai_mahasiswa', $data);
}

public function get_user_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('users');
    return $query->row();
}

public function update_user($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('users', $data);
}

public function delete_user($id) {
    $this->db->where('id', $id);
    return $this->db->delete('users');
}

    // Count users by role
    public function get_users_by_role($role, $limit = NULL) {
        $this->db->where('role', $role);
        
        if ($limit !== NULL) {
            $this->db->limit($limit);
        }
        
        $query = $this->db->get('users');
        return $query->result();
    }
    
public function count_users_by_role($role) {
    $this->db->where('role', $role);
    return $this->db->count_all_results('users');
}

}