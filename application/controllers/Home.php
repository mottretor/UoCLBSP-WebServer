<?php
/**
 * Created by PhpStorm.
 * Auth: Chathurya
 * Date: 3/29/2018
 * Time: 9:36 PM
 */

class Home extends CI_Controller{
    public function sign_up(){
        $this->load->view('user/sign_up');
    }

    public function login(){
        $this->load->view('user/login');
    }
}