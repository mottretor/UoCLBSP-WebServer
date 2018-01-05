<?php

class Manage_building extends CI_Controller
{

    public function index()
    {
        echo "fgsfdgdfgdf";
    }

//    public function search(){
//        $this->load->view('buildings/search');
//
//        $this->load->model('manage_building_model');
//        $this->manage_building_model->search();
//    }

    public function building()
    {
        $this->load->view('buildings/add');
    }

    public function add_building()
    {
        $this->load->model('manage_building_model');
        $data = array(
            'name' => $this->input->post('building_name'),
            'description' => $this->input->post('description'),
            'latitudes' => $this->input->post('latitudes'),
            'longitudes' => $this->input->post('longitudes'),
            'graph_id' => $this->input->post('graphId')
        );

        $this->manage_building_model->add($data);
        redirect(base_url() . 'index.php/Admin_home/buildings');

//        $this->load->model('manage_building_model');
//        $this->manage_building_model->add();
    }

    public function search_building($name)
    {
        if(isset($_GET['term'])){
            $result = $this->mproduct->search($name);
            if (count($result) > 0) {
                foreach ($result as $buil)
                    $arr[] = $buil->name;
                echo json_decode($arr);
            }
        }



//        $query = $this->manage_building_model->search;
//        $data['building'] = null;
//        if($query){
//            $data['building'] = $query;
//        }
//        $this->load->view('buildings/edit.php', $data);
    }

//    public function update(){
//        $this->load->view('buildings/edit');
//
//        $this->load->model('manage_building_model');
//        $this->manage_building_model->update();
//    }
//
//    public function delete(){
//        $this->load->view('buildings/edit');
//
//        $this->load->model('manage_building_model');
//        $this->manage_building_model->delete();
//    }
}
