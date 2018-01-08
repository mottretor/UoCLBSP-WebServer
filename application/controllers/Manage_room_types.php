<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 1/7/2018
 * Time: 6:20 PM
 */

class Manage_room_types extends CI_Controller
{
    public function room_types(){
        $this->load->view('room_types/add');
    }

    public function add_room_type()
    {
        $this->load->model('manage_room_types_model');

        $data = array(
            'type' => $this->input->post('type'),
            'description' => $this->input->post('description')
        );

        $this->manage_room_types_model->add($data);
    }
}