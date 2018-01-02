<?php

class Manage_building_model extends CI_Model
{

    public function search()
    {

        if (isset($_POST['SearchBuilding'])) {
            $buildingName = $_POST['buildingName'];
//            require 'DbConn.php';
            $sql = "SELECT * FROM EventTable WHERE name = '$buildingName'";
            $query3 = mysqli_query($con, $sql)
            or die(mysqli_error($con));
            while ($row = mysqli_fetch_assoc($query3)) {

            }
        }

    }

    public function add_building()
    {
        $data = array(
            'name' => $this->input->post('BuildingName'),
            'description' => $this->input->post('Description'),
            'latitudes' => $this->input->post('Latitudes'),
            'longitudes' => $this->input->post('Longitudes'),
        );

        return $this->db->insert('buildings', $data);
    }

    public function update_building()
    {
        $data = array(
            'desciption' => $this
        );
    }

}
