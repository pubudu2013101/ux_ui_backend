<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/4/17
 * Time: 1:23 PM
 */
class quiz_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('quiz_model');
    }

    function get_quizes()
    {

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $place_id = $json->place_id;

        $data = $this->quiz_model->get_quizes($place_id);
        $arr = array('quizes' => $data);
        header('Content-Type: application/json');
        echo json_encode($arr);

    }

    function add_quiz()
    {

        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $data = array(
            'question' => $json->question,
            'c_ans' => $json->c_ans,
            'w_ans_1' => $json->w_ans_1,
            'w_ans_2' => $json->w_ans_2,
            'w_ans_3' => $json->w_ans_3,
            'quiz_img' => $json->quiz_img,
            'place_id' => $json->place_id
        );


        $this->quiz_model->insert_quiz($data);
        header('Content-Type: application/json');
        echo json_encode(array("message" => "quiz added"));
    }

    /* URLS

        localhost/ui_ux_backend/user_account/user_register


    */

}