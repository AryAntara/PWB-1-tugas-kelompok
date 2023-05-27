<?php 
/** 
 *
 * class for manage product model 
 *
 */  
class M_order extends CI_Model { 
  
  // table are used in this model 
  private $table = 'order';

  function get(){
    return $this->db->get($this->table)->result();
  }
  function insert($data){
    return $this->db->insert($this->table, $data);
  }
  
   public function count(){      
     return $this->db->get($this->table)->num_rows(); 
   }
}
