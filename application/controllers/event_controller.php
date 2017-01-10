<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/10/17
 * Time: 9:39 AM
 */
class event_controller extends CI_Controller
{
    function add_event(){

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $e_header = $json->event_header;
        $e_details = $json->event_details;
        $e_date = $json->event_date;
        $e_image = $json->event_img;

        $data = array(
            'event_hearder' => $e_header,
            'event_details' => $e_details,
            'event_date' => $e_date,
            'event_images' => $e_image
        );
        $this->event_model->add_event($data);

        $arr = array('message' => "Added to Favorites");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }

    function get_events(){

        $data = $this->event_model->get_events();

        $arr = array('events' => $data);
        header('Content-Type: application/json');
        echo json_encode($arr);
    }

}