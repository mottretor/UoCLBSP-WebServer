<?php

class Manage_building_model extends CI_Model {

    public function add_building() {
        $data = array(
            'name' => $this->input->post('BuildingName'),
            'description' => $this->input->post('Description'),
            'latitudes' => $this->input->post('Latitudes'),
            'longitudes' => $this->input->post('Longitudes'),
        );
        
        return $this->db->insert('building', $data);
    }

}
