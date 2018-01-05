<?php

class Manage_building_model extends CI_Model
{
    public function add($data)
    {
        return $this->db->insert('building', $data);

    }

    public function search($searches){
        $this->db->select('description, latitudes, longitudes, graph_id')
            ->from('building')
            ->where('name', $searches)
            ->limit($limit, $offset);
    }

//    public function update_building()
//    {
//        $data = array(
//            'desciption' => $this
//        );
//    }

}
