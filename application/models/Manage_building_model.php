<?php

class Manage_building_model extends CI_Model
{
    public function add($data)
    {
//        $data = array(
//            'name' => $this->input->post('building_name'),
//            'description' => $this->input->post('description'),
//            'latitudes' => $this->input->post('latitudes'),
//            'longitudes' => $this->input->post('longitudes'),
//            'graph_id' => $this->input->post('graphId')
//        );
//
        return $this->db->insert('building', $data);

//        redirect("baby_form/index");
    }

//    public function update_building()
//    {
//        $data = array(
//            'desciption' => $this
//        );
//    }

}
