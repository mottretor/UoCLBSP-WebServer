<?php

class User_home extends CI_Controller
{
    public function index()
    {
        $data["call"] = True;
        $this->load->view('include/header_loggedin',$data);
        $this->load->view('include/side_navbar_user');
        //$this->load->view('admin_home');

    }

    public function home(){
        $this->load->view('search_place');
    }

    public function nearby_search()
    {
        $this->load->view('nearby_search');
    }

    public function test(){
        $this->load->view('test');
    }

    public function test2(){
        $this->load->view('search_place');
    }

}
