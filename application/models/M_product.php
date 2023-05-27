<?php

/** 
 *
 * class for manage product model 
 *
 */
class M_product extends CI_Model
{

  // table are used in this model 
  private $table = 'product';

  /**
   *
   * get all product data 
   * @return Array 
   */
  public function get_product($pagination = null)
  {
    if ($pagination) {
      $data = $this->db->get($this->table, $pagination['amount'], $pagination['from'])->result();
      return $data;
    }
    return $this->db->get($this->table)->result();
  }

  /** 
   *
   * get product by id 
   * @param string $product_id, id product for get product data 
   * @return Array 
   */
  public function get_by_id($product_id)
  {
    return $this->db->where('id_produk', $product_id)->get($this->table)->row();
  }

  /**
   * 
   * get price only
   * @param int $id
   * @return int 
   */
  public function get_price($id)
  {
    return $this->get_by_id($id)->harga;
  }

  /**
   * 
   * get title only
   * @param int $id
   * @return int 
   */
  public function get_title($id)
  {
    return $this->get_by_id($id)->nama_produk;
  }

  /**
   * 
   * get img only
   * @param int id 
   * @return string 
   */
  public function get_img($id)
  {
    return $this->get_by_id($id)->gambar_produk;
  }

  /**
   * 
   * product length
   * 
   */
  public function get_length()
  {
    return $this->db->get($this->table)->num_rows();
  }

  /**
   * 
   * update stock 
   * 
   * @param intiger $id
   * @param intiger $qty
   * 
   */
  public function  update_stock($id, $qty)
  {
    // get stok product
    $data = $this->get_by_id($id)->stok;

    $last_stok = $data - $qty;

    $this->db->where('id_produk', $id)->update($this->table, ['stok' => $last_stok]);
  }

  /**
   * 
   * search a product 
   * @param string $name
   *
   */
  public function search($name)
  {
    $this->db->like('nama_produk', $name, 'both');
    return $this->db->get($this->table)->result();
  }

  public function count()
  {
    return $this->db->get($this->table)->num_rows();
  }
  public function where($where)
  {
    return $this->db->where($where)->get($this->table)->row();
  }
  public function insert($data){
    $this->db->insert($this->table, $data);
  }
}
