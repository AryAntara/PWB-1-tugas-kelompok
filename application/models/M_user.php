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
}
