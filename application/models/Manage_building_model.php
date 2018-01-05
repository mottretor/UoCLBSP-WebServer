<?php

class Manage_building_model extends CI_Model
{
    public function add($data)
    {
        return $this->db->insert('building', $data);

    }

    public function search($name){
//        $this->db->select('*');
//        $this->db->from('building');
        $this->db->like('name', $name);
        return $this->db->get('building')->result();
//        return $query->result();
//        $query = $this->db->get();


// Produces SQL:
// SELECT * FROM Books WHERE BookName LIKE '%Power%';
    }

//    public function update_building()
//    {
//        $data = array(
//            'desciption' => $this
//        );
//    }

}
