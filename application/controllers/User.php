<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 3/29/2018
 * Time: 3:04 PM
 */

class User extends CI_Controller
{
    public function login(){
        $this->load->view('user/login');
    }

    public function sign_up(){
        $this->load->view('user/sign_up');
    }
}