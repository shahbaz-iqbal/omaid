<?php

Class Vouchers extends CI_Model {

    public function get_all_voucher($name) {
        if ($name != "") {
            $this->db->where('category', $name);
            $query = $this->db->get('vouchers');
        } else {
            $query = $this->db->get('vouchers');
        }

        $result = $query->result();
        return $result;
    }

    public function add($data) {
        return $this->db->insert('vouchers', $data);
    }

//    public function get_manager() {
//        $query = $this->db->get("manager");
//        $result = $query->result();
//        return $result;
//    }

    public function edit($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('vouchers');
        $result = $query->row();
        return $result;
    }

    public function Update($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('vouchers', $data);
        return $result;
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('vouchers');
        return $result;
    }

    public function all_voucher() {
        $query = $this->db->get('vouchers');
        $result = $query->result();
        return $result;
    }

    public function add_send_voucher($data) {
        $result = $this->db->insert('send_voucher', $data);
        return $result;
    }

    public function report_voucher() {
       $this->db->select('vouchers.name as VoucherName,vouchers.id,audience_name.name as AudienceName')
                ->from('send_voucher')
                ->join('vouchers', 'vouchers.id = send_voucher.voucher_id')
                ->join('audience_name', 'audience_name.id = send_voucher.audience_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function audience_users() {
       $this->db->select('users.*')
                ->from('send_voucher')
                ->join('audience', 'audience.audience_id = send_voucher.audience_id')
                ->join('users', 'users.id = audience.user_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_expire_voucher_date($id) {
       $this->db->select('expire_date')
                ->from('vouchers')
                ->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

}
