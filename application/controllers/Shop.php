<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function shops() {
        $res = $this->Shops->get_shop();
        $category = $this->Shops->get_category();
        $ress = $this->Shops->get_mall_id();
        $passData = [
            'data' => $res,
            'category' => $category,
            'mall' => $ress
        ];

        $this->load->view('shops/shop', $passData);
    }

    public function filter() {

        $category_name = $this->input->post('category');
        $location = $this->input->post('location');
        $passData = [
            'category' => $category_name,
            'location' => $location
        ];
        $filter = $this->Shops->shop_filter($passData);
        $res = $this->Shops->get_category();
        $passData = [
            'filterdata' => $filter,
            'data' => $res
        ];

        $this->load->view('shops/shop_filter', $passData);
    }

    public function shop_detail() {
        $id = $this->uri->segment(3);
        //Gallery
        $category = $this->Shops->get_category();
        $shops = $this->Shops->get_shop_name();
        $shop_gallery = $this->Shops->get_Shop_gallery();
//        $data = [
//            'gallery' => $shop_gallery,
//            'category' => $category,
//            'shop' => $shops
//        ];
        //Gallery
        /////////////filter shop bill////////////////////
//        $user_id_bill = $this->input->post('user_id_bill');
//        $year = $this->input->post('year');
//        $month = $this->input->post('month');
//        $user_id_bill = $this->input->post('user_id_bill');
//        $date = $month . '/' . $year;
//
//        $date = $month . '/' . $year;
//     
//        if (!empty($date)) {
//            $bill = $this->Shops->get_bill_filter($user_id_bill,$date);
//           
//        } else {
//             $bill = $this->Shops->get_bill($id);
//        }
   
        /////////////filter shop bill////////////////////
        
        $shop_category = $this->Shops->get_shop_category_by_id($id);
        $user_detail = $this->Shops->get_shop_detail_by_id($id);
        $shop_gallery = $this->Shops->get_shop_gallery_by_id($id);
        $shop_slide = $this->Shops->get_shop_slide();
   
        $passData = [
            'shop_slide' => $shop_slide,
            'shop_category' => $shop_category,
            'gallery' => $shop_gallery,
            'category' => $category,
            //'shop' => $shops,
            'shop' => $shop_gallery,
            'user' => $user_detail,
        //    'bill' => $bill
        ];
        $this->load->view('shops/detail', $passData);
    }

    public function shop_bill_detail() {
        
        $id = $this->uri->segment(3);
        $res = $this->Shops->get_shop_bill_detail($id);
        $passData = [
            'data' => $res
        ];
        $this->load->view('shops/bill_detail', $passData);
    }
    public function add_shop_category() {
        $cat_shop_id = $this->input->post('cat_shop_id');
        $category = $this->input->post('categoryname');
        
        $passData = [
            'shop_id' => $cat_shop_id,
            'category_id' => $category
        ];
         $res = $this->Shops->insert_shop_category($passData);
         redirect('shop/shops');
//$this->load->view('shops/shop');
    }

    public function add() {
        if ($this->input->post('editId')) {
            $id = $this->input->post('editId');
            $term = $this->input->post('term');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $facebook = $this->input->post('facebook');
            $twitter = $this->input->post('twitter');
            $google = $this->input->post('google');
            $linkedin = $this->input->post('linkedin');
            // $social = implode(", ", $this->input->post('social'));
            $disc = $this->input->post('disc');
            $category = $this->input->post('category');
            $name = $this->input->post('name');
            $location = implode(", ", $this->input->post('location'));
            $mallName = $this->input->post('mallName');
            $editimage = $this->input->post('editimage');

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
            $data = array(
                'term_condition' => $term,
                'email' => $email,
                'discription' => $disc,
                'phone' => $phone,
                'category' => $category,
                'name' => $name,
                'location' => $location,
                'mall_id' => $mallName,
                'image' => $logo
            );
            $result = $this->Shops->update_shop($id, $data);
            $shop_id_get = $this->Shops->check_shop_id($id);
            if (!empty($shop_id_get)) {
                $socail = [
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'google' => $google,
                    'linkedin' => $linkedin,
                ];
                $result = $this->Shops->update_shop_social_links($id, $socail);
            } else {
                $socail = [
                    'shop_id' => $id,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'google' => $google,
                    'linkedin' => $linkedin,
                ];
                $result = $this->Shops->add_shop_social_links($socail);
            }
            if ($result) {
                $this->session->set_flashdata('success', 'Shop Edit Successfully');
            } else {
                $this->session->set_flashdata('error', 'Shop not Edit Successfully');
            }
            redirect('Shop/shops');
        } else {
            $term = $this->input->post('term');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $facebook = $this->input->post('facebook');
            $twitter = $this->input->post('twitter');
            $google = $this->input->post('google');
            $linkedin = $this->input->post('linkedin');
            $disc = $this->input->post('disc');
            $category = $this->input->post('category');
            $name = $this->input->post('name');
            $location = implode(", ", $this->input->post('location'));
            $mallName = $this->input->post('mallName');
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
                'term_condition' => $term,
                'email' => $email,
                'discription' => $disc,
                'phone' => $phone,
                'category' => $category,
                'name' => $name,
                'location' => $location,
                'mall_id' => $mallName,
                'image' => $logo
            );

            $shop_id = $this->Shops->add_shop($data);
            $socail = [
                'shop_id' => $shop_id,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'google' => $google,
                'linkedin' => $linkedin,
            ];
            $result = $this->Shops->add_shop_social_links($socail);
            if ($result) {
                $this->session->set_flashdata('success', 'Shop Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'Shop not Add Successfully');
            }
            redirect('Shop/shops');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data = $this->Shops->edit_shop($id);
        echo json_encode($data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $result = $this->Shops->delete_shop($id);
        if ($result) {
            $this->session->set_flashdata('success', 'Shop Delete Successfully');
        } else {
            $this->session->set_flashdata('error', 'Shop not Delete Successfully');
        }
        redirect('Shop/shops');
    }

    public function mall() {
        $res = $this->Shops->get_mall();
        $passData = [
            'data' => $res
        ];
        $this->load->view('shops/mall', $passData);
    }

    public function mall_detail() {
        $mall_id = $this->uri->segment('3');
        $res = $this->Shops->all_mall_shop($mall_id);
        $passData = [
            'data' => $res
        ];
        $this->load->view('shops/mall_detail', $passData);
    }

    public function mall_shops() {
        $this->load->view('shops/mall_shops');
    }

    public function filter_mall() {
        $category = $this->input->post('location');
        $res = $this->Shops->mall_filter($category);
        $passData = [
            'data' => $res
        ];
        $this->load->view('shops/mall_filter', $passData);
    }

    public function add_mall() {
        if ($this->input->post('editId')) {
            $id = $this->input->post('editId');
            $editimg = $this->input->post('editimg');
            $name = $this->input->post('name');
            $location = $this->input->post('location');
//            $img = $this->input->post('img');

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
                'location' => $location,
                'image' => $logo
            );
            $result = $this->Shops->update_mall($id, $data);
            if ($result) {
                $this->session->set_flashdata('success', 'Mall Edit Successfully');
            } else {
                $this->session->set_flashdata('error', 'Mall not Edit Successfully');
            }
            redirect('Shop/Mall');
        } else {
            $name = $this->input->post('name');
            $location = $this->input->post('location');
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
                'location' => $location,
                'image' => $logo
            );
            $result = $this->Shops->add_mall($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Mall Add Successfully');
            } else {
                $this->session->set_flashdata('error', 'Mall not Add Successfully');
            }
            redirect('Shop/Mall');
        }
    }

    public function mall_edit() {
        $id = $this->uri->segment(3);
        $data = $this->Shops->edit_mall($id);
        echo json_encode($data);
    }

    /////////////////////////////////////Shop Galery List/////////////////////////////////////////


//    public function gallerry() {
//        $category = $this->Shops->get_category();
//        $shops = $this->Shops->get_shop_name();
//        $shop_gallery = $this->Shops->get_Shop_gallery();
//        $data = [
//            'gallery' => $shop_gallery,
//            'category' => $category,
//            'shop' => $shops
//        ];
//        $this->load->view('shops/shop_gallery', $data);
//    }

    public function gallery_add() {

        $user_id = $this->input->post('user_id');
        echo '<pre>';
print_r($user_id);
echo '</pre>';
die();
        $category = $this->input->post('category');
        $title = $this->input->post('title');
        $before = $this->input->post('before');
        $after = $this->input->post('after');
        $shopName = $this->input->post('shopName');
        // $img = $this->input->post('img[]');

        if (!empty($_FILES['vedio']['name'])) {
            $fileInfo = pathinfo($_FILES['vedio']['name']);
            $newName = time() . '.' . $fileInfo['extension'];
            move_uploaded_file($_FILES['vedio']['tmp_name'], "assets/vedio/" . $newName);
        }
        if (!empty($_FILES['vedio']['name'])) {
            $vedio = $newName;
        }
        $data = array(
            'category_id' => $category,
            'title' => $title,
            'before_price' => $before,
            'after_price' => $after,
            'shop_id' => $shopName,
            'vedio' => $vedio
        );
        $timeline_id = $this->Shops->add_shop_gallery($data);
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
                    'shop_gallery_id' => $id,
                    'images' => $image
                );
                $result = $this->Shops->Shop_gallery_img_insert($dataa);
            }
            if ($result) {
                $this->session->set_flashdata('success', 'Shop Gallery add successfully');
            } else {
                $this->session->set_flashdata('error', 'Shop Gallery not add successfully');
            }
            redirect('Shop/shop_detail/' . $user_id);
        }
    }

    public function edit_gallery() {
        $id = $this->uri->segment(3);
        $timeline = $this->Shops->edit_shop_gallery($id);
        $timeline_image = $this->Shops->edit_timeline_image($id);
        $category = $this->Shops->get_category();
        $shops = $this->Shops->get_shop_name();
        $data = [
            'timeline_image' => $timeline_image,
            'data' => $timeline,
            'category' => $category,
            'shop' => $shops
        ];
        $this->load->view('shops/shop_gallery_edit', $data);
    }

    public function update_gallery_shop() {
        $id = $this->uri->segment(3);
        $category = $this->input->post('category');
        $title = $this->input->post('title');
        $before = $this->input->post('before');
        $after = $this->input->post('after');
        $shopName = $this->input->post('shopName');

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
            'category_id' => $category,
            'title' => $title,
            'before_price' => $before,
            'after_price' => $after,
            'shop_id' => $shopName,
            'vedio' => $vedio
        );

        $timeline_id = $this->Shops->update_shop_gallery($id, $data);

        // $timeline_id = 1;
        $files = $_FILES;
        if (!empty($files['img']['name'][0])) {
            echo 'not empty';
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
                $file_name = $this->upload->data('file_name');
                $idd = $event_id;
                $image = $file_name;

                $imgData = array(
                    'shop_gallery_id' => $idd,
                    'images' => $image
                );

                $result = $this->Shops->Shop_img_update_insert($imgData);
            }
        }
        $this->session->set_flashdata('success', 'Gallery Update successfully');
        //$this->load->view('shop/shop_detail/'.$id);
        redirect('shop/shop_detail/'.$id);
    }

    public function delete_image() {
        $name = $this->input->post('name');
        // $id = $this->input->post('id');
        $res = $this->Shops->delete_single_img($name);
        echo json_encode($res);
    }

}
