<?php

/*
 * Custom Helpers
 *
 */

//set flash data
if (!function_exists('set_flash')) {
    function set_flash($message,$isError=false)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        $msgClass =  ($isError)?'danger':'success';
        return $ci->session->set_flashdata($msgClass,$message);
    }
}

if (!function_exists('get_flash')) {
    function get_flash($key)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        return $ci->session->flashdata($key);
    }
}

//read from language file

if (!function_exists('lang')) {
    function lang($string)
    {
        $ci =& get_instance();
        return $ci->lang->line($string);
    }
}

//print old form data
if (!function_exists('old')) {
    function old($field)
    {
        $ci =& get_instance();
        return html_escape($ci->session->flashdata('form_data')[$field]);
    }
}

//print old form data
if (!function_exists('truncate')) {
    function truncate($content,$limit)
    {
      return (strlen($content)>$limit)? substr($content,0,$limit)."...":$content;
    }
}

?>