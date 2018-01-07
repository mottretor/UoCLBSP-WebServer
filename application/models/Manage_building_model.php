<?php

class Manage_building_model extends CI_Model
{
    public function add($data)
    {
        return $this->db->insert('building', $data);

    }

    public function search($datasearch)
    {
//        var_dump($datasearch);


        if (isset($_POST['building_name'])) {
//            echo 'poo';
            $name = $_POST['building_name'];
            $query = $this->db->select('*')->from('building')->like('name',$name, 'before')->get();
//            $query = $this->db->query("SELECT * FROM building where name = '$name';");
//            var_dump($query);

            $rows = $query->row_array();
            var_dump($rows);
//            $rows['name'];
            $data2 = array(
                'building_name' => $rows['name'],
                'description' => $rows['description'],
                'latitudes' => $rows['latitudes'],
                'longitudes' => $rows['longitudes'],
                'graph_id' => $rows['graph_id']
            );
//            var_dump($data2);

            $this->load->view('buildings/edit', $data2);
//            $this->buildings/edit->

//            var_dump($row);
//            foreach ($rows as $row) {
//                echo $row['name'];
////                $data2 = array(
////                    $building_name => 'name',
////                    'description' => 'description',
////                    'latitudes' => 'latitudes',
////                    'longitudes' => 'longitudes',
////                    'graph_id' => 'graphId'
////                );
//            }
//            $rows->free_result();
//            return $data2;
//            echo $data2;
//            echo $row;



//            $maxID = $row['pool_id'];

        }
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

    public function edit()
    {
        $this->db->select('name, description, latitudes, longitudes, graph_id');
        $this->db->from('buildings');
        $query = $this->db->get();
        $details = $query->result();
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
