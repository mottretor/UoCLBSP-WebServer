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
        $this->load->view('rooms/add_room');
    }

    public function add_room()
    {
        $this->load->model('manage_rooms_model');
        $data = array(
            'name' => $this->input->post('room_name'),
            'description' => $this->input->post('description'),
            'floor' => $this->input->post('floor'),
            'room_type' => $this->input->post('room_type'),
            'room_name' => $this->input->post('room_name')
        );

        $this->manage_rooms_model->add($data);
        redirect('admin_home');
    }

    public function search_room()
    {
        $this->load->model('manage_rooms_model');

        $datasearch1 = array(
            'name' => $this->input->post('name'),
            'id' => $this->input->post('id'),
        );
        var_dump($datasearch1);

        $this->manage_rooms_model->selected($datasearch1);

//        $this->manage_room_model->edit($datasearch2);

    }

    public function update_room()
    {
        $this->load->model('manage_rooms_model');

        $datasearch2 = array(
            'name' => $this->input->post('name'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch2);

//        $this->load->view('rooms/edit', $datasearch2);

        $this->manage_rooms_model->edit($datasearch2);
    }

    public function change_room()
    {
        $this->load->model('manage_rooms_model');

        $datasearch3 = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'floor' => $this->input->post('floor'),
            'room_type_id' => $this->input->post('room_type_id'),
            'building_id' => $this->input->post('building_id'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch3);

        $this->manage_rooms_model->change($datasearch3);

//        $this->load->view('rooms/edit');
    }

    public function delete_room()
    {
        $this->load->model('manage_rooms_model');

        $datasearch4 = array(
            'id' => $this->input->post('id'),
        );

        $this->manage_rooms_model->delete($datasearch4);
    }
}