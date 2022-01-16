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

if (!function_exists('paginate')) {
function paginate($route,$totals,$perPage=20,$segment=2)
    {
        $ci =& get_instance();
        $config = array();
        
        $config["base_url"] = base_url().$route;
        $config["total_rows"]     = $totals;
        $config["per_page"]       = $perPage;
        $config["uri_segment"]    = $segment;
        $config['full_tag_open']  = '<br> <nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'first';
        $config['last_link'] = 'last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-item"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $ci->pagination->initialize($config);
       
        return $ci->pagination->create_links();
    }
}

?>