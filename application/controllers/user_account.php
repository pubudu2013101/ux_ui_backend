<?php

/**
 * Created by PhpStorm.
 * User: pubudujayasanka
 * Date: 1/4/17
 * Time: 12:47 PM
 */
class user_account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
    }

    function user_login()
    {
        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $user_id = $json->user_email;
        $user_pass = $json->user_password;

        $user = $this->user_model->get_user($user_id, md5($user_pass));

        if ($user) {
            $arr = array('message' => 'login successful', 'user' => $user);

            // add user details to session array

            $this->session->set_userdata('user_data', $arr);
            header('Content-Type: application/json');
            echo json_encode($arr);


        } else {
            $arr = array('message' => 'login failed', 'user' => $user_id);
            header('Content-Type: application/json');
            echo json_encode($arr);
        }

    }

    function user_register()
    {
        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $data = array(
            'user_email' => $json->user_email,
            'user_password' => md5($json->user_password),
            'user_name' => $json->user_name,
            'user_mobile' => $json->user_mobile,
            'user_point' => '0'
        );


        $this->user_model->insert_user($data);
        header('Content-Type: application/json');
        echo json_encode(array("message" => "registered"));


    }

    function user_update()
    {
        $details = file_get_contents("php://input");
        $json = json_decode($details);

        $user_email = $json->user_email;

        $data = array(

            'user_password' => md5($json->user_password),
            'user_name' => $json->user_name,
            'user_mobile' => $json->user_mobile,
        );

        $this->user_model->update_user($user_email,$data);
        header('Content-Type: application/json');
        echo json_encode(array("message" => "updated"));

    }
}