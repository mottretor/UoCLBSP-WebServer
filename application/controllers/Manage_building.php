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

//    public function search_building($name, $buildingName)
//    {
//        if (isset($_GET['term'])) {
//            $result = $this->buildi->search($name);
//            if (count($result) > 0) {
//                foreach ($result as $build)
//                    $arr[] = $build->name;
//                    $res[] = $build;
//                echo json_decode($arr);
//            }
//            return $build;
//        }
//
//        if (isset($_POST['building_name'])) {
//            $search['results']
//            $result = $this->buildi->search($buildingName);
//            if (count($result) > 0) {
//                $details = array(
//                    'building_name' => 'name',
//                    'description' => 'description',
//                    'latitudes' => 'latitudes',
//                    'longitudes' => 'longitudes',
//                    'graphId' => 'graph_id'
//                );
////                $output = '<div>'.$details['building_name'].'</div>';
//
//            }
//        }
//    }

    public function search()
    {
        if ($this->input->post('term')) {
            $search['results'] = $this->Mproducts->search($this->input->post('term'));
        } else {
//            redirect(base_url() . 'index.php/Admin_home/buildings');
        }
        $data['description'] = 'description';
        $this->load->vars($data);
        $this->load->view('buildings/edit', $data);
//        console.log(description);
    }

    public function edit_building()
    {
        echo 'pl';
//        $this->search_building();

//        if (isset($_GET['term'])) {
//            $result = $this->buildi->search($name);
//            if (count($result) > 0) {
//                foreach ($result as $buil)
//                    $arr[] = $buil->name;
//                echo json_decode($arr);
//            }
//        }
//        $query = $this->Manage_building_model->edit();
//        $details = array(
//            'building_name' => 'name',
//            'description' => 'description',
//            'latitudes' => 'latitudes',
//            'longitudes' => 'longitudes',
//            'graphId' => 'graph_id'
//        );


//        $data1['buildings'] = null;
//        if($query){
//            $data1['buildings'] = $query;
//        }

        $this->load->view('buildings/edit');
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
