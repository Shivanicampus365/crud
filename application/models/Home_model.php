<?php
class Home_model extends CI_Model {
    function addData($data)
    {
         return $this->db->insert('img',$data);
    }
}

?>
