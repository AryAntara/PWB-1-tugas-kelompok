<?php 

/** 
 *
 * class for manage product model 
 *
 */  
class M_tentang_kami extends CI_Model { 
  
  // table are used in this model 
  private $table = 'tentang_kami';

  function get(){
    return $this->db->get($this->table)->result();
  }
}
  ?>