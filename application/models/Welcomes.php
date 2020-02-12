<?php

Class Welcomes extends CI_Model {

    public function get_users($user_login) {
        $this->db->where('username', $user_login['username']);
        $this->db->or_where('email', $user_login['email']);
        $this->db->where('password', $user_login['password']);
        $query = $this->db->get('manager');
        $result = $query->row();
        return $result;
    }

    public function get_mounth_wise_user() {
        
        $result = $this->db->select('*')
                        ->where('MONTH(created_at)', 01)
                        ->from('users')
                        ->get()->num_rows();
        return $result;
    }

    public function get_year_wise_user() {
        $result = $this->db->select('*')
                        ->where('YEAR(created_at)', 2020)
                        ->from('users')
                        ->get()->num_rows();
        return $result;
    }

    public function get_day_wise_user() {
        $result = $this->db->select('*')
                        ->where('DAY(created_at)', 9)
                        ->from('users')
                        ->get()->num_rows();
        return $result;
    }

    public function get_user_by_age_range_20_30() {
        $result = $this->db->select('*')
                        ->where("age BETWEEN '20' AND '30'")
                        ->from('users')
                        ->get()->num_rows();
        return $result;
    }
    public function get_user_by_age_range_30_40() {
        $result = $this->db->select('*')
                        ->where("age BETWEEN '30' AND '40'")
                        ->from('users')
                        ->get()->num_rows();
        return $result;
    }
    public function get_user_by_age_range_40_50() {
        $result = $this->db->select('*')
                        ->where("age BETWEEN '40' AND '50'")
                        ->from('users')
                        ->get()->num_rows();
        return $result;
    }

    public function get_total_bill_per_day() {
        $result = $this->db->select('transactions.total_price')
                        ->where('DAY(created_at)', 27)
                        ->from('transactions')
                        ->get()->result();
        return $result;
    }
    
    public function top_voucher_per_day() {
         
         $result = $this->db->select('vouchers.name')
                        ->from('bill')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                         ->where('bill.status', 1)
                         ->where('DAY(bill.created_at)', 20)
                        ->get()->num_rows();
        return $result;
       
    }
    public function top_voucher_per_month() {
         
         $result = $this->db->select('vouchers.name')
                        ->from('bill')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                         ->where('bill.status', 1)
                         ->where('MONTH(bill.created_at)', 01)
                        ->get()->num_rows();
        return $result;
       
    }
    public function top_voucher_per_year() {
         
         $result = $this->db->select('vouchers.name')
                        ->from('bill')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                         ->where('bill.status', 1)
                         ->where('YEAR(bill.created_at)', 2020)
                        ->get()->num_rows();
        return $result;
       
    }

//    public function get_total_bill_per_mounth() {
//        $result = $this->db->select('transactions.total_price')
//                        ->where('MONTH(created_at)', 01)
//                        ->from('transactions')
//                        ->get()->result();
//        return $result;
//    }

    public function get_total_bill_per_year() {
        $result = $this->db->select('transactions.total_price')
                        ->where('YEAR(created_at)', 2020)
                        ->from('transactions')
                        ->get()->result();
        return $result;
    }
    public function get_total_bill_per_month() {
        $result = $this->db->select('transactions.total_price')
                        ->where('MONTH(created_at)', 01)
                        ->from('transactions')
                        ->get()->result();
        return $result;
    }

    public function top_locations() {
        $result = $this->db->select('location')
                        ->from('users')
                        ->get()->result();
        return $result;
    }

    public function top_gender() {
        $result = $this->db->select('gender')
                        ->from('users')
                        ->get()->result();
        return $result;
    }

    public function top_suggested_company() {
        $result = $this->db->select('location')
                        ->from('suggested_company')
                        ->get()->result();
        return $result;
    }

    public function get_all_vouchers() {
        $query = $this->db->get("vouchers");
        $result = $query->num_rows();
        return $result;
    }

    public function get_all_user() {
        $query = $this->db->get("shop");
        $result = $query->num_rows();
        return $result;
    }

    public function recent_shop() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get("shop");
        $result = $query->result();
        return $result;
    }

    public function recent_user() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get("users");
        $result = $query->result();
        return $result;
    }

    public function recent_voucher() {
        $result = $this->db->select('feedback_on_note.*,users.username as Shopname')
                        ->from('feedback_on_note')
                        ->join('users', 'users.id = feedback_on_note.id', 'left')
                        ->order_by('id', 'DESC')
                        ->limit(4)
                        ->get()->result();
        return $result;
    }

    public function recent_feedback_on_note() {
        $result = $this->db->select('users.username, shop.name')
                        ->from('feedback_on_note')
                        ->join('users', 'users.id = feedback_on_note.user_id', 'left')
                        ->join('shop', 'shop.id = feedback_on_note.shop_id', 'left')
                        ->get()->result();
        return $result;
    }

    public function recent_feedback() {
        $result = $this->db->select('feedback.*, users.username as name')
                        ->from('feedback')
                        ->join('users', 'users.id = feedback.user_id', 'left')
                        ->limit(3)
                        ->get()->result();
        return $result;
    }

    public function recent_reports() {
        $result = $this->db->select('reports.*, users.username as UserName,shop.name as ShopName,vouchers.name as VoucherName')
                        ->from('reports')
                        ->join('users', 'users.id = reports.user_id', 'left')
                        ->join('shop', 'shop.id = reports.shop_id', 'left')
                        ->join('vouchers', 'vouchers.id = reports.voucher_id', 'left')
                        ->limit(3)
                        ->get()->result();
        return $result;
    }

    public function get_total_bill() {

        $result = $this->db->select('bill.*, users.username as name, shop.name as ShopName, vouchers.name as VoucherName')
                        ->from('bill')
                        ->join('users', 'users.id = bill.user_id', 'left')
                        ->join('shop', 'shop.id = bill.shop_id', 'left')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                        // ->like('title',$date)
                        ->get()->result();
        return $result;
    }

    public function total_bill($date) {

        $result = $this->db->select('bill.*, users.username as name, shop.name as ShopName, vouchers.name as VoucherName')
                        ->from('bill')
                        ->join('users', 'users.id = bill.user_id', 'left')
                        ->join('shop', 'shop.id = bill.shop_id', 'left')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                        ->like('purchase_date', $date)
                        ->get()->result();
        return $result;
    }

}
