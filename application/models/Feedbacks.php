<?php

Class Feedbacks extends CI_Model {

    public function insert_on_note($id) {
        
       return $query = $this->db->insert('feedback_on_note',$id);
       
    }
    public function feedback_on_note() {
         $result = $this->db->select('feedback_on_note.*,shop.name as Shop_name,users.username as User_name,bill.bill_number')
                        ->from('feedback_on_note')
                        ->join('shop', 'shop.id = feedback_on_note.shop_id', 'left')
                        ->join('users', 'users.id = feedback_on_note.user_id', 'left')
                        ->join('bill', 'bill.id = feedback_on_note.bill_id', 'left')
                        ->get()->result();
        return $result;
        
    }

}
