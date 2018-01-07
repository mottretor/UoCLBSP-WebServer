<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 1/6/2018
 * Time: 9:11 AM
 */

class Manage_people extends CI_Controller
{
    public function people()
    {
        $this->load->view('people/add');
    }

    public function add_people()
    {
        $this->load->model('manage_people_model');
        $data = array(
            'name' => $this->input->post('building_name'),
            'description' => $this->input->post('description'),
            'building' => $this->input->post('latitudes'),
            'longitudes' => $this->input->post('longitudes'),
            'graph_id' => $this->input->post('graphId')
        );

        $this->manage_building_model->add($data);
        redirect(base_url() . 'index.php/Admin_home/buildings');

//        $this->load->model('manage_building_model');
//        $this->manage_building_model->add();
    }

}