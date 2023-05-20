<?php 

class M_history_product extends CI_Model { 
  
  // table are used in this model 
  private $table = 'history_product';

  function get(){
    return $this->db->get($this->table)->result();
  }
}
  ?>