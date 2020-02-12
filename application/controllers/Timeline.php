<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline extends CI_Controller {

    public function timeline_list() {

        $timeline = $this->Timelines->get_timeline();
        $category = $this->Shops->get_category();
        $shops = $this->Timelines->get_shops();
        $data = [
            'timeline' => $timeline,
            'category' => $category,
            'shops' => $shops
        ];
        $this->load->view('timeline/timeline', $data);
    }

    public function edit_timeline() {
        $id = $this->uri->segment(3);
        $res = $this->Timelines->edit_timeline($id);
        $images = $this->Timelines->get_edit_images($id);
        $category = $this->Shops->get_category();
        $shops = $this->Timelines->get_shops();
        $data = [
            'category' => $category,
            'shops' => $shops,
            'image' => $images,
            'data' => $res
        ];
        $this->load->view('timeline/edit_timeline', $data);
    }

    public function delete_image() {
        $name = $this->input->post('name');
        $id = $this->input->post('id');
        $res = $this->Timelines->delete_single_img($name);
        echo json_encode($res);
    }

    public function add_timeline() {
        if ($this->input->post('edit_timeline')) {
            $id = $this->input->post('edit_timeline');
            $edit_img = $this->input->post('edit_img');
            $edit_vedio = $this->input->post('edit_vedio');
            $category = $this->input->post('cateegory');
            $slide = $this->input->post('slide');
            $caption = $this->input->post('caption');
            $shop_id = $this->input->post('shop_id');
            $discrip = $this->input->post('discrip');
            $price = $this->input->post('price');
            $discount = $this->input->post('discount');
//            $img = $this->input->post('img');
//            $vedio = $this->input->post('vedio');

            if (!empty($_FILES['vedio']['name']) != "") {

                if (!empty($_FILES['vedio']['name'])) {
                    $fileInfo = pathinfo($_FILES['vedio']['name']);
                    $newName = time() . '.' . $fileInfo['extension'];
                    move_uploaded_file($_FILES['vedio']['tmp_name'], "assets/vedio/" . $newName);
                }
                if (!empty($_FILES['vedio']['name'])) {
                    $vedio = $newName;
                }
            } else {
                $vedio = $this->input->post('edit_vedio');
            }
            $data = array(
                'category' => $category,
                'slide' => $slide,
                'caption' => $caption,
                'shop_id' => $shop_id,
                'discription' => $discrip,
                'real_price' => $price,
                'discount_price' => $discount,
//                'images' => $img,
                'vedio' => $vedio
            );

            $timeline_id = $this->Timelines->update_timeline($id, $data);

            if (array_filter($_FILES['img']['name'])) {
                $delete = $this->Timelines->delete_recent($timeline_id);
                $files = $_FILES;
                if (!empty($files['img']['name'])) {
                    $count = count($_FILES['img']['name']);
                    for ($i = 0; $i < $count; $i++) {
                        $event_id = $timeline_id;
                        $_FILES['img']['name'] = $files['img']['name'][$i];
                        //  $ext = end((explode(".", $files['img']['name'][$i])));
                        $tmp = explode('.', $files['img']['name'][$i]);
                        $file_extension = end($tmp);
                        $file_name = time() . $i . "_" . ($i + 1) . "." . $file_extension;
                        $_FILES['img']['name'] = $file_name;
                        $_FILES['img']['tmp_name'] = $files['img']['tmp_name'][$i];
                        $_FILES['img']['size'] = $files['img']['size'][$i];
                        $config['upload_path'] = 'assets/images/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('img');
                        $fileName = $this->upload->data('file_name');
                        $id = $event_id;
                        $image = $file_name;
                        $imgData = array(
                            'timeline_id' => $id,
                            'images' => $image
                        );
                        $result = $this->Timelines->Timeline_img_update($id, $imgData);
                    }
                }
            }
            if ($timeline_id) {
                $this->session->set_flashdata('success', 'Timeline Update successfully');
            } else {
                $this->session->set_flashdata('error', 'Timeline not Update successfully');
            }
            redirect('Timeline/timeline_list');
            // }
        } else {
            $category = $this->input->post('cateegory');
            $slide = $this->input->post('slide');
            $caption = $this->input->post('caption');
            $shop_id = $this->input->post('shop_id');
            $discrip = $this->input->post('discrip');
            $price = $this->input->post('price');
            $discount = $this->input->post('discount');
//            $img = $this->input->post('imges]');
//            $vedio = $this->input->post('vedio');
            if (!empty($_FILES['vedio']['name'])) {
                $fileInfo = pathinfo($_FILES['vedio']['name']);
                $newName = time() . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES['vedio']['tmp_name'], "assets/vedio/" . $newName);
            }
            if (!empty($_FILES['vedio']['name'])) {
                $vedio = $newName;
            }
            $data = array(
                'category' => $category,
                'slide' => $slide,
                'caption' => $caption,
                'shop_id' => $shop_id,
                'discription' => $discrip,
                'real_price' => $price,
                'discount_price' => $discount,
                'vedio' => $vedio
            );

            $timeline_id = $this->Timelines->add_timeline($data);

            $files = $_FILES;
            if (!empty($files['img']['name'])) {
                $count = count($_FILES['img']['name']);
                for ($i = 0; $i < $count; $i++) {
                    $event_id = $timeline_id;
                    $_FILES['img']['name'] = $files['img']['name'][$i];
                    //  $ext = end((explode(".", $files['img']['name'][$i])));
                    $tmp = explode('.', $files['img']['name'][$i]);
                    $file_extension = end($tmp);
                    $file_name = time() . $i . "_" . ($i + 1) . "." . $file_extension;
                    $_FILES['img']['name'] = $file_name;
                    $_FILES['img']['tmp_name'] = $files['img']['tmp_name'][$i];
                    $_FILES['img']['size'] = $files['img']['size'][$i];
                    $config['upload_path'] = 'assets/images/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img');
                    $fileName = $this->upload->data('file_name');
                    $id = $event_id;
                    $image = $file_name;
                    $dataa = array(
                        'timeline_id' => $id,
                        'images' => $image
                    );
                    $result = $this->Timelines->Timeline_img_inssert($dataa);
                }

                if ($result) {
                    $this->session->set_flashdata('success', 'Timeline add successfully');
                } else {
                    $this->session->set_flashdata('error', 'Timeline not add successfully');
                }
                redirect('Timeline/timeline_list');
            }
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->Timelines->edit_timeline($id);
        echo json_encode($data);
    }

    public function update_timeline() {
        $id = $this->uri->segment(3);
        $edit_vedio = $this->input->post('edit_vedio');
        $category = $this->input->post('cateegory');
        $slide = $this->input->post('slide');
        $caption = $this->input->post('caption');
        $shop_id = $this->input->post('shop_id');
        $discrip = $this->input->post('discrip');
        $price = $this->input->post('price');
        $discount = $this->input->post('discount');
//            $img = $this->input->post('img');
//            $vedio = $this->input->post('vedio');

        if (!empty($_FILES['vedio']['name']) != "") {

            if (!empty($_FILES['vedio']['name'])) {
                $fileInfo = pathinfo($_FILES['vedio']['name']);
                $newName = time() . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES['vedio']['tmp_name'], "assets/vedio/" . $newName);
            }
            if (!empty($_FILES['vedio']['name'])) {
                $vedio = $newName;
            }
        } else {
            $vedio = $this->input->post('edit_vedio');
        }
        $data = array(
            'category' => $category,
            'slide' => $slide,
            'caption' => $caption,
            'shop_id' => $shop_id,
            'discription' => $discrip,
            'real_price' => $price,
            'discount_price' => $discount,
            'vedio' => $vedio
        );
        $timeline_id = $this->Timelines->update_timeline($id, $data);

        $files = $_FILES;
        if (!empty($files['img']['name'])) {
            $count = count($_FILES['img']['name']);
            for ($i = 0; $i < $count; $i++) {
                $event_id = $timeline_id;
                $_FILES['img']['name'] = $files['img']['name'][$i];
                //  $ext = end((explode(".", $files['img']['name'][$i])));
                $tmp = explode('.', $files['img']['name'][$i]);
                $file_extension = end($tmp);
                $file_name = time() . $i . "_" . ($i + 1) . "." . $file_extension;
                $_FILES['img']['name'] = $file_name;
                $_FILES['img']['tmp_name'] = $files['img']['tmp_name'][$i];
                $_FILES['img']['size'] = $files['img']['size'][$i];
                $config['upload_path'] = 'assets/images/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('img');
                $fileName = $this->upload->data('file_name');
                $id = $event_id;
                $image = $file_name;
                $imgData = array(
                    'timeline_id' => $id,
                    'images' => $image
                );
                $result = $this->Timelines->Timeline_img_update_insert($id, $imgData);
            }
        }
        $this->session->set_flashdata('success', 'Timeline Update successfully');
        redirect('Timeline/timeline_list');
    }

   

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->Timelines->delete_timeline($id);
        if ($result) {
            $this->session->set_flashdata('success', 'Timeline Delete Successfully');
        } else {
            $this->session->set_flashdata('error', 'Timeline not Delete Successfully');
        }
        redirect('Timeline/timeline_list');
    }
    
    
    /////////////////////////Category//////////////////////////////////////
     public function add_category() {
        $category = $this->input->post('category');
        $data = array(
            'name' => $category
        );
        $result = $this->Timelines->add_category($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Category Add Successfully');
        } else {
            $this->session->set_flashdata('error', 'Category not Add Successfully');
        }
        redirect();
    }
     /////////////////////////Category//////////////////////////////////////
    
     /////////////////////////Timeline//////////////////////////////////////
    
     public function add_slide(){
         
         $name = $this->input->post('slide');
      
         $data = [
             'name' => $name
         ];
         $res = $this->Timelines->add_slide($data);
         
         if ($res) {
             $this->session->set_flashdata('success','Slide Add Successfully');
         } else {
             $this->session->set_flashdata('error','Slide Not Add Successfully');
         }
         redirect('Timeline/timeline_list');
     }
}
