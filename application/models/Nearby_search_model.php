<?php

class Nearby_search_model extends CI_Model
{
    function test()
    {
        $lat1 = 6.90482657022505;
        $lng1 = 79.85762448542789;

        $awaka = "SELECT id,
    ( 3959 * acos( cos( radians(?) ) * cos( radians(latitudes) ) * cos( radians(?) - radians(longitudes) )
    + sin( radians(?) ) * sin( radians(latitudes) ) ) ) AS distance
    FROM building HAVING distance < 50 ORDER BY distance LIMIT 0 , 20";
        $result = $this->db->query($awaka, array($lat1, $lng1, $lat1));
//        var_dump($result);
        $rows = $result->row_array();
//            var_dump($rows);
//        $rows['name'];
        $data = array(
            'id' => $rows['id'],
        );
        var_dump($data);
    }

    function search_room_type($location_type)
    {
        return $this->db->select('type, id')->like('type', $location_type, 'both')->order_by('type', 'ASC')->limit(5)->get('room_type')->result();
    }

    function search_nearby_places($data)
    {
        $lat1 = $data['lat1'];
        $lng1 = $data['lng1'];
//        echo $lat1;
//        echo $lng1;

//        $lat1 = 6.90482657022505;
//        $lng1 = 79.85762448542789;

        $awaka = "SELECT id,
    ( 3959 * acos( cos( radians(?) ) * cos( radians(latitudes) ) * cos( radians(?) - radians(longitudes) )
    + sin( radians(?) ) * sin( radians(latitudes) ) ) ) AS distance
    FROM building HAVING distance < 100 ORDER BY distance LIMIT 0 , 20";
        $result = $this->db->query($awaka, array($lat1, $lng1, $lat1));
//        var_dump($result);
        $rows = $result->row_array();
//            var_dump($rows);
//        $rows['name'];
        $data = array(
            'id' => $rows['id'],
        );
        var_dump($data);
        $this->load->view('nearby_search_display', $data);


//        $awaka = $this->db->query('SELECT id,
//    ( 3959 * acos( cos( radians(?) ) * cos( radians(latitudes) ) * cos( radians(?) - radians(longitudes) )
//    + sin( radians(?) ) * sin( radians(latitudes) ) ) ) AS distance
//    FROM building HAVING distance < 5');
//        $result = $this->db->query($awaka, array($lat1, $lng1, $lat1));
//        echo $result;
//        $lat1 = $data['lat1'];
//        $lng1 = $data['lng1'];
//        $query = "SELECT id,
//                  ( 3959 * acos( cos( radians(%s) ) * cos( radians( 'lat' ) ) * cos( radians( 'lng' ) - radians(%s) )
//                  + sin( radians(%s) ) * sin( radians( lat ) ) ) ) AS distance
//                  FROM room HAVING distance < 25;";
//        $result = $this->db->query($query, array($lat1, $lng1, $lat1));
//        echo $result;
//        $setlat = 13.5234412;
//        $setlong = 144.8320897;
//        $awaka = "SELECT 'id',
//    ( 3959 * acos( cos( radians('lat1') ) * cos( radians('lat') ) * cos( radians($lng1) - radians('lng') )
//    + sin( radians($lat1) ) * sin( radians('lat') ) ) ) AS 'distance'
//    FROM 'room' HAVING 'distance < 5'";
//        $result = $this->db->query($awaka, array($lat1, $lng1, $lat1));
//        echo $result;

//        return $this->db->select('id', ( 3959 * acos( cos( radians(37) ) * cos( radians( latitudes ) ) * cos( radians( longitudes ) - radians(-122) ) + sin( radians(37) ) * sin( radians( lat ) ) ) ))->as('distance')->from('room')->having('distance' < 25)->orderby('distance')->limit(0, 20);
//        SELECT id, ( 3959 * acos( cos( radians(37) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(-122) ) + sin( radians(37) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < 25 ORDER BY distance LIMIT 0 , 20;

    }

}