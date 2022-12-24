<?php 

/** 
 *
 * class for manage product model 
 *
 */  
class M_product extends CI_Model { 
  /**
   *
   * table are used in this model 
   */ 
  private $table = 'product';

  /**
   *
   * get all product data 
   * @return Array 
  */
  public function get_product(){
     return $this->db->get($this->table)->result();
  }

  /** 
   *
   * get product by id 
   * @param string $product_id, id product for get product data 
   * @return Array 
   */
  public function get_by_id($product_id){
    return $this->db->where('id_produk',$product_id)->get($this->table)->row();
  }
   
}
?>
