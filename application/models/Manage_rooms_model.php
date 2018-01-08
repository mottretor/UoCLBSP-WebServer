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

}