<?php

class Manage_building_model extends CI_Model
{
    public function add($data)
    {
        return $this->db->insert('building', $data);

    }

    public function selected($datasearch1)
    {
//        var_dump($datasearch1);
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];
//            echo $name;
            $query = $this->db->select('*')->from('building')->where('id', $id)->get();
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

            $this->load->view('buildings/selected', $data2);
        }
    }

    public function edit($datasearch2)
    {
//        echo 'ok';
//        var_dump($datasearch2);
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];
            $query = $this->db->select('*')->from('building')->where('id', $id)->get();
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

            $this->load->view('buildings/edit', $data2);
        }
    }

    public function change($datasearch3)
    {
//        var_dump($datasearch3);
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];

            $data3 = array(
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'latitudes' => $_POST['latitudes'],
                'longitudes' => $_POST['longitudes'],
                'graph_id' => $_POST['graphId']
            );
            $this->db->where('id', $id)->update('building', $data3);
        }
    }

    public function delete($datasearch4)
    {
        if (isset($_POST['name'])) {
//            echo 'poo';
            $id = $_POST['id'];
            $this->db->where('id', $id)->delete('building');

        }
    }
}
