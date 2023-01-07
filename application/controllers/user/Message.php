<?php 

/**
 * 
 * Class for handling message 
 * 
 */

 Class Message extends CI_Controller {

    /**
     * 
     * Message view 
     * 
     */
    function index(){
        $this->template->render('message');

    }

    /**
     * 
     * recieve message and send it to admin
     * 
     */
    function receive(){
        $message = $this->input->post('message');
        $socket_id = $this->input->post('socket_id');

        // setup bot url
        $url_bot = $this->tool->url_bot;

        // create curl resource 
        $ch = curl_init(); 

         // set url 
        curl_setopt($ch, CURLOPT_URL,$url_bot); 

        $headers = [
            'Content-Type: application/json',
        ];
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //data 
        $payload = json_encode( 
            [ 
                "to" =>  $this->tool->admin_number, 
                "message" => $message,
                "socketId" => $socket_id 
            ]);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_exec($ch);
    }


 }