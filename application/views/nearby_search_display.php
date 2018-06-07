<?php //print_r($result); ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html xmlns="" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/admin_styles.css" >

</head>
<body>
<?php
ini_set('display_errors', 1);

//convert the stdClass Object into a php array
foreach($result as $key => $data){
    $rooms[$key] = (array)$data;
}
$room_json = json_encode($rooms);
//var_dump($room_json);
?>

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->

<div id="main"><div id="map"></div></div>

<script type="text/javascript">

    var flag = 0;
    var line;
    var source;
    var map;
    var mapdata;
    var maparray;
    var polyArray;
    var graphArray;
    var path, graph, point, newpoint;
    var temp;
    var flag;
    var destination;
    var polygons = {};
    var polyid = 0;
    var startingPoint;
    var outJSON = {};
    var polyindex = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 6.901120, lng: 79.860532},
            gestureHandling: 'greedy',
            zoom: 17
        });

        // map.addListener('dblclick', sendData);

        // mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":10,"lat":6.903579},{"lng":79.859726,"id":11,"lat":6.90225},{"lng":79.85948,"id":12,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":12},{"destination":12,"id":11,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

        var urlPoly = "<?=$this->config->item('server_url');?>";
        var method = "POST";
        var mapData = JSON.stringify({"type": "mapRequest"});
        var shouldBeAsync = true;
        var requestMap = new XMLHttpRequest();

        requestMap.onload = function () {
            var status = requestMap.status; // HTTP response status, e.g., 200 for "200 OK"
            var data = requestMap.response;
            // alert(data);
            maparray = JSON.parse(data);

            // //alert(dataPoly);
            polyArray = maparray.polygons;
            graphArray = maparray.graphs;
            // loadmap();
            line = [];
            temp = [];
            flag = 0;
            source = [];
            cestination = [];
            // var verticelatlng = [];
            // var verticepos = [];

            flag = 1;
            for (var z = 0; z < graphArray.length; z++) {
                var sourcelat, sourcelng, destlat, destlng, sourId;
                var graphVertexes = {};
                for (var verti = 0; verti < graphArray[z].vertexes.length; verti++) {
                    sourcelat = graphArray[z].vertexes[verti]["lat"];
                    sourcelng = graphArray[z].vertexes[verti]["lng"];
                    sourId = graphArray[z].vertexes[verti]["id"];
                    var sourcepoint = {'lat': sourcelat, 'lng': sourcelng};

                    sourcemark = new google.maps.Marker({
                        position: sourcepoint,
                        map: map,
                        id: graphArray[z].id,
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 1,
                            strokeWeight: 2,
                            fillOpacity: 0.6,
                            fillColor: "white",
                            strokeColor: "white"
                        },
                    });
                    // sourcemark.addListener('click', pointone);
                    graphVertexes[sourId] = sourcepoint;
                }

                for (var k = 0; k < graphArray[z].edges.length; k++) {
                    var sourceid = graphArray[z].edges[k]["source"];
                    var destid = graphArray[z].edges[k]["destination"];
                    var graphline = new google.maps.Polyline({
                        path: [graphVertexes[sourceid], graphVertexes[destid]],
                        strokeColor: 'white',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                    });

                    graphline.setMap(map);
                    graphline = [];
                }//
            }

        }
        requestMap.open(method, urlPoly, shouldBeAsync);
        requestMap.send(mapData);

        var rooms = <?php echo $room_json; ?>;
        rooms = JSON.parse(JSON.stringify(rooms));
        for(var a = 0; a < rooms.length; a++)
        {
            var lat = rooms[a]['lat'];
            var lng = rooms[a]['lng'];

            var room_marker = new google.maps.Marker({
                position: {'lat': parseFloat(lat), 'lng': parseFloat(lng)},
                map: map
            });
        }

    } //init ends

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('api_key');?>&libraries=geometry&callback=initMap"
        async defer></script>

</body>
</html>


