<?php

class Manage_building extends CI_Controller{
    public function add(){
        $this->load->model('manage_building_model');
        $this->manage_building_model->add_building();
    }
}
