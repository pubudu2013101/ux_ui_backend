<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/4/17
 * Time: 3:16 PM
 */
class place_model extends CI_Model
{

    function get_unlock_places($user_email)
    {

        $this->db->select("*");
        $this->db->from('unlock_places p');
        $this->db->join('place_table c', 'p.place_id = c.place_id');
        $this->db->where('user_email', $user_email);
        $query = $this->db->get();
        return $query->result();

    }

    function get_lock_places($user_email)
    {

        $this->db->select("*");
        $this->db->from('unlock_places p');
        $this->db->join('place_table c', 'c.place_id = p.place_id', 'right');
        $this->db->where('user_email IS NULL');
        $query = $this->db->get();
        return $query->result();

    }

    function get_place_description($place_id)
    {

        $this->db->select("*");
        $this->db->from('place_table');
        $this->db->where('place_id', $place_id);
        $query = $this->db->get();
        return $query->result();
    }

    function add_favorite($data)
    {

        $this->db->insert('favorite_places', $data);
    }

    function unlock_place($data)
    {

        $this->db->insert('unlock_places', $data);
    }

    function get_favorite_places($user_email)
    {

        $this->db->select("*");
        $this->db->from('favorite_places p');
        $this->db->join('place_table c', 'p.place_id = c.place_id');
        $this->db->where('user_email', $user_email);
        $query = $this->db->get();
        return $query->result();

    }
}