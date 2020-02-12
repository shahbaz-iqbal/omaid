<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function users() {

        $res = $this->Users->get_user();
        $passData = [
            'data' => $res
        ];
        $this->load->view('users/user', $passData);
    }

    public function update() {

        $id = $this->input->post('iduser');
        $username = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $age = $this->input->post('age');
        $gender = $this->input->post('gender');
        $location = $this->input->post('location');
        $workplace = $this->input->post('workplace');
    //    $level = $this->input->post('level');
    //    $coin = $this->input->post('coin');
        $dataa = array(
            'username' => $username,
            'phone' => $phone,
            'email' => $email,
            'age' => $age,
            'gender' => $gender,
            'location' => $location,
            'workplace' => $workplace,
        //    'level' => $level,
        //    'coin' => $coin
        );
        $result = $this->Users->Update_User($id, $dataa);
        if ($result) {
            $this->session->set_flashdata('success', 'User Update Successfully');
        } else {
            $this->session->set_flashdata('error', 'User not Update Successfully');
        }
        redirect('user/users');
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->Users->edit_user($id);
        echo json_encode($data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->Users->delete($id);
        if ($result) {
            $this->session->set_flashdata('success', 'User Delete Successfully');
        } else {
            $this->session->set_flashdata('error', 'User not Delete Successfully');
        }
        redirect('user/users');
    }

    public function user_filter() {
        $userid = $this->input->post('userId');
        $username = $this->input->post('username');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $location = $this->input->post('location');
        $workplace = $this->input->post('workplace');
        $level = $this->input->post('level');
        $filter = [
            'id' => $userid,
            'username' => $username,
            'phone' => $phone,
            'email' => $email,
            'location' => $location,
            'workplace' => $workplace,
            'level' => $level
        ];
        $res = $this->Users->filter_shops($filter);
        $passData = [
            'data' => $res
        ];
        $this->load->view('users/user_filter', $passData);
    }

    public function user_profile() {
        
        $id = $this->uri->segment(3);
        $user = $this->Users->get_user_by_id($id);
        $bill = $this->Users->get_shop_bill($id);
        $workplace = $this->Audiences->get_workplace();
        $voucher = $this->Users->get_vouchers($id);

        $passData = [
            'user' => $user,
            'bill' => $bill,
            'voucher' => $voucher,
            'data' => $workplace
        ];
        
        $this->load->view('users/user_profile', $passData);
    }

    public function bill_detail() {
        $id = $this->uri->segment(3);
        $user_detail = $this->Users->user_bill_detail($id);
        $passData = [
            'data' => $user_detail
        ];
        $this->load->view('shops/bill_detail', $passData);
    }


}
