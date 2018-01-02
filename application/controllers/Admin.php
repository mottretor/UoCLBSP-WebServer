<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 12/30/2017
 * Time: 1:45 PM
 */

class Admin extends CI_Controller
{
    public function add(){
        $this->load->view('include/header');
        $this->load->view('buildings/add');

    }
}