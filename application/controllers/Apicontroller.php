<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    /////////////////////signup//////////////////////
    public function user_signup() {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $password,
            'password' => $password
        ];
        $email_check = $this->ApiModels->mail_exists($email);
        if ($email_check == FALSE) {
            $res = $this->ApiModels->insert_user($data);
            $last = $this->db->order_by('id', "desc")
                    ->limit(1)
                    ->get('users')
                    ->row();
            echo json_encode($last);
        } else {
            echo 'Email Already Exist';
        }
    }

    public function forget_pass() {

        $id = $this->input->post('id');
        $res = $this->ApiModels->get_pass_user($id);
        echo json_encode($res);
    }

    /////////////////////signup//////////////////////
    /////////////////////login//////////////////////
    public function user_login() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = [
            'username' => $email,
            'password' => $password
        ];
        $res = $this->ApiModels->get_users_login($data);

        if (!empty($res)) {
            echo json_encode($res);
        } else {
            echo 'Invalid Username Password';
        }
    }

    /////////////////////login//////////////////////
    //////////////All Category//////////////////////
    public function all_mall() {

        $all_category = $this->ApiModels->get_all_category();
        echo json_encode($all_category);
    }

    //////////////All Category//////////////////////

    public function all_shop() {

        $all_category = $this->ApiModels->get_all_shop();
        echo json_encode($all_category);
    }

    //////////////All job Post---insert/////////////////////////
}
