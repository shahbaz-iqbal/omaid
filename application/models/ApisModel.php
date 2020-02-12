<?php

Class Apimodels extends CI_Model {

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    function mail_exists($key) {
        $this->db->where('email', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_users_login($data) {

        $this->db->where('email', $data['username']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get('users');
        $result = $query->row();
        return $result;
    }

    function get_all_category() {

        $query = $this->db->get('mall');
        $result = $query->row();
        return $result;
    }
    function get_all_shop() {

        $query = $this->db->get('mall');
        $result = $query->row();
        return $result;
    }

    public function get_pass_user($id) {
        
        $result = $this->db->select('password')
                        ->from('users')
                        ->where('id' ,$id)
                        ->get()->result();
        return $result;
    }

}
