<?php

class Nearby_search extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('nearby_search_model');
    }

    function index(){
        $this->load->view('nearby_search');
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->nearby_search_model->search_place($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->name;
                echo json_encode($arr_result);
            }
        }
    }
}