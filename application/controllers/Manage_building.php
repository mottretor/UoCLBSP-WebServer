<?php

class Manage_building extends CI_Controller{
    
    public function index() {
        echo "fgsfdgdfgdf";
    }

    public function search(){
        $this->load->view('buildings/search');

        $this->load->model('manage_building_model');
        $this->manage_building_model->search();
    }
    
    public function add(){
        $this->load->view('buildings/add');

        $this->load->model('manage_building_model');
        $this->manage_building_model->add();
    }

    public function update(){
        $this->load->view('buildings/edit');

        $this->load->model('manage_building_model');
        $this->manage_building_model->update();
    }

    public function delete(){
        $this->load->view('buildings/edit');

        $this->load->model('manage_building_model');
        $this->manage_building_model->delete();
    }
}
