<?php

Class Timelines extends CI_Model {

    public function get_timeline() {
        
         $result = $this->db->select('timeline.*,timeline_images.images as TimelineImage')
                        ->from('timeline')
                        ->join('timeline_images', 'timeline_images.timeline_id = timeline.id', 'left')
                        ->group_by('timeline.id')
                        ->get()->result();
        return $result;
    }
      public function add_timeline($data) {
          
        $this->db->insert('timeline', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
     public function Timeline_img_inssert($data) {
         
           $result = $this->db->insert('timeline_images', $data);
        return $result;
    }
    
    public function edit_timeline($id) {
        
        $this->db->where('id', $id);
        $query = $this->db->get('timeline');
        $result = $query->row();
        return $result;
    }
    public function get_edit_images($id) {
        $this->db->select('images,id');
        $this->db->where('timeline_id', $id);
        $query = $this->db->get('timeline_images');
        $result = $query->result();
        return $result;
    }

    public function update_timeline($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('timeline', $data);
         return $updated_id = $id;
       
        
    }
    public function Timeline_img_update_insert($id, $imgData) {
        $this->db->where('timeline_id', $id);
        $this->db->insert('timeline_images', $imgData);
         return $updated_id = $id;
       
        
    }

    public function add_category($data) {
        $this->db->insert('category', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get_shops() {
        $query = $this->db->get("shop");
        $result = $query->result();
        return $result;
    }

    public function delete_timeline($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete('timeline');
        return $result;
    }

   
    public function delete_recent($id) {
         $this->db->where('timeline_id', $id);
        return $this->db->delete('timeline_images');
    }
    
    public function Timeline_img_update($id,$data) {
        $this->db->where('id', $id);
      return $result = $this->db->insert('timeline_images', $data);
    }
    public function delete_single_img($data) {
        $this->db->where('images', $data);
      return $result = $this->db->delete('timeline_images');
    }
    
    /////////////////////////////////////////Timeline/////////////////////////////////////////////
    
    public function add_slide($name){
        
        return $result = $this->db->insert('slide',$name); 
    }






    /////////////////////////////////////////Timeline/////////////////////////////////////////////
    
    

}
