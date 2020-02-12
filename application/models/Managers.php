<?php

Class Managers extends CI_Model {

    public function add_manager($data) {
        return $this->db->insert('manager', $data);
    }

    public function get_manager() {
        $query = $this->db->get("manager");
        $result = $query->result();
        return $result;
    }

    public function edit_manager($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('manager');
        $result = $query->row();
        return $result;
    }
    public function Update_manager($id,$data) {
         $this->db->where('id', $id);
        $result = $this->db->update('manager', $data);
        return $result;
    }
    public function delete_manager($id) {
         $this->db->where('id', $id);
        $result = $this->db->delete('manager');
        return $result;
    }

}
