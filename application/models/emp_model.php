<?php
  
  class Emp_model extends CI_model{

    function employee ($formArray)
      {
        $this->db->insert('emp',$formArray);
      }
      function all() {
         return $emp =  $this->db->get('emp')->result_array();
      }
  }
?>