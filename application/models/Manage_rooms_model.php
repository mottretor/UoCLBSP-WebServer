<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 1/7/2018
 * Time: 6:17 PM
 */

class Manage_rooms_model extends CI_Model
{
    public function add($data){
        if(isset($_POST['room_name'])){
            $room_type = $_POST['room_type'];
//            echo $room_type;
            $query1 = $this->db->select('id')->from('room_type')->where('type', $room_type)->get();
            $rows = $query1->row_array();
            $room_type_id = array(
                'room_type_id' => $rows['id']
            );

            $building_name = $_POST['building_name'];
            $query2 = $this->db->select('id')->from('building')->where('name', $building_name)->get();
            $rows2 = $query2->row_array();
            $building_id = array(
                'building_id' => $rows2['id']
            );

            $data3 = array(
                'name' => $_POST['room_name'],
                'description' => $_POST['description'],
                'floor' => $_POST['floor'],
                'room_type_id' => $room_type_id['room_type_id'],
                'building_id' => $building_id['building_id']
            );
            return $this->db->insert('room', $data3);

        }
    }

    public function selected($datasearch1)
    {
        var_dump($datasearch1);
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];
//            echo $name;
            $query = $this->db->select('*')->from('room')->where('id', $id)->get();
//            $query = $this->db->query("SELECT * FROM building where name = '$name';");
//            var_dump($query);

            $rows = $query->row_array();
//            var_dump($rows);
            $rows['name'];
            $data2 = array(
                'id' => $rows['id'],
                'name' => $rows['name'],
                'description' => $rows['description'],
                'latitudes' => $rows['latitudes'],
                'longitudes' => $rows['longitudes'],
                'graph_id' => $rows['graph_id']
            );
//            var_dump($data2);

            $this->load->view('rooms/selected_room', $data2);
        }
    }

    public function edit($datasearch2)
    {
//        echo 'ok';
//        var_dump($datasearch2);
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];
            $query = $this->db->select('*')->from('room')->where('id', $id)->get();
//            $query = $this->db->select('*')->from('building')->like('name', $name, 'before')->get();
//            $query = $this->db->query("SELECT * FROM building where name = '$name';");
//            var_dump($query);

            $rows = $query->row_array();
//            var_dump($rows);
//            $rows['name'];
            $data2 = array(
                'id' => $rows['id'],
                'name' => $rows['name'],
                'description' => $rows['description'],
                'latitudes' => $rows['latitudes'],
                'longitudes' => $rows['longitudes'],
                'graph_id' => $rows['graph_id']
            );
//            var_dump($data2);

            $this->load->view('rooms/edit_room', $data2);
        }
    }

    public function change($datasearch3)
    {
//        var_dump($datasearch3);
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];
//            $room_type_id = $_POST['room_type_id'];
//            $building_id = $_POST['building_id'];

            $data3 = array(
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'floor' => $_POST['floor'],
                'room_type_id' => $_POST['room_type_id'],
                'building_id' => $_POST['building_id']
            );
            $this->db->where('id', $id)->update('room', $data3);
        }
    }

    public function delete($datasearch4)
    {
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];
            $this->db->where('id', $id)->delete('room');

        }
    }

}