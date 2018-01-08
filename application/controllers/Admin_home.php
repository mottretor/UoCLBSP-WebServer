<?php

class Admin_home extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin_home');
    }

    public function add_polygon(){
        $this->load->view('add_polygon');
    }

    public function add_road(){
        $this->load->view('add_road');
    }

    public function buildings()
    {
        $this->load->view('buildings/add');
    }

    public function people()
    {
        $this->load->view('people/add');
    }

}
