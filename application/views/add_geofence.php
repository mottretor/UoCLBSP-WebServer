<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/admin_styles.css" >

    </head>
    <body>
        <div id="map"></div>
        <script>
            var map, poly, initmarker, polygon;
            var mIsSet = 0;
            var state = 0;
            var vertexPoints = [];
            var jsonObj = {};
            var polyArray = [];
            var outArray = [];


            function initMap() {

                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    gestureHandling: 'greedy',
                    center: {lat: 6.902215976621638, lng: 79.86069999999995}
                });

                var urlPoly = "<?=$this->config->item('server_url');?>";
                var method = "POST";
                var mapData = JSON.stringify({"type": "polyRequest"});
                var shouldBeAsync = true;
                var requestMap = new XMLHttpRequest();

                requestMap.onload = function () {
                    var status = requestMap.status; // HTTP response status, e.g., 200 for "200 OK"
                    var data = requestMap.response;

                    maparray = JSON.parse(data);

                    alert(data);
                    polyArray = maparray.polygons;
                    graphArray = maparray.graphs;
                    loadmap();
                    line = [];
                    temp = [];
                    flag = 0;
                    source = [];
                    cestination = [];
                    // var verticelatlng = [];
                    // var verticepos = [];

                    for (var i = 0; i < polyArray.length; i++) {
                        path = [];
                        // graph = [];
                        var polyObject = polyArray[i].vertexes;

                        // alert(JSON.stringify(polyObject));
                        var polydraw = new google.maps.Polygon({
                            paths: polyObject,
                            strokeColor: '#F1C40F',
                            strokeOpacity: 0.8,
                            strokeWeight: 3,
                            fillColor: '#F1F3A7',
                            fillOpacity: 0.35,
                            id: polyArray[i].id
                        });
                        polydraw.setMap(map);
                        // polydraw.addListener('click', pointtwo);
                        outJSON[polyArray[i].id] = [];
                        polyindex.push(polyArray[i].id);
                        // newpoint.addListener('click', pointone);
                    }
                    //                    alert(data);
                }
                requestMap.open(method, urlPoly, shouldBeAsync);
                requestMap.send(mapData);

                poly = new google.maps.Polyline({
                    strokeColor: '#000000',
                    strokeOpacity: 1.0,
                    strokeWeight: 3
                });
                poly.setMap(map);

                map.addListener('click', addPoint);
                map.addListener('dblclick', sendData);
            }

            function addPoint(event) {
                if (state == 0) {

                    var path = poly.getPath();
                    path.push(event.latLng);
                    jsonObject = {};
                    jsonObject['latitudes'] = event.latLng.lat();
                    jsonObject['longitudes'] = event.latLng.lng();
                    polyArray.push(jsonObject);
                    vertexPoints.push({'lat': event.latLng.lat(), 'lng': event.latLng.lng()});

                    if (mIsSet == 0) {
                        mIsSet = 1;
                        initmarker = new google.maps.Marker({
                            position: {'lat': event.latLng.lat(), 'lng': event.latLng.lng()},
                            map: map
                        });

                        initmarker.addListener('click', drawPloygon);
                    } else {
                        new google.maps.Marker({
                            position: event.latLng,
                            map: map
                        });
                    }
                }
            }
            
            function drawPloygon(event) {
                if (state == 0) {
                    jsonObj['polygon'] = polyArray;
                    polygon = new google.maps.Polygon({
                        paths: vertexPoints,
                        strokeColor: '#aeb20c',
                        strokeOpacity: 0.8,
                        strokeWeight: 3,
                        fillColor: '#eaf01b',
                        fillOpacity: 0.35,
                        map: map
                    });
                    poly.setMap(null);
                    polygon.addListener('click', pickExits);
                    state = 1;
                }
            }

            function pickExits(event) {
                if (state == 1 | state == 2) {
                    state = 2;
                    jsonObject = {};
                    jsonObject['latitudes'] = event.latLng.lat();
                    jsonObject['longitudes'] = event.latLng.lng();
                    outArray.push(jsonObject);
                    new google.maps.Marker({
                        position: {'lat': event.latLng.lat(), 'lng': event.latLng.lng()},
                        map: map
                    });
                }
            }

            function sendData(event) {
                if (state == 2) {
                    jsonObj['outvertexes'] = outArray;
                    jsonObj['type'] = "geofence";
                    alert(JSON.stringify(jsonObj));

                    var urlPoly = "<?=$this->config->item('server_url');?>";
                    var method = "POST";
                    var mapData = JSON.stringify(jsonObj);
                    var shouldBeAsync = true;
                    var requestMap = new XMLHttpRequest();
                    var data;
                    requestMap.onload = function () {
                        var status = requestMap.status; // HTTP response status, e.g., 200 for "200 OK"
                        var data = requestMap.response;
                        $(function () {
                            $("#cont").load("Admin_home/add_polygon");
                        });
                        // alert(data);
                    }
                    requestMap.open(method, urlPoly, shouldBeAsync);
                    requestMap.send(mapData);
                }
            }

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('api_key');?>&libraries=places&callback=initMap">
        </script>
    </body>
</html>



