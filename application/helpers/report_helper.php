<?php

/*
/* Retrieves activities data by objective_id
*/
if (!function_exists('activities')) {
    
    function activities($id,$branchActivity=false){

        $ci =& get_instance();
        $ci->db->where('objective_id',$id);
        $query = $ci->db->get(($branchActivity)?'branch_activities':'ncda_activities');
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
        $query = $ci->db->get('ncda_objectives');
        return $query->result();
    }
}


/*
/* Retrieves parameters data by activity Id
*/
if (!function_exists('parameters')) {
    
    function parameters($id,$branchActivity=false){

        $ci =& get_instance();
        $ci->db->where('activity_id',$id);
        $query = $ci->db->get(($branchActivity)?'branch_activty_parameters':'ncda_parameters');
        return $query->result();
    }
}

/*
/* Retrieves parameter data by param Id
*/
if (!function_exists('param_data')) {
    
    function param_data($id,$branchActivity=false){

        $ci =& get_instance();
        $ci->db->where('parameter_id',$id);

        if(isset($_GET['from']))
        $ci->db->where("action_date >='".$_GET['from']."'");

        if(isset($_GET['to']))
        $ci->db->where("action_date <='".$_GET['to']."'");

        $query = $ci->db->get( ($branchActivity)?'ncda_branch_activity_data':'ncda_field_activity_data');
        return $query->row();
    }
}




?>