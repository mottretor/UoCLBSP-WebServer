<?php

class Nearby_search extends CI_Controller
{
    function test()
    {
        $this->load->model('Nearby_search_model');
        $this->nearby_search_model->test();
    }

    function __construct(){
        parent::__construct();
        $this->load->model('nearby_search_model');
    }

    function index(){
        $this->load->view('nearby_search');
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->nearby_search_model->search_room_type($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->type;
                echo json_encode($arr_result);
            }
        }
//        echo $arr_result;
    }

    function get_nearby_places()
    {
        if (isset($_POST['source_name'])) {
//            echo 'poo';

            $this->load->model('Nearby_search_model');
            $data = array(
                'name' => $this->input->post('source_name'),
                'lat1' => $this->input->post('source_lat'),
                'lng1' => $this->input->post('source_lng'),
                'type' => $this->input->post('room_type'),
            );
            $this->nearby_search_model->search_nearby_places($data);

        }

//        $this->load->model('nearby_search_model');
//        $places = $this->nearby_search_model->search_nearby_places();
//        echo $places;
    }
}