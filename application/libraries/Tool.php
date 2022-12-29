<?php 
/**
 * 
 * Class of same function that used in defferent controller
 * @license MIT
 */
Class Tool {
    // ci setup library 
    private $ci;

    function __construct(){
        $this->ci = &get_instance();
    }

    /**
    * 
    * validating user has login or not 
    * @return boolean
    * @param boolean $response, default value is true
    *
    */
    public function validate_login($response = true){
        $login_session = $this->ci->session->userdata('id') ? true : false; 
        if(!$login_session){

            // send response to client
            if($response){
                echo json_encode(['status' => 'error', 'msg' => 'user not login','code' => '106']);
            }
            return false;
        } 
        return true;
    }
}