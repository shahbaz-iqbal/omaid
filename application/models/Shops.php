<?php

Class Shops extends CI_Model {

    public function add_shop($data) {
        $this->db->insert('shop', $data);
        return $this->db->insert_id();
    }

    public function add_shop_social_links($data) {
        return $this->db->insert('social_links', $data);
    }

    public function get_shop() {
        $result = $this->db->select('shop.*,mall.name as mall_name,category.name as cat_name')
                        ->from('shop')
                        ->join('mall', 'mall.id = shop.mall_id', 'left')
                        ->join('category', 'category.id = shop.category', 'left')
                        ->get()->result();
        return $result;
    }

    public function get_shop_name() {
        $result = $this->db->select('shop.name as ShopName,shop.id as ShopId')
                        ->from('shop')
                        ->get()->result();
        return $result;
    }

    public function get_shop_detail_by_id($id) {
        $result = $this->db->select('shop.*,social_links .*,category.name as CatName')
                        ->from('shop')
                        ->join('social_links', 'social_links.shop_id = shop.id', 'left')
                        ->join('category', 'category.id = shop.category', 'left')
                        ->where('shop.id', $id)
                        ->get()->result();
        return $result;
    }

    public function shop_filter($filter) {

        if ($filter['category'] != "" || $filter['location']) {
            $result = $this->db->select('shop.*,category.name as CatName, mall.name as MallName')
                            ->from('shop')
                            ->join('category', 'category.id = shop.category', 'left')
                            ->join('mall', 'mall.id = shop.mall_id', 'left')
                            ->where('shop.category', $filter['category'])
                            ->or_where('shop.location', $filter['location'])
                            ->get()->result();
            echo 'half';
        } else {
            $result = $this->db->select('shop.*,category.name as CatName ,mall.name as MallName')
                            ->from('shop')
                            ->join('category', 'category.id = shop.category', 'left')
                            ->join('mall', 'mall.id = shop.mall_id', 'left')
                            //  ->where('category', $filter['category'])
                            ->get()->result();
            echo 'full';
        }

        return $result;
    }

    public function get_category() {
        $this->db->select("name,id");
        $query = $this->db->get("category");
        $result = $query->result();
        return $result;
    }

    public function get_mall_id() {
        $query = $this->db->get("mall");
        $result = $query->result();
        return $result;
    }

    public function check_shop_id($id) {
        $this->db->select('shop_id');
        $this->db->from('social_links');
        $this->db->where('social_links.shop_id', $id);  // Also mention table name here
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
            ;
        }
    }

    public function edit_shop($id) {

        $result = $this->db->select('shop.*,social_links.facebook,social_links.twitter,social_links.google,social_links.linkedin')
                        ->from('shop')
                        ->join('social_links', 'social_links.shop_id = shop.id', 'left')
                        ->where('shop.id', $id)
                        ->get()->row();
        return $result;
    }

    public function Update_shop($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('shop', $data);
        return $result;
    }

    public function update_shop_social_links($id, $data) {
        $this->db->where('shop_id', $id);
        $result = $this->db->update('social_links', $data);
        return $result;
    }

    public function delete_shop($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('shop');
        return $result;
    }

    public function add_mall($data) {
        return $this->db->insert('mall', $data);
    }

    public function get_mall() {
        $query = $this->db->get("mall");
        $result = $query->result();
        return $result;
    }

// filter for multiple array data fetch
//    public function mall_filter($category) {
//
//        $this->db->from('shop');
//        $res = $this->db->where_in('category', $category);
//        $query = $this->db->get();
//
//        return $query->result();
//    }
    public function mall_filter($category) {

        $this->db->from('mall');
        $res = $this->db->where('location', $category);
        $query = $this->db->get();

        return $query->result();
    }

    public function all_mall_shop($mall_id) {
        $this->db->select('*')
                ->from('shop')
                ->where('mall_id', $mall_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function edit_mall($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('mall');
        $result = $query->row();
        return $result;
    }

    public function update_mall($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('mall', $data);
        return $result;
    }

    public function get_bill_filter($id, $date) {
        $result = $this->db->select('bill.*, users.username as UserName, vouchers.name as VouherName')
                        ->from('bill')
                        ->join('users', 'users.id = bill.user_id', 'left')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                        ->where('bill.shop_id', $id)
                ->like('purchase_date', $date)
                        ->get()->result();

        return $result;
    }

    public function get_bill($id) {
        $result = $this->db->select('bill.*, users.username as UserName, vouchers.name as VouherName')
                        ->from('bill')
                        ->join('users', 'users.id = bill.user_id', 'left')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                        ->where('bill.shop_id', $id)
                        ->get()->result();

        return $result;
    }

    public function get_shop_bill_detail($id) {
        $result = $this->db->select('bill.*, users.username as UserName, users.workplace as UserWorkPlace, vouchers.name as VoucherName, bill_detail.product_name, bill_detail.price as BillDetailPrice, bill_detail.discounted_price as BillDetailDiscountPrice')
                        ->from('bill')
                        ->join('users', 'users.id = bill.user_id', 'left')
                        ->join('vouchers', 'vouchers.id = bill.voucher_id', 'left')
                        ->join('bill_detail', 'bill_detail.bill_id = bill.id', 'left')
                        ->where('bill.id', $id)
                        ->get()->result();
        return $result;
    }

    /////////////////////////////Gallary Shops////////////////////////////////////
    public function get_Shop_gallery() {
        $result = $this->db->select('shop_gallery.*,category.name as cat_name,shop.name as ShopName')
                        ->from('shop_gallery')
                        // ->join('shop_gallery_images', 'shop_gallery_images.shop_gallery = shop_gallery.id', 'left')
                        ->join('shop', 'shop.id = shop_gallery.shop_id', 'left')
                        ->join('category', 'category.id = shop_gallery.category_id', 'left')
                        ->get()->result();
        return $result;
    }

    public function get_shop_gallery_by_id($id) {
        $result = $this->db->select('shop_gallery.*,category.name as cat_name,shop.name as ShopName')
                        ->from('shop_gallery')
                        // ->join('shop_gallery_images', 'shop_gallery_images.shop_gallery = shop_gallery.id', 'left')
                        ->join('shop', 'shop.id = shop_gallery.shop_id', 'left')
                        ->join('category', 'category.id = shop_gallery.category_id', 'left')
                        ->where('shop_gallery.shop_id', $id)
                        ->get()->result();
        return $result;
    }

    public function get_shop_category_by_id($id) {
       $result = $this->db->select('category.name as cat_name,shop_category.*')
                        ->from('shop_category')
                        // ->join('shop_gallery_images', 'shop_gallery_images.shop_gallery = shop_gallery.id', 'left')
                        ->join('category', 'category.id = shop_category.category_id', 'left')
                        //->join('category', 'category.id = shop_gallery.category_id', 'left')
                        ->where('shop_category.shop_id', $id)
                        ->group_by('category.id')
                        ->get()->result();
        return $result;
    }
    public function get_shop_slide() {
        $result = $this->db->select('*')
                        ->from('slide')
                        ->get()->result();
        return $result;
    }
    public function insert_shop_category($data) {
        $this->db->insert('shop_category', $data);
        return $this->db->insert_id();
    }
    public function add_shop_gallery($data) {
        $this->db->insert('shop_gallery', $data);
        return $this->db->insert_id();
    }

    public function Shop_gallery_img_insert($data) {
        $this->db->insert('shop_gallery_images', $data);
        return $this->db->insert_id();
    }

    public function edit_shop_gallery($id) {
        $this->db->from('shop_gallery');
        $res = $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function edit_timeline_image($id) {
        $this->db->select('images,id');
        $this->db->from('shop_gallery_images');
        $res = $this->db->where('shop_gallery_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_shop_gallery($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('shop_gallery', $data);
        return $updated_id = $id;
    }

    public function Shop_img_update_insert($imgData) {
        //$this->db->where('shop_gallery_id', $idd);
        $this->db->insert('shop_gallery_images', $imgData);
    }

    public function delete_single_img($data) {
        $this->db->where('images', $data);
        return $result = $this->db->delete('shop_gallery_images');
    }

}
