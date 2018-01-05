<?php

class Admin_home extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin_home');
    }

    public function buildings()
    {
        $this->load->view('buildings/add');
    }

}
