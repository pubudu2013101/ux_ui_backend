<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/4/17
 * Time: 3:09 PM
 */
class quiz_model extends CI_Model
{

    function get_quizes($place_id){

        $this->db->select("*");
        $this->db->from('quiz_table');
        $this->db->where('place_id',$place_id);
        $query = $this->db->get();
        return $query->result();
    }

    function insert_quiz($data){

        $this->db->insert('quiz_table', $data);
    }
}