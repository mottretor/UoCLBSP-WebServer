<?php
/**
 * Created by PhpStorm.
 * User: udithj
 * Date: 5/26/2018
 * Time: 8:25 PM
 */
?>

<?php

class Login extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->clear_cache();
        $this->load->model('User_model','User');

    }

    public function login(){

        $email = $_GET['email'];
        $id_token = $_GET['id_token'];
        $img_url = $_GET['img'];

        $type = $this->User->user_type($email);

        $session_data = array(
            'id_token'  => $id_token,
            'email'     => $email,
            'img'       => $img_url,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($session_data);

        //$admin = $this->User->user_type($email);


        echo json_encode($type);
    }

    public function logout(){
        $this->session->unset_userdata('id_token');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('img');
        $this->session->sess_destroy();
        session_destroy();



        //echo json_encode(array('status'=>'True'));


    }

    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}

?>
