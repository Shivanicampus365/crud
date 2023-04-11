<?php
  
  class Image_model extends CI_model{

    function store($data)
      {
        return $this->db->insert('image', $data);

       // echo $this->db->last_query();die;
      }
      function all() {
         return $image =  $this->db->get('image')->result_array();
      }

     
  }
?>