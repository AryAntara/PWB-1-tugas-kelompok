<?php

/** 
 * Class for manage model user 
 *
 * @author team_4 
 * @license MIT 
 */

class M_user extends CI_Model {
  /**
   * default table for control user 
   *
   * @var string 
   * @protected
   */ 
  protected $table = 'user';

  /**
   * insert new user to database 
   *
   * @param array $data, the $data contains information for the user 
   */ 
  public function insert_user($data){
    $this->db->insert($this->table,$data);
  }

  /** 
   * get user from database by their email or username
   *
   * @param string $email, the $email is email from that user
   * @return object $msqli_result, the result from mysql
   */ 
  public function get_user($email,$username = null){
    if($username){
      return $this->db->where(['username' => $username])->get($this->table)->row();
    }
    return $this->db->where(['email' => $email])->get($this->table)->row();
  }
  /**
   * check username is not using by other user 
   * 
   * @param string $username, the $username is username from the current user 
   * @return boolean $status, the $status is status of the username was picked by user 
   */ 
  public function check_username($username){
    return $this->db->where(['username' => $username])->get($this->table)->result() ? false : true;
  }
  /**
   * update user from database by new user data
   *
   * @param array $data, the $data contains new user data 
   * @param string $email, the $email uses for find the user want to change their data
   */
  public function update_user($email,$data){
    $this->db->where(['email' => $email])->update($this->table,$data);
  }

  /**
   * 
   * get user id by username 
   *
   * @param string $username, the $username 
   *
   */  
  public function get_id($username){
    return $this->db->where('username',$username)->get($this->table)->row()->id;
  }
  /**
   * 
   * set product favorit for user 
   * 
   */
  public function set_favorite($id_product,$id_user){

    // get data from db
    $favorite_data = $this->db->where('id',$id_user)->get($this->table)->row()->favorit; 
    if($favorite_data){
      $favorite_data= json_decode($favorite_data);

      // check if product has favorited by user
      if(in_array($id_product,$favorite_data) === false){
        array_push($favorite_data,$id_product);
      }

      // update data on database
      $this->db->where('id',$id_user)->update($this->table,['favorit' => json_encode($favorite_data)]);
      
    } else {

      // if no data 
      $this->db->where('id',$id_user)->update($this->table,['favorit' => json_encode([$id_product])]);
    };
  }

   /**
   * 
   * set product favorit for user 
   * 
   */
  public function remove_favorite($id_product,$id_user){

    // get data from db
    $favorite_data = $this->db->where('id',$id_user)->get($this->table)->row()->favorit; 
    if($favorite_data){
      $favorite_data = json_decode($favorite_data);

      // new data
      $new_data = [];

      foreach($favorite_data as $item){
        if($item != $id_product){
          
          // data is not product id to remove
          array_push($new_data, $item);
        } 
      }

      // update data on database
      $this->db->where('id',$id_user)->update($this->table,['favorit' => json_encode($new_data)]);
      
    } 
  }
}
