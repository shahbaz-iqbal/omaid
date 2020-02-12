<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
    
     public function admins() {
        $res = $this->Managers->get_manager();
        $passData = [
            'data' => $res
        ];
        $this->load->view('users/admin_manager', $passData);
    }

    public function add() {
        if ($this->input->post('idmanager')) {
            $id = $this->input->post('idmanager');
            $updatename = $this->input->post('name');
            $updateemail = $this->input->post('email');
            $updatepassward = $this->input->post('passward');
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
                $logo = $this->input->post('editimage');
            }
            
            $dataa = array(
                'username' => $updatename,
                'email' => $updateemail,
                'password' => $updatepassward,
                'image' => $logo
            );
      
            $result = $this->Managers->Update_manager($id, $dataa);
            if ($result) {
                $this->session->set_flashdata('success', 'User Update Successfully');
            } else {
                $this->session->set_flashdata('error', 'User not Update Successfully');
            }
            redirect('Manager/admins');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $passward = $this->input->post('passward');
             if (!empty($_FILES['img']['name'])) {
                $fileInfo = pathinfo($_FILES['img']['name']);
                $newName = time() . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES['img']['tmp_name'], "assets/images/" . $newName);
            }
            if (!empty($_FILES['img']['name'])) {
                $logo = $newName;
            }
            $dataa = array(
                'username' => $name,
                'email' => $email,
                'password' => $passward,
                'image' => $logo
            );
          
            $result = $this->Managers->add_manager($dataa);
            if ($result) {
                $this->session->set_flashdata('success', 'User Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'User not Add Successfully');
            }
            redirect('Manager/admins');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->Managers->edit_manager($id);
        echo json_encode($data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->Managers->delete_manager($id);
        if ($result) {
            $this->session->set_flashdata('success', 'Manager Delete Successfully');
        } else {
            $this->session->set_flashdata('error', 'Manager not Delete Successfully');
        }
        redirect('Manager/admins');
    }

}
