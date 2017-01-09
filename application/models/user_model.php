<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/4/17
 * Time: 12:41 PM
 */
class user_model extends CI_Model
{
    function insert_user($user){

        $this->db->insert('user_table', $user);
    }

    function get_user($user_email,$user_password){

        $this->db->select("user_id,user_name,user_email,user_mobile,user_point");
        $this->db->from('user_table');
        $this->db->where('user_email',$user_email);
        $this->db->where('user_password', $user_password);
        $query = $this->db->get();
        return $query->result();
    }


    function update_user($user_id,$data){

        $this->db->where('user_email', $user_id);
        $this->db->update('user_table', $data);


    }
}