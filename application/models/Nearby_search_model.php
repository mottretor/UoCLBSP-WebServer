<?php

class Nearby_search_model extends CI_Model
{
//    public function search_results()
//    {
//        if(isset($_POST['searchPlace']))
//        {
//            $search = $_POST['searchPlace'];
//
//            $query = $this->load->db->select('name')->from('room')->where('name', $search)->limit(5)->get();
//
//        }
//    }

    function search_place($search_place){
        return $this->db->like('name', $search_place, 'both')->order_by('name', 'ASC')->limit(5)->get('room')->result();

    }
}