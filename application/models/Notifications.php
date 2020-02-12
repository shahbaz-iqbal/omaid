<?php

Class Notifications extends CI_Model {

    public function get_all_notification() {

        $query = $this->db->get('notification');
        $result = $query->result();
        return $result;



//         foreach ($res as $shop){
//             $id[] = $shop->shop_id;
//         }
//         $result = $this->db->select('id,shop_id')
//                        ->from('notification')
//                        ->where_in('shop_id')
////                        ->join('shop', 'shop.id = notification.shop_id', 'left')
//                      
//                        ->get()->result();
//foreach ($result as $shop){
//             $id[] =explode(',', $shop->shop_id);
//         }
//         foreach ($id as $shops){
//             $id2[] = $shops;
//         }
//
//   echo '<pre>';
//print_r($id2);
//echo '</pre>';
//$result1 = $this->db->select('name')
//                        ->from('shop')
//                        ->where_in('shop_id',$id2)
////                        ->join('shop', 'shop.id = notification.shop_id', 'left')
//                      
//                        ->get()->result();
//      echo '<pre>';
//print_r($result1);
//echo '</pre>';
//die();
    }

    public function insert_notification($data) {
        return $this->db->insert('notification', $data);
    }

    public function update_notification($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update('notification', $data);
        return $result;
    }

    public function edit_notification($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('notification');
        $result = $query->row();
        return $result;
    }

    public function send_notification($data) {
        return $this->db->insert('send_notification', $data);
    }

    public function get_send_notification() {
        $result = $this->db->select('notification.name as NoficationName,audience_name.name as AudienceName')
                        ->from('send_notification')
                        ->join('notification', 'notification.id = send_notification.notification_id', 'left')
                        ->join('audience_name', 'audience_name.id = send_notification.audience_id', 'left')
                        ->get()->result();
        return $result;
    }

    public function get_user_notification($id) {
        $result = $this->db->select('users.*')
                        ->from('send_notification')
                        ->join('audience', 'audience.audience_id = send_notification.audience_id', 'left')
                        ->join('users', 'users.id = audience.user_id', 'left')
                        ->where('send_notification.notification_id', $id)
                        ->group_by('users.username')
                        ->get()->result();
        return $result;
    }

}
