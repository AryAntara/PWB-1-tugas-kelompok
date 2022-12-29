<?php 

/**
 * 
 * class for User Logout
 * 
 */
Class Logout extends CI_Controller {
    /**
     * 
     * logout an user 
     * 
     */
    function index(){
        // clear cart 
        $this->empty_cart();
        session_destroy();

        // redirect to home 
        redirect();
    }

    /**
     * 
     * empty cart from an user 
     * 
     */
    private function empty_cart(){
        $this->cart->destroy();
    }
}