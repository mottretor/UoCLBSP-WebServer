<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 1/7/2018
 * Time: 6:18 PM
 */

class Manage_room_types_model extends CI_Model
{
    public function add($data){
        return $this->db->insert('room_type', $data);
    }

    public function selected($datasearch1)
    {
//        var_dump($datasearch1);
        if (isset($_POST['type'])) {
//            echo 'poo';
            $id = $_POST['id'];
//            echo $type;
            $query = $this->db->select('*')->from('room_type')->where('id', $id)->get();
//            $query = $this->db->query("SELECT * FROM room_types where name = '$type';");
//            var_dump($query);

            $rows = $query->row_array();
//            var_dump($rows);
//            $rows['name'];
            $data2 = array(
                'id' => $rows['id'],
                'type' => $rows['type'],
                'description' => $rows['description'],
            );
//            var_dump($data2);

            $this->load->view('room_types/selected', $data2);
        }
    }

    public function edit($datasearch2)
    {
//        echo 'ok';
//        var_dump($datasearch2);
        if (isset($_POST['type'])) {
//            echo 'poo';
            $id = $_POST['id'];
            $query = $this->db->select('*')->from('room_type')->where('id', $id)->get();
//            $query = $this->db->select('*')->from('room_types')->like('name', $type, 'before')->get();
//            $query = $this->db->query("SELECT * FROM room_types where name = '$type';");
//            var_dump($query);

            $rows = $query->row_array();
//            var_dump($rows);
//            $rows['name'];
            $data2 = array(
                'id' => $rows['id'],
                'type' => $rows['type'],
                'description' => $rows['description'],
            );
//            var_dump($data2);

            $this->load->view('room_types/edit', $data2);
        }
    }

    public function change($datasearch3)
    {
//        var_dump($datasearch3);
        if (isset($_POST['type'])) {
//            echo 'poo';
            $id = $_POST['id'];

            $data3 = array(
                'type' => $_POST['type'],
                'description' => $_POST['description'],
            );
            $this->db->where('id', $id)->update('room_type', $data3);
        }
    }

    public function delete($datasearch4)
    {
        if (isset($_POST['type'])) {
//            echo 'poo';
            $id = $_POST['id'];
            $this->db->where('id', $id)->delete('room_type');

        }
    }
}