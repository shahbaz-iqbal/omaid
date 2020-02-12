<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audience extends CI_Controller {

    public function index() {
        $workplace = $this->Audiences->get_workplace();
        $audience = $this->Audiences->saves_audience();
        $passData = [
            'data' => $workplace,
            'audience' => $audience
        ];
        $this->load->view('audience/audience_list', $passData);
    }

    public function audeince_name() {
        $user_id = $this->input->post('data');
        $audience_name = $this->input->post('audience_name');
        $passData = [
            'name' => $audience_name
        ];
  
       // $audience_id = $this->Audiences->audeince_name($passData);

        $data = [
            'audience_id' => $audience_id,
            'user_id' => $user_id
        ];
      echo '<pre>';
print_r($data);
echo '</pre>';
die();
        $result = $this->Audiences->save_audeince($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Audience Add Successfully');
        } else {
            $this->session->set_flashdata('error', 'Audience not Add Successfully');
        }
        redirect('Audience');
    }

    public function filter_audience() {
        $location = $this->input->post('location');
        $min_age = $this->input->post('min');
        $max_age = $this->input->post('max');
        $gender = $this->input->post('gender');
        $workplace = $this->input->post('workplace');
        $age = range($min_age, $max_age);
        $data = [
            'location' => $location,
            'age' => $age,
            'gender' => $gender,
            'workplace' => $workplace
        ];

        $res = $this->Audiences->get_audience($data);
        $rowcount = count($res);

        $passData = [
            'filter' => $res,
            'total_result' => $rowcount,
        ];

        $this->load->view('audience/audience_list', $passData);
    }

    public function audience_list() {
        $id = $this->uri->segment(3);
        $res = $this->Audiences->get_audience_by_id($id);
        foreach ($res as $id)
        {
            $a[] = $id->user_id;
        }      
       $get_user = $this->Audiences->get_user_by_id($a);
 $passData = [
            'data' => $get_user
        ];

        $this->load->view('audience/Audience_user', $passData);
    }
    public function edit_audience() {
        $id = $this->uri->segment(3);

        $res = $this->Audiences->edit_audience_name($id);
            echo json_encode($res);
    }
    public function update_audience_name() {
         $id = $this->input->post('editAudienceId');
            $name = $this->input->post('audiencename');
            $dataa = array(
                'name' => $name,
            );
        $result = $this->Audiences->update_audience_name($id,$dataa);
             if ($result) {
                $this->session->set_flashdata('success', 'Audience Update Successfully');
            } else {
                $this->session->set_flashdata('error', 'Audience not Update Successfully');
            }
            redirect('Audience');
    }

    public function add_workplace() {
        if ($this->input->post('editId')) {
            $id = $this->input->post('editId');
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $dataa = array(
                'name' => $name,
                'address' => $address,
                'phone' => $phone
            );
            $result = $this->Audiences->Update_workplace($id, $dataa);
            if ($result) {
                $this->session->set_flashdata('success', 'Workplace Update Successfully');
            } else {
                $this->session->set_flashdata('error', 'Workplace not Update Successfully');
            }
            redirect('Audience');
        } else {
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $dataa = array(
                'name' => $name,
                'address' => $address,
                'phone' => $phone
            );
            $result = $this->Audiences->add_workplace($dataa);
            if ($result) {
                $this->session->set_flashdata('success', 'Workplace Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'Workplace not Add Successfully');
            }
            redirect('Audience');
        }
    }

    public function edit_workplace() {
        $id = $this->uri->segment(3);
        $data = $this->Audiences->edit_workplace($id);
        echo json_encode($data);
    }

    public function delete_workplace() {
        $id = $this->uri->segment(3);
        $result = $this->Audiences->delete_workplace($id);
        if ($result) {
            $this->session->set_flashdata('success', 'Workplace Delete Successfully');
        } else {
            $this->session->set_flashdata('error', 'Workplace not Delete Successfully');
        }
        redirect('Audience');
    }

}
