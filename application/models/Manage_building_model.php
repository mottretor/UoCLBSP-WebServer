<?php
class Manage_building_model extends CI_Model
{
    public function display_buildings()
    {
        $query = $this->db->select('latitudes, longitudes, name, description')->from('building')->get();
        return $query->result();
    }

    function search_buildings($name)
    {
        return $this->db->select('name, id, description, latitudes, longitudes')->like('type', $name, 'both')->order_by('name', 'ASC')->limit(5)->get('building')->result();
    }

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
            $this->load->view('buildings/selected_building', $data2);
        }
    }
    public function edit($name)
    {
////        echo 'ok';
////        var_dump($datasearch2);
//        if (isset($_POST['name'])) {
////            echo 'poo';
//            $id = $_POST['id'];
//            $query = $this->db->select('*')->from('building')->where('id', $id)->get();
////            $query = $this->db->select('*')->from('building')->like('name', $name, 'before')->get();
////            $query = $this->db->query("SELECT * FROM building where name = '$name';");
////            var_dump($query);
//            $rows = $query->row_array();
////            var_dump($rows);
////            $rows['name'];
//            $data2 = array(
//                'id' => $rows['id'],
//                'name' => $rows['name'],
//                'description' => $rows['description'],
//                'latitudes' => $rows['latitudes'],
//                'longitudes' => $rows['longitudes'],
//                'graph_id' => $rows['graph_id']
//            );
////            var_dump($data2);
//            $this->load->view('buildings/edit_building', $data2);
//        }

        $query = $this->db->select('*')->from('building')->where('name', $name)->get();
        $rows = $query->row_array();
        $data2 = array(
                'id' => $rows['id'],
                'name' => $rows['name'],
                'description' => $rows['description'],
                'latitudes' => $rows['latitudes'],
                'longitudes' => $rows['longitudes'],
                'graph_id' => $rows['graph_id']
            );

        //$this->load->view('buildings/edit_building', $data2);
        return $data2;



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