<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/10/17
 * Time: 9:39 AM
 */
class event_model extends CI_Model
{

    function add_event($data){

        $this->db->insert('upcoming_events', $data);

        $this->db->select("user_email");
        $this->db->from('user_table');
        $query = $this->db->get();
        return $query->result();
    }

    function get_events(){

        $this->db->select("*");
        $this->db->from('upcoming_events');
        $query = $this->db->get();
        return $query->result();
    }
}