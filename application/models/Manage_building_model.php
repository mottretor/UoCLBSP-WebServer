<?php

class Manage_building_model extends CI_Model
{
    public function add($data)
    {
        return $this->db->insert('building', $data);

    }

//    public function search($name)
//    {
////        $this->db->select('*');
////        $this->db->from('building');
//        $this->db->like('name', $name);
//        return $this->db->get('building')->result();
//
//// Produces SQL:
//// SELECT * FROM Books WHERE BookName LIKE '%Power%';
//    }

    public function edit(){
        $this->db->select('name, description, latitudes, longitudes, graph_id');
        $this->db->from('buildings');
        $query = $this->db->get();
        $details = $query->result();
    }

    public function search($term){
        $data = array();
        $this->db->select('description, latitudes, longitudes, graph_id');
        $this->db->like('name', $term);
        $Q = $this->db->get('products');
        if($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
                $data[] = $row;
                $data = array(
                    'building_name' => 'name',
                    'description' => 'description',
                    'latitudes' => 'latitudes',
                    'longitudes' => 'longitudes',
                    'graphId' => 'graph_id'
                );
            }
        }
        $Q->free_result();
        return $data;

    }
}
