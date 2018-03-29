<?php

class Manage_building extends CI_Controller
{

    public function index()
    {
        echo "fgsfdgdfgdf";
    }

    public function building()
    {
        $this->load->view('buildings/add_building');
    }

    public function add_building()
    {
        $this->load->model('manage_building_model');
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'latitudes' => $this->input->post('latitudes'),
            'longitudes' => $this->input->post('longitudes'),
            'graph_id' => $this->input->post('graphId')
        );

        $this->manage_building_model->add($data);
        redirect('admin_home');

//        $this->load->model('manage_building_model');
//        $this->manage_building_model->add();
    }

    public function search_building()
    {
        $this->load->model('manage_building_model');

        $datasearch1 = array(
            'name' => $this->input->post('name'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch);

        $this->manage_building_model->selected($datasearch1);

//        $this->manage_building_model->edit($datasearch2);

    }

    public function update_building()
    {
        $this->load->model('manage_building_model');

        $datasearch2 = array(
            'name' => $this->input->post('name'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch2);

//        $this->load->view('buildings/edit', $datasearch2);

        $this->manage_building_model->edit($datasearch2);
    }

    public function change_building()
    {
        $this->load->model('manage_building_model');

        $datasearch3 = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'latitudes' => $this->input->post('latitudes'),
            'longitudes' => $this->input->post('longitudes'),
            'graph_id' => $this->input->post('graphId'),
            'id' => $this->input->post('id'),
        );
//        var_dump($datasearch3);

        $this->manage_building_model->change($datasearch3);

//        $this->load->view('buildings/edit');
    }

    public function delete_building()
    {
        $this->load->model('manage_building_model');

        $datasearch4 = array(
            'id' => $this->input->post('id'),
        );

        $this->manage_building_model->delete($datasearch4);
    }

}
