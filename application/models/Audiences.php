<?php

Class Audiences extends CI_Model {

    public function get_audience($data) {

        $this->db->from('users');
        $this->db->where('location', $data['location']);
        $this->db->or_where('gender', $data['gender']);
        $this->db->or_where('workplace', $data['workplace']);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_audience_by_id($data) {
        $this->db->from('audience');
        $this->db->where('audience_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function saves_audience() {

        $this->db->select('audience_name.*')
                ->from('audience')
                ->join('audience_name', 'audience.audience_id = audience_name.id')
                ->group_by('audience.audience_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_user_by_id($a) {

        $this->db->select('*')
                ->from('users')
                ->where_in('id',$a);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function audeince_name($data) {
        $this->db->insert('audience_name', $data);
        return $this->db->insert_id();
    }
    public function edit_audience_name($id) {
       $this->db->where('id', $id);
        $query = $this->db->get('audience_name');
        $result = $query->row();
        return $result;
    }
    public function update_audience_name($id,$data) {
         $this->db->where('id', $id);
        $result = $this->db->update('audience_name', $data);
        return $result;
    }

    public function save_audeince($data) {
        $orders = [];
        foreach ($data['user_id'] as $product_id) {
            if ($product_id AND $product_id != "") {
                $this->db->insert('audience', ['user_id' => $product_id, 'audience_id' => $data['audience_id']]);
                $orders[] = $this->db->insert_id();
            }
        }
        return $orders;
    }

    public function get_workplace() {
        $query = $this->db->get('workplace');
        $result = $query->result();
        return $result;
    }

    public function edit_workplace($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('workplace');
        $result = $query->row();
        return $result;
    }

    public function Update_workplace($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('workplace', $data);
        return $result;
    }

    public function delete_workplace($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('workplace');
        return $result;
    }

    public function add_workplace($data) {
        return $this->db->insert('workplace', $data);
    }

}
