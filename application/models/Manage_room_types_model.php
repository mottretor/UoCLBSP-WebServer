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
}