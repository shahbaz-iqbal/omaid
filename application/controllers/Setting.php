<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function reward() {
        $setting['data'] = $this->Settings->get_setting();
        $this->load->view('setting/setting', $setting);
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->Settings->edit_setting($id);
        echo json_encode($data);
    }

    public function update() {
        $id = $this->input->post('editemail');
        $aed = $this->input->post('aed');
        $level20 = $this->input->post('20');
        $level50 = $this->input->post('50');
        $level100 = $this->input->post('100');
        $invite = $this->input->post('invite');
        $invited = $this->input->post('invited');
        $data = [
            'coin_equal_to' => $aed,
            'level_1_20' => $level20,
            'level_21_50' => $level50,
            'level_51_100' => $level100,
            'invite_friend' => $invite,
            'invited_friend_1st_purchase' => $invited
        ];
        $result = $this->Settings->update_setting($id, $data);
        if ($result) {
            $this->session->set_flashdata('success', 'Setting Update Successfully');
        } else {
            $this->session->set_flashdata('error', 'Setting not Update Successfully');
        }
        redirect('Setting/reward');
    }

    // Change status for api ///////  Accept Bill Of shop  //////////////////////




    public function transaction_accept() {
//        $id = $this->uri->segment(3);
        $id = 1;
        $link_user_id = 4;
        $res = $this->Settings->get_accepted_request($id);
        if (!empty($res)) {
            foreach ($res as $insert) {
                
            }
            $data = [
                'user_id' => $insert->user_id,
                'shop_id' => $insert->shop_id,
                'payment_method' => $insert->payment_method,
                'total_price' => $insert->total_price
            ];
            if ($insert->payment_method == 'cash') {

                //   $resultt = $this->Settings->create_transaction($data);
            } else {

//                $value_of_coin = $this->Settings->get_coins_equal();
//                $coin_again_aed = $value_of_coin[0]->coin_equal_to;
//
//                $usercoin = $this->Settings->get_coins($id);
//                $bill = $insert->total_price * $coin_again_aed;
//                $total_coin = $usercoin[0]->coin;
//                if ($total_coin >= $bill) {
//
//                    $update_coin = $total_coin - $bill;
//                    $result_coin = $this->Users->update_coin($id, $update_coin);
//                    $result = $this->Settings->create_transaction($data);
//                } else {
//                    echo 'not_enough_coin';
//                }
            }
            ///////////////// for status of sharing table for sharing points ////////////////////// 
            $status = $this->Settings->get_status_from_sharing($id, $link_user_id);
            if ($status[0]->status == 0) {

                $res = $this->Settings->update_user_points($id, $link_user_id);
            } elseif ($status[0]->status == 1) {
                $bill_add_points = $insert->total_price;
                $insert_point = $this->Settings->update_points_of_user($id, $bill_add_points);
            }
        }

        ///////////////// for level adjustment/////////////////////////
        $totalPoint = $this->Settings->get_total_points_for_lvl();
        $total_points = $totalPoint[0]->points;
        // $total_points = 500;
        $levelvalue = $this->Settings->get_level_1();
        if ($total_points <= $levelvalue[0]->level_1_20) {

            $level = $levelvalue[0]->level_1_20 / 20;
            $total_level = $total_points / $level;
            $insert_level = $total_level;

            $res = $this->Settings->update_level($insert_level, $id);
            echo 'first';
        } elseif ($total_points <= $levelvalue[0]->level_21_50) {

            $level = $levelvalue[0]->level_21_50 / 30;
            $total_level = $total_points / $level;
            $insert_level = $total_level + 20;
            $res = $this->Settings->update_level($insert_level, $id);
            echo '2nd';
        } elseif ($total_points <= $levelvalue[0]->level_51_100) {

            $level = $levelvalue[0]->level_51_100 / 50;
            $total_level = $total_points / $level;
            $insert_level = $total_level + 50;
            $res = $this->Settings->update_level($insert_level, $id);
            echo '51 to 100';
        }
        redirect('Setting/reward');
    }

    /////////////////////////////////function for level////////////////////////////////////////
    /////////////////  function for inveted friend get points  /////////////////////////
    public function invited_friend() {

        $user_code = 1;
        $invited_code = "";
        $status = 0;
        $data = [
            'user_id' => $user_code,
            'status' => $status,
            'link_user_id' => $invited_code
        ];
        $res = $this->Settings->insert_sharing($data);
        $user_total_points = $this->Settings->total_user_points($user_code);
        $user_total_point = $user_total_points[0]->points;
        $user_result = $this->Settings->get_invited_friend_points();
        $user_win_point = $user_result[0]->invite_friend;
        $update = $user_total_point + $user_win_point;
        $res = $this->Settings->update_user_points_for_invite_friend($user_code, $update);
        redirect();
    }

    ///////////////// Company Suggestion /////////////////////////
    public function company() {
        $comapny = $this->Settings->get_all_company();
        $data = [
            'company' => $comapny
        ];
        $this->load->view('setting/suggest_company', $data);
    }

    public function add_company() {
        if ($this->input->post('edit_id')) {
            $id = $this->input->post('edit_id');
             $name = $this->input->post('name');
            $location = $this->input->post('location');

            if (!empty($_FILES['img']['name']) != "") {

                if (!empty($_FILES['img']['name'])) {
                    $fileInfo = pathinfo($_FILES['img']['name']);
                    $newName = time() . '.' . $fileInfo['extension'];
                    move_uploaded_file($_FILES['img']['tmp_name'], "assets/images/" . $newName);
                }
                if (!empty($_FILES['img']['name'])) {
                    $logo = $newName;
                }
            } else {
                $logo = $this->input->post('edit_img');
            }
             $data = [
                'name' => $name,
                'location' => $location,
                'image' => $logo
            ];
            $result = $this->Settings->suggested_company_update($id, $data);
            if ($result) {
                $this->session->set_flashdata('success', 'Shop Edit Successfully');
            } else {
                $this->session->set_flashdata('error', 'Shop not Edit Successfully');
            }
             redirect('Setting/company');
        } else {

            $name = $this->input->post('name');
            $location = $this->input->post('location');
            if (!empty($_FILES['img']['name']) != "") {

                if (!empty($_FILES['img']['name'])) {
                    $fileInfo = pathinfo($_FILES['img']['name']);
                    $newName = time() . '.' . $fileInfo['extension'];
                    move_uploaded_file($_FILES['img']['tmp_name'], "assets/images/" . $newName);
                }
                if (!empty($_FILES['img']['name'])) {
                    $logo = $newName;
                }
            }
            $data = [
                'name' => $name,
                'location' => $location,
                'image' => $logo
            ];
            $result = $this->Settings->suggested_company_insert($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Company Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'Company not Add Successfully');
            }
            redirect('Setting/company');
        }
    }

    public function edit_company() {
        $id = $this->uri->segment(3);
        $data = $this->Settings->edit_company($id);
        echo json_encode($data);
    }

}
