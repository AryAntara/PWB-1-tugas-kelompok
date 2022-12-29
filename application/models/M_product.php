<?php 

/** 
 *
 * class for manage product model 
 *
 */  
class M_product extends CI_Model { 
  
  // table are used in this model 
  private $table = 'product';

  /**
   *
   * get all product data 
   * @return Array 
  */
  public function get_product($pagination = null){
    if($pagination){
      return $this->db->get($this->table,$pagination['from'],$pagination['to'])->result;
    }
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

  /**
   * 
   * get price only
   * @param int $id
   * @return int 
   */
  public function get_price($id){
    return $this->get_by_id($id)->harga; 
  }

  /**
   * 
   * get title only
   * @param int $id
   * @return int 
   */
  public function get_title($id){
    return $this->get_by_id($id)->nama_produk;
  }

  /**
   * 
   * get img only
   * @param int id 
   * @return string 
   */
  public function get_img($id){
    return $this->get_by_id($id)->gambar_produk;
  }

  /**
   * 
   * product length
   * 
   */
  public function get_length(){
    return $this->db->get($this->table)->num_rows();
  }
   
}
?>
