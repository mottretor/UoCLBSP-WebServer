<?php

class Manage_building_model extends CI_Model
{

//    public function search()
//    {
//
//        if (isset($_POST['SearchBuilding'])) {
//            $buildingName = $_POST['buildingName'];
////            require 'DbConn.php';
//            $sql = "SELECT * FROM EventTable WHERE name = '$buildingName'";
//            $query3 = mysqli_query($con, $sql)
//            or die(mysqli_error($con));
//            while ($row = mysqli_fetch_assoc($query3)) {
//
//            }
//        }
//
//    }

    public function add_building()
    {
        $data = array(
            'name' => $this->input->post('building_name'),
            'description' => $this->input->post('description'),
            'latitudes' => $this->input->post('latitudes'),
            'longitudes' => $this->input->post('longitudes'),
            'graph_id' => $this->input->post('graph_id')
        );

        return $this->db->insert('building', $data);
    }

//    public function update_building()
//    {
//        $data = array(
//            'desciption' => $this
//        );
//    }

}
