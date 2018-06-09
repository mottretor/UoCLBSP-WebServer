<?php

class Nearby_search_model extends CI_Model
{
    function test()
    {
        $lat1 = 6.90482657022505;
        $lng1 = 79.85762448542789;
        $type = 'Canteen';

        $query = "SELECT room.id,
        ( 3959 * acos( cos( radians(6.90482657022505) ) * cos( radians(building.latitudes) ) * cos( radians(79.85762448542789) 
        - radians(building.longitudes) ) + sin( radians(6.90482657022505) ) * sin( radians(building.latitudes) ) ) ) AS distance
        FROM building, room, room_type WHERE room_type.type = 'Canteen' AND room_type.id = room.room_type_id AND room.building_id = building.id 
        HAVING distance < 100 ORDER BY distance LIMIT 0 , 20;";
        $result = $this->db->query($query);
//        var_dump($result);
        $rows = $result->row_array();
        $data['result'] = array(
            'id' => $rows['id']
        );
//        var_dump($data);
    }

    function search_room_type($location_type)
    {
        return $this->db->select('type, id')->like('type', $location_type, 'both')->order_by('type', 'ASC')->limit(5)->get('room_type')->result();
    }

    function search_nearby_places($data)
    {
        $lat1 = $data['lat1'];
        $lng1 = $data['lng1'];
        $type = $data['type'];

        $query = $this->db->query("SELECT building.latitudes, building.longitudes, room.name, room.description,
    ( 3959 * acos( cos( radians($lat1) ) * cos( radians(building.latitudes) ) * cos( radians($lng1) 
    - radians(building.longitudes) ) + sin( radians($lat1) ) * sin( radians(building.latitudes) ) ) ) AS distance
    FROM building, room, room_type WHERE room_type.type = '".$type."' AND room_type.id = room.room_type_id AND room.building_id = building.id 
    HAVING distance < 100 ORDER BY distance LIMIT 0 , 10;");
        foreach ($query->result() as $row)
        {
            $data2[]  = array(
                'lat' =>   $row->latitudes,
                'lng' =>   $row->longitudes,
                'name' =>   $row->name,
                'description' =>   $row->description,
            );
        }
        return $data2;
        var_dump($data2);
    }

}