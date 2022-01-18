<?php

/*
/* Retrieves parameter data by activity Id
*/
if (!function_exists('param_data')) {
    
    function param_data($id){

        $ci =& get_instance();

        $ci->db->join('ncda_parameters','ncda_parameters.id=ncda_field_activity_data.parameter_id');
        $ci->db->where('activity_id',$id);
        $query = $ci->db->get('ncda_field_activity_data');
        return $query->result();
    }
}

/*
/* Retrieves activities data by objective_id
*/
if (!function_exists('activities')) {
    
    function activities($id){

        $ci =& get_instance();
        $ci->db->where('objective_id',$id);
        $query = $ci->db->get('ncda_activities');
        return $query->result();
    }
}

/*
/* Retrieves objectives data by project Id
*/
if (!function_exists('objectives')) {
    
    function objectives($id){

        $ci =& get_instance();
        $ci->db->where('project_id',$id);
        $query = $ci->db->get('ncda_ojectives');
        return $query->result();
    }
}



?>