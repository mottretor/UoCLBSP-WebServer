<?php

class Manage_building_model extends CI_Model
{
    public function add($data)
    {
        return $this->db->insert('building', $data);

    }

    public function selected($datasearch1)
    {
        var_dump($datasearch1);
        if (isset($_POST['building_name'])) {
//            echo 'poo';
            $name = $_POST['building_name'];
//            echo $name;
            $query = $this->db->select('*')->from('building')->like('name', $name, 'before')->get();
//            $query = $this->db->query("SELECT * FROM building where name = '$name';");
//            var_dump($query);

            $rows = $query->row_array();
//            var_dump($rows);
//            $rows['name'];
            $data2 = array(
//                'id' => $rows['id'],
                'building_name' => $rows['name'],
                'description' => $rows['description'],
                'latitudes' => $rows['latitudes'],
                'longitudes' => $rows['longitudes'],
                'graph_id' => $rows['graph_id']
            );
//            var_dump($data2);

            $this->load->view('buildings/selected', $data2);

        }
    }

    public function edit($datasearch2)
    {
//        echo 'ok';
//        var_dump($datasearch2);
        if (isset($_POST['building_name'])) {
//            echo 'poo';
            $name = $_POST['building_name'];
            $query = $this->db->select('*')->from('building')->like('name', $name, 'before')->get();
//            $query = $this->db->query("SELECT * FROM building where name = '$name';");
//            var_dump($query);

            $rows = $query->row_array();
            var_dump($rows);
//            $rows['name'];
            $data2 = array(
                'id' => $rows['id'],
                'building_name' => $rows['name'],
                'description' => $rows['description'],
                'latitudes' => $rows['latitudes'],
                'longitudes' => $rows['longitudes'],
                'graph_id' => $rows['graph_id']
            );
            var_dump($data2);

            $this->load->view('buildings/edit', $data2);
        }
    }

    public function change($datasearch3)
    {
        var_dump($datasearch3);
        if (isset($_POST['building_name'])) {
//            echo 'poo';
            $name = $_POST['building_name'];
            echo $name;
            $query = $this->db->select('id')->from('building')->where('name', $name);
            $rows = $query->row_array();
            $row = array(
                'id' => $rows['id']
            );
            $id = $row['id'];
//            echo $id;
            $data3 = array(
                'name' => $_POST['building_name'],
                'description' => $_POST['description'],
                'latitudes' => $_POST['latitudes'],
                'longitudes' => $_POST['longitudes'],
                'graph_id' => $_POST['graph_id']
            );
            $this->db->where('id', $id)->update('building', $data3);
//            var_dump($data2);
//            $rows = $query->row_array();
//            var_dump($rows);


//            $this->load->view('buildings/edit', $data3);
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

//    public function edit()
//    {
//        $this->db->select('name, description, latitudes, longitudes, graph_id');
//        $this->db->from('buildings');
//        $query = $this->db->get();
//        $details = $query->result();
//    }


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
