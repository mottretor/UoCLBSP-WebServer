<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 1/7/2018
 * Time: 6:20 PM
 */

class Manage_rooms extends CI_Controller
{
    public function rooms()
    {
        $this->load->view('rooms/add');
    }

    public function add_room()
    {
        $this->load->model('manage_rooms_model');
        $data = array(
            'name' => $this->input->post('room_name'),
            'description' => $this->input->post('description'),
            'floor' => $this->input->post('floor'),
            'room_type' => $this->input->post('room_type'),
            'building_name' => $this->input->post('building_name')
        );

        $this->manage_rooms_model->add($data);
    }
}