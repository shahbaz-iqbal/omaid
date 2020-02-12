<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {
    
    public function feedback_list() {
        
        $shop = $this->Shops->get_shop();
        $user = $this->Users->get_user();
        $feedback_on_note = $this->Feedbacks->feedback_on_note();
        $data = [
            'on_note' => $feedback_on_note,
            'shop' => $shop,
            'user' => $user
        ];
    
        $this->load->view('feedback/feedback',$data);
    }
    //////////////////////Support tab apiiiiiiiiiiiiii/No Model Function/////////////////////////////////////
    
    public function support(){
        $user_id = $this->input->post('user_id');
        $feedback_type = $this->input->post('feedback_type');
        $discription = $this->input->post('discription');
        $data = [
            'user_id' => $user_id,
            'discription' => $discription,
            'feedback_type' => $feedback_type
        ];
        $res = $this->Feedbacks->insert_support();
     }

    //////////////////////Support tab//////////////////////////////////////




    public function  on_note_detail() {
        
        $id = $this->uri->segment(3);
        $data = [
            'id' => $id,
            'shop' => $shop,
            'user' => $user
        ];
        $this->load->view('feedback/on_note_detail');
    }
    public function add_feedback_on_note() {
        
        $id = $this->input->post('user_id');
        $shop_id = $this->input->post('shop_id');
        $email = $this->input->post('email');
        $disc = $this->input->post('disc');
        $data = [
            'user_id' => $id,
            'shop_id' => $shop_id,
            'discription' => $disc                
        ];
        $result = $this->Feedbacks->insert_on_note($data);
    if ($result) {
                $this->session->set_flashdata('success', 'Shop Edit Successfully');
            } else {
                $this->session->set_flashdata('error', 'Shop not Edit Successfully');
            }
            redirect('Feedback/feedback_list');
    }
    
    
}
