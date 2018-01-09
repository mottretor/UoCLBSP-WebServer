<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 1/7/2018
 * Time: 6:20 PM
 */

class Manage_room_types extends CI_Controller
{
    public function room_type()
    {
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

    public function search_room_type()
    {
        $this->load->model('manage_room_types_model');

        $datasearch1 = array(
            'type' => $this->input->post('type'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch);

        $this->manage_room_types_model->selected($datasearch1);

//        $this->manage_room_types_model->edit($datasearch2);

    }

    public function update_room_type()
    {
        $this->load->model('manage_room_types_model');

        $datasearch2 = array(
            'type' => $this->input->post('type'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch2);

//        $this->load->view('room_types/edit', $datasearch2);

        $this->manage_room_types_model->edit($datasearch2);
    }

    public function change_room_type()
    {
        $this->load->model('manage_room_types_model');

        $datasearch3 = array(
            'type' => $this->input->post('type'),
            'description' => $this->input->post('description'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch3);

        $this->manage_room_types_model->change($datasearch3);

//        $this->load->view('room_typess/edit');
    }

    public function delete_room_type()
    {
        $this->load->model('manage_room_types_model');

        $datasearch4 = array(
            'id' => $this->input->post('id'),
        );

        $this->manage_room_types_model->delete($datasearch4);
    }
}