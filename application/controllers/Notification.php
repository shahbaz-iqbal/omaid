<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

    public function index() {

        $all_shop = $this->Shops->get_shop();
        $notification = $this->Notifications->get_all_notification();
        $send = $this->Notifications->get_send_notification();
        $audience = $this->Audiences->saves_audience();
        $data = [
            'send' => $send,
            'audience' => $audience,
            'noti' => $notification,
            'shop' => $all_shop
        ];
        $this->load->view('notification/notification_list', $data);
    }

    public function send_notify() {
        $audi = $this->input->post('audience_id');
        $noti = $this->input->post('notification_id');
        $data = [
            'audience_id' => $audi,
            'notification_id' => $noti
        ];
        $result = $this->Notifications->send_notification($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Notification Send Successfully');
        } else {
            $this->session->set_flashdata('error', 'Notification not Send Successfully');
        }
        redirect('Notification');
    }

    public function add() {
        if ($this->input->post('idnotification')) {
            $id = $this->input->post('idnotification');
            $name = $this->input->post('name');
           // $img = $this->input->post('img');
            $discription = $this->input->post('discription');
            $shop = implode(",", $this->input->post('shop_link'));
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
            
            $data = [
                'name' => $name,
                'image' => $logo,
                'discription' => $discription,
                'shop_id' => $shop
            ];
            $result = $this->Notifications->update_notification($id,$data);
            if ($result) {
                $this->session->set_flashdata('success', 'Notification Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'Notification not Add Successfully');
            }
            redirect('Notification');
        } else {
            $name = $this->input->post('name');
            $img = $this->input->post('img');
            $discription = $this->input->post('discription');
            $shop = implode(",", $this->input->post('shop_link'));
            
             if (!empty($_FILES['img']['name'])) {
                $fileInfo = pathinfo($_FILES['img']['name']);
                $newName = time() . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES['img']['tmp_name'], "assets/images/" . $newName);
            }
            if (!empty($_FILES['img']['name'])) {
                $logo = $newName;
            }
            $data = [
                'name' => $name,
                'image' => $logo,
                'discription' => $discription,
                'shop_id' => $shop
            ];
            $result = $this->Notifications->insert_notification($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Notification Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'Notification not Add Successfully');
            }
            redirect('Notification');
        }
    }

    public function edit() {

        $id = $this->uri->segment(3);
        $data = $this->Notifications->edit_notification($id);
        echo json_encode($data);
    }
    
    ///////////////////////////////Not Used For Notification Users///////////////////////////////////////
    
    
    public function notification_user() {
        $id = $this->uri->segment(3);

        $datas = $this->Notifications->get_user_notification($id);
       $data = [
                'data' => $datas,
            ];
       
            $this->load->view('notification/notification_users',$data);
    }

}
