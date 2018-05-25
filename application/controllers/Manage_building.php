<?php

class Manage_building extends CI_Controller
{
    public function index()
    {
        $this->load->view('test');
    }

    // public function __construct(){
    //     parent:: __construct();
    //     $this->load->model('Manage_building_model', 'building');
    // }

    public function test()
    {

    }

    public function building()
    {
        // $result = $this->building->display_buildings();
        // if(!empty($result)){
        //     $data4['buildings'] =$result;
        //     $this->load->view('buildings/add_building', $data4);
        // }
        $this->load->model('manage_building_model');
        $buildings['result'] = $this->manage_building_model->display_buildings();
//        var_dump($buildings);

        $this->load->view('buildings/add_building', $buildings);
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
