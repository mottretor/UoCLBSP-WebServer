<?php
/**
 * Created by PhpStorm.
 * Auth: Chathurya
 * Date: 1/6/2018
 * Time: 9:04 AM
 */

class Manage_people_model extends CI_Model
{
    public function add($data)
    {
        if(isset($_POST['people_name'])){
            $building_name = $_POST['building_name'];
            $query1 = $this->db->select('id')->from('building')->where('name', $building_name)->get();
            $rows = $query1->row_array();
            $building_id = array(
                'building_id' => $rows['id']
            );

            $room_name = $_POST['room_name'];
            $query2 = $this->db->select('id')->from('room')->where('name', $room_name)->get();
            $rows2 = $query2->row_array();
            $room_id = array(
                'room_id' => $rows2['id']
            );

            $data3 = array(
                'name' => $_POST['people_name'],
                'designation' => $_POST['designation'],
                'description' => $_POST['description'],
//                'building_id' => $building_id['building_id'],
                'room_id' => $room_id['room_id']
            );

            return $this->db->insert('people', $data3);
        }


    }

}