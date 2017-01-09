<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/4/17
 * Time: 3:16 PM
 */
class place_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('place_model');
    }

    function get_unlock_places(){

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $user_id = $json->user_email;

        $data = $this->place_model->get_unlock_places($user_id);

      //  $arr = array($data);
        header('Content-Type: application/json');
        echo json_encode($data);

    }

    function get_lock_places(){

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $user_id = $json->user_email;

        $data = $this->place_model->get_lock_places($user_id);

    //    $arr = array($data);
        header('Content-Type: application/json');
        echo json_encode($data);

    }

    function get_place_des(){

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $data = $this->place_model->get_place_description($json->place_id);

        $arr = array('place' => $data);
        header('Content-Type: application/json');
        echo json_encode($arr);
    }

    function add_to_favorite(){

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $place_id = $json->place_id;
        $user_id = $json->user_email;

        $data = array(
            'user_email' => $user_id,
            'place_id' => $place_id
        );
        $this->place_model->add_favorite($data);

        $arr = array('message' => "Added to Favorites");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }

    function add_to_unlock(){

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $place_id = $json->place_id;
        $user_id = $json->user_email;

        $data = array(
            'user_email' => $user_id,
            'place_id' => $place_id
        );
        $this->place_model->unlock_place($data);

        $arr = array('message' => "Added to Favorites");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }

    function get_fav_places(){

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $user_id = $json->user_email;

        $data = $this->place_model->get_favorite_places($user_id);

      //  $arr = array('places' => $data);
        header('Content-Type: application/json');
        echo json_encode($data);

    }
}