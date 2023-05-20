<?php 

/** 
 *
 * class for manage product model 
 *
 */  
class M_founder extends CI_Model { 
  
  // table are used in this model 
  private $table = 'founder';

  function get(){
    return $this->db->get($this->table)->result();
  }
}
  ?>