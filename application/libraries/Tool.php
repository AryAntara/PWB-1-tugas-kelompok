<?php

/**
 * 
 * Class of same function that used in defferent controller
 * @license MIT
 */
class Tool
{
    // ci setup library 
    private $ci;
    public $url_bot;
    public $admin_number;

    function __construct()
    {
        $this->ci = &get_instance();
        $this->url_bot = "http://localhost:8888/message";
        $this->admin_number = "6281337328692";
    }

    /**
     * 
     * validating user has login or not 
     * @return boolean
     * @param boolean $response, default value is true
     *
     */
    public function validate_login($response = true)
    {
        $login_session = $this->ci->session->userdata('id') ? true : false;
        if (!$login_session) {

            // send response to client
            if ($response) {
                echo json_encode(['status' => 'error', 'msg' => 'user not login', 'code' => '106']);
            }
            return false;
        }
        return true;
    }

    /**
     * Generate html from an simple parameter
     * @param string $tag
     * @param Array $options
     * @param string $content default ""
     * @return string
     * 
     */
    function html($tag, $options, $content = "")
    {
        $parsed_option = $this->html_options($options);
        return "<$tag $parsed_option>$content</$tag>";
    }

    /**
     * @param Array $options
     */
    function html_options($options)
    {
        $opt = "";
        foreach ($options as $key => $value) {
            $opt .= " $key='$value' ";
        }
        return $opt;
    }

    /**
     * seacrhing an array element 
     * @param array $array
     * @param array | string $where
     */
    function search($array, $where)
    {
        if (is_array($where)) {
            return $array[$this->search_with_array($array, $where)];
        }

        return $array[array_search($where, $array)];
    }

    /**
     * seacrhing an array element 
     * @param array $array
     * @param array $where
     */
    function search_with_array($array, $where)
    {
        $found = 0;
        foreach ($array as $i => $item) {
            $skip = false;
            $item = (array)$item;
            foreach ($where as $key => $search_item) {
                if ($item[$key] !== $search_item) {
                    $skip = true;
                    break;
                }
            }
            if (!$skip) {
                $found = $i;
                break;
            }
        }
        return $found;
    }
}
