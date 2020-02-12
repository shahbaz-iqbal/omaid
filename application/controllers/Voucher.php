<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

    public function vouchers() {
        $name = $this->input->post('category');
        $res = $this->Vouchers->get_all_voucher($name);
        $category = $this->Shops->get_category();
        $all_shop = $this->Shops->get_shop();
        $passData = [
            'allShop' => $all_shop,
            'category' => $category,
            'data' => $res
        ];
        $this->load->view('vouchers/voucher_list', $passData);
    }

    public function add() {
        if ($this->input->post('idvoucher')) {
            $id = $this->input->post('idvoucher');
            $name = $this->input->post('name');
            $quantity = $this->input->post('quantity');
            $category = $this->input->post('categoryAdd');
            $starDate = $this->input->post('starDate');
            $date = $this->input->post('date');
            $disc = $this->input->post('disc');
            $shoplink = implode(",", $this->input->post('shoplink'));
            $terms = $this->input->post('terms');
//            $img = $this->input->post('img');
            $editimg = $this->input->post('editimg');

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
                $logo = $this->input->post('editimg');
            }


            $data = array(
                'name' => $name,
                'quantity' => $quantity,
                'category' => $category,
                'start_date' => $starDate,
                'expire_date' => $date,
                'discription' => $disc,
                'shop_id' => $shoplink,
                'term_and_condition' => $terms,
                'image' => $logo
            );
            $result = $this->Vouchers->Update($id, $data);
            if ($result) {
                $this->session->set_flashdata('success', 'Voucher Update Successfully');
            } else {
                $this->session->set_flashdata('error', 'Voucher not Update Successfully');
            }
            redirect('Voucher/vouchers');
        } else {
            $name = $this->input->post('name');
            $category = $this->input->post('categoryAdd');
            $starDate = $this->input->post('starDate');
            $date = $this->input->post('date');
            $quantity = $this->input->post('quantity');
            $disc = $this->input->post('disc');
            $shoplink = implode(",", $this->input->post('shoplink'));
            $terms = $this->input->post('terms');
//            $img = $this->input->post('img');

            if (!empty($_FILES['img']['name'])) {
                $fileInfo = pathinfo($_FILES['img']['name']);
                $newName = time() . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES['img']['tmp_name'], "assets/images/" . $newName);
            }
            if (!empty($_FILES['img']['name'])) {
                $logo = $newName;
            }

            $data = array(
                'name' => $name,
                'quantity' => $quantity,
                'category' => $category,
                'start_date' => $starDate,
                'expire_date' => $date,
                'discription' => $disc,
                'shop_id' => $shoplink,
                'term_and_condition' => $terms,
                'image' => $logo
            );
            $result = $this->Vouchers->add($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Voucher Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'Voucher not Add Successfully');
            }
            redirect('Voucher/vouchers');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->Vouchers->edit($id);
        echo json_encode($data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->Vouchers->delete($id);
        if ($result) {
            $this->session->set_flashdata('success', 'Voucher Delete Successfully');
        } else {
            $this->session->set_flashdata('error', 'Voucher not Delete Successfully');
        }
        redirect('Voucher/vouchers');
    }

    public function report_vouchers() {
        $report = $this->Vouchers->report_voucher();
        $data = [
            'data' => $report
        ];
        $this->load->view('vouchers/history', $data);
    }

    public function send_vouchers() {
        $vouchers = $this->Vouchers->all_voucher();
        $audience = $this->Audiences->saves_audience();
        $data = array(
            'voucher' => $vouchers,
            'audience' => $audience
        );
        $this->load->view('vouchers/send_voucher', $data);
    }

    public function voucher_send_detail() {
        $voucher_id = $this->input->post('voucher_id');
        $audience_id = $this->input->post('audience_id');
        $expire_date = $this->Vouchers->get_expire_voucher_date($voucher_id);
        $date = $expire_date->expire_date;
        $status = 1;
        $data = array(
            'status' => $status,
            'expire_date' => $date,
            'voucher_id' => $voucher_id,
            'audience_id' => $audience_id
        );
        $result = $this->Vouchers->add_send_voucher($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Voucher Send Successfully');
        } else {
            $this->session->set_flashdata('error', 'Voucher not Not Successfully');
        }
        redirect('Voucher/vouchers');
    }

    public function report_vouchers_users() {
        $user_list = $this->Vouchers->audience_users();
        $data = [
            'data' => $user_list
        ];
        $this->load->view('vouchers/user_detail', $data);
    }

}
