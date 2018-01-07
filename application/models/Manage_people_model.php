<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 1/6/2018
 * Time: 9:04 AM
 */

class Manage_people_model extends CI_Model
{
    public function add($data)
    {
        return $this->db->insert('people', $data);

    }



//    public function search($term){
//        $data = array();
//        $this->db->select('description, latitudes, longitudes, graph_id');
//        $this->db->like('name', $term);
//        $Q = $this->db->get('products');
//        if($Q->num_rows() > 0){
//            foreach ($Q->result_array() as $data){
//                $data = array(
//                    'name' => 'name',
//                    'description' => 'description',
//                    'latitudes' => 'latitudes',
//                    'longitudes' => 'longitudes',
//                    'graphId' => 'graph_id'
//                );
//            }
//        }
//        $Q->free_result();
//        return $data;
//
//    }
}