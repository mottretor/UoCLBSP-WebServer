<?php

class Manage_building extends CI_Controller{
    
    public function index() {
        echo "fgsfdgdfgdf";
    }
    
    public function add(){
        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('include/footer');
        
        $this->load->model('manage_building_model');
        $this->manage_building_model->add_building();
    }
}
