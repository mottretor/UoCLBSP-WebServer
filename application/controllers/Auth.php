<?php
/**
 * Created by PhpStorm.
 * Auth: Chathurya
 * Date: 3/29/2018
 * Time: 3:04 PM
 */

class Auth extends CI_Controller
{
    public function sign_up(){
        $this->form_validation->set_rules('username', 'Username', 'required');

    }

}