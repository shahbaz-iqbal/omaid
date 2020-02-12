<?php

Class Settings extends CI_Model {

    public function get_setting() {

        $query = $this->db->get("reward_setting");
        $result = $query->result();
        return $result;
    }

    public function update_setting($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('reward_setting', $data);
        return $result;
    }

    public function edit_setting($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('reward_setting');
        $result = $query->row();
        return $result;
    }

    public function insert_feedback($id) {

        $query = $this->db->insert('reward_setting');
        $result = $query->row();
        return $result;
    }

    // Change status for api /////////////////////////////////////////////
    public function get_accepted_request($id) {

        $result = $this->db->select('*')
                        ->from('bill')
                        ->where('bill.user_id', $id)
                        ->where('bill.status', 1)
                        ->get()->result();
        return $result;
    }

    public function create_transaction($data) {
        $this->db->insert('transactions', $data);

//      return $result = $this->db->insert('transactions',$data);
    }

    public function get_coins($id) {

        $result = $this->db->select('coin')
                        ->from('users')
                        ->where('id', $id)
                        ->get()->result();
        return $result;
    }

    public function get_coins_equal() {

        $result = $this->db->select('*')
                        ->from('reward_setting')
                        ->get()->result();
        return $result;
    }

    public function update_coin($id, $update_coin) {
        $this->db->set('coin', $update_coin);
        $this->db->where('id', $id);
        $result = $this->db->update('users');
        return $result;
    }

    // Sharing Points Info /////////////////////////////////////////////

    public function get_status_from_sharing($id, $link_user_id) {
        $result = $this->db->select('status')
                        ->from('sharing')
                        ->where('user_id', $id)
                        ->where('link_user_id', $link_user_id)
                        ->get()->result();
        return $result;
    }

    //////// on status 1/////////////////////
    public function update_user_points($id, $link_user_id) {
        if (!empty($id)) {
            $recent_points = $this->db->select('points,coin')
                            ->from('users')
                            ->where('id', $id)
                            ->get()->result();
            $adding_points = $this->db->select('invited_friend_1st_purchase')
                            ->from('reward_setting')
                            ->get()->result();
            $points = $recent_points[0]->points + $adding_points[0]->invited_friend_1st_purchase;
            $coins = $recent_points[0]->coin + $adding_points[0]->invited_friend_1st_purchase;
            $this->db->set('points', $points);
            $this->db->set('coin', $coins);
            $this->db->where('id', $id);
            $result = $this->db->update('users');
        }
        if (!empty($link_user_id)) {
            $recent_points = $this->db->select('points')
                            ->from('users')
                            ->where('id', $link_user_id)
                            ->get()->result();
            $adding_points = $this->db->select('invited_friend_1st_purchase')
                            ->from('reward_setting')
                            ->get()->result();
            $points = $recent_points[0]->points + $adding_points[0]->invited_friend_1st_purchase;
            $coins = $recent_points[0]->coin + $adding_points[0]->invited_friend_1st_purchase;
            $this->db->set('points', $points);
            $this->db->set('coin', $coins);
            $this->db->where('id', $link_user_id);
            $result = $this->db->update('users');
        }
        if ($result) {
            $this->db->set('status', 1);
            $this->db->where('user_id', $id);
            $this->db->where('link_user_id', $link_user_id);
            $result = $this->db->update('sharing');
            return $result;
        }
    }

    //////// on status 1 ////////////////////

    public function update_points_of_user($id, $bill_add_points) {
        $recent_points = $this->db->select('points,coin')
                        ->from('users')
                        ->where('id', $id)
                        ->get()->result();

        $points = $recent_points[0]->points + $bill_add_points;
        $coins = $recent_points[0]->coin + $bill_add_points;
        $this->db->set('points', $points);
        $this->db->set('coin', $coins);
        $this->db->where('id', $id);
        $result = $this->db->update('users');
        return $result;
    }

    /////////////////////////////////function for level////////////////////////////////////////

    public function update_level($insert_level, $id) {
        $this->db->set('level', $insert_level);
        $this->db->where('id', $id);
        $result = $this->db->update('users');
        return $result;
    }

    public function get_total_points_for_lvl() {

        $recent_pointss = $this->db->select('points')
                        ->from('users')
                        ->get()->result();
        return $recent_pointss;
    }

    public function get_level_1() {
        $recent_points = $this->db->select('level_1_20,level_21_50,level_51_100')
                        ->from('reward_setting')
                        ->get()->result();
        return $recent_points;
    }

    /////////////////////////////////function for invited_friend insert id or invted friend id////////////////////////////////////////

    public function get_invited_friend_points() {
        $recent_points = $this->db->select('invite_friend')
                        ->from('reward_setting')
                        ->get()->result();
        return $recent_points;
    }

    public function total_user_points($user_code) {
        $recent_points = $this->db->select('points')
                        ->from('users')
                        ->where('id',$user_code)
                        ->get()->result();
        return $recent_points;
    }

    public function update_user_points_for_invite_friend($user_code, $update) {
        $this->db->set('points', $update);
        $this->db->where('id', $user_code);
        $result = $this->db->update('users');
        return $result;
    }

    public function insert_sharing($data) {
        $this->db->insert('sharing', $data);
    }
    ///////////////////////////Sugested Company/////////////////////////////////
     
    public function suggested_company_insert($data){
        return $this->db->insert('suggested_company', $data);
    }
    public function get_all_company(){
         $recent_pointss = $this->db->select('*')
                        ->from('suggested_company')
                        ->get()->result();
        return $recent_pointss;
    }
    public function edit_company($id){
         $recent_pointss = $this->db->select('*')
                        ->from('suggested_company')
                        ->where('id',$id)
                        ->get()->row();
        return $recent_pointss;
    }
    public function suggested_company_update($id,$data){
        $this->db->where('id', $id);
        $result = $this->db->update('suggested_company',$data);
        return $result;
    }
}
