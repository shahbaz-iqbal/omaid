<?php

Class Users extends CI_Model {

    public function get_user() {
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_user_by_id($id) {
        
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_vouchers($id) {
        $result = $this->db->select('vouchers.name,vouchers.expire_date,vouchers.discription,vouchers.id')
                        ->from('audience')
                        ->join('send_voucher', 'send_voucher.audience_id = audience.audience_id', 'left')
                        ->join('vouchers', 'vouchers.id = send_voucher.voucher_id', 'left')
                        ->where('audience.user_id', $id)
                        ->get()->result();


        return $result;
    }

    public function edit_user($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        $result = $query->row();
        return $result;
    }

    public function Update_User($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('users', $data);
        return $result;
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('users');
        return $result;
    }

    public function filter_shops($filter) {

        if ($filter != "") {
            $this->db->from('users');
            $this->db->where('id', $filter['id']);
            $this->db->or_where('username', $filter['username']);
            $this->db->or_where('phone', $filter['phone']);
            $this->db->or_where('email', $filter['email']);
            $this->db->or_where('location', $filter['location']);
            $this->db->or_where('workplace', $filter['workplace']);
            $this->db->or_where('level', $filter['level']);
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function get_shop_bill($id) {
        $result = $this->db->select('bill.*, shop.name as ShopName, vouchers.name as VoucherName')
                        ->from('bill')
                        ->join('shop', 'shop.id = bill.shop_id', 'left')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                        ->where('bill.user_id', $id)
                        ->get()->result();
        return $result;
    }

    public function user_bill_detail($id) {
        $result = $this->db->select('bill.*, users.username as UserName, users.workplace as UserWorkPlace, vouchers.name as VoucherName, bill_detail.product_name, bill_detail.price as BillDetailPrice, bill_detail.discounted_price as BillDetailDiscountPrice')
                        ->from('bill')
                        ->join('users', 'users.id = bill.user_id', 'left')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                        ->join('bill_detail', 'bill_detail.bill_id = bill.id', 'left')
                        ->where('bill.id', $id)
                        ->get()->result();
        return $result;
    }
 
}
