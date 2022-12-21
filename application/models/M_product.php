<?php 

/** 
 *
 * class for manage product model 
 *
 */  
class M_product extends CI_Model { 
  /**
   *
   * for get the list of product 
   */ 
  private $table = 'product';
  public function get_product(){
     return $this->db->get($this->table)->result();
  }
}
?>
