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
    // This creates an interactive map which constructs a polygon based on user clicks*****************************
    var marker, poly, map, pathline, latlngmarker0, pathline, polypath, uoc;
    var jsonpath = {'type':'geofence'};
    var jsonObject = {};
    var jsonArray = [];
    var pathvertices = [];
    var pathobj = {'latitudes': '', 'longitudes': ''};
    // int drawable = 1;
    // @php $drawable = 1
    var draw = 1;
    var outerVertexes = [];
    var json;
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
            zoom: 16,
            center: {lat: 6.902215976621638, lng: 79.86069999999995}  // Center the map
        });

        // var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
        var urlPoly = "http://localhost:1978";
        var method = "POST";
        var mapData = JSON.stringify({"type": "mapRequest"});
        var shouldBeAsync = true;
        var requestMap = new XMLHttpRequest();

        requestMap.onload = function () {
            var status = requestMap.status; // HTTP response status, e.g., 200 for "200 OK"
            var data = requestMap.response;
            
            maparray = JSON.parse(data);

            // //alert(dataPoly);
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
                    strokeColor: '#aeb20c',
                    strokeOpacity: 0.8,
                    strokeWeight: 3,
                    fillColor: '#eaf01b',
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

        // Add a listener for the click event
        map.addListener('click', addLatLng);
        //map.addListener('dblclick',sendData(json));
        //alert(json);
        map.addListener('dblclick', sendData);
    } //init ends

    function loadmap() {
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
                    id: graphArray[z].id
                });
                // sourcemark.addListener('click', pointone);
                graphVertexes[sourId] = sourcepoint;
            }

            for (var k = 0; k < graphArray[z].edges.length; k++) {
                var sourceid = graphArray[z].edges[k]["source"];
                var destid = graphArray[z].edges[k]["destination"];
                var graphline = new google.maps.Polyline({
                    path: [graphVertexes[sourceid], graphVertexes[destid]],
                    strokeColor: 'black',
                    strokeOpacity: 1.0,
                    strokeWeight: 5
                });

                graphline.setMap(map);
                graphline = [];
            }//
        }
    }

    function addLatLng(event) {
        var path = poly.getPath();

        // Because path is an MVCArray, we can simply append a new coordinate
        // and it will automatically appear.
        // pathvertices = path.getArray();
        path.push(event.latLng);
        pathvertices = [];
        jsonArray = [];
        poly.getPath().forEach(function(latLng) {
            jsonObject = {};
            // pathvertices = [];
            jsonObject['latitudes'] = latLng.lat();
            jsonObject['longitudes'] = latLng.lng();
            jsonArray.push(jsonObject);
            // pathvertices.push(latLng);
            pathvertices.push({'lat': latLng.lat(), 'lng': latLng.lng()});
            // pathvertices.push(path);
            // path = [];
        });
        // window.alert(path);
        // window.alert(pathvertices);
        latlngmarker0 = pathvertices[0];

        // Add a new marker at the new plotted point on the polyline.
        marker = new google.maps.Marker({
            position: event.latLng,
            // title: '#' + path.getLength(),
            map: map
        }); //end marker
        marker0 = new google.maps.Marker({
            position: pathvertices[0],
            // title: '#' + path.getLength(),
            map: map
        }); //end marker
        // window.alert(pathvertices);
        google.maps.event.addListener(marker0, 'click', function() {
            // polypath = pathvertices;
            jsonpath['polygon'] = jsonArray;
            // window.alert(JSON.stringify(jsonpath));
            //var polypath = JSON.stringify(jsonpath); //****************************************
            pathvertices.push(latlngmarker0);
            //alert(polypath);

            uoc = new google.maps.Polygon({
                paths: pathvertices,
                strokeColor: '#aeb20c',
                strokeOpacity: 0.8,
                strokeWeight: 3,
                fillColor: '#eaf01b',
                fillOpacity: 0.35,
                // indexId: 2
            });
            uoc.addListener('click', addouts);

            uoc.setMap(map);
            poly = [];
            draw = 0;
        });
    }
    function addouts(e) {
        var outerlatlng = e.latLng;
        marker1 = new google.maps.Marker({
            position: outerlatlng,
            map: map
        });
        outerVertexes.push({'latitudes':marker1.position.lat(),'longitudes':marker1.position.lng()});
        jsonpath['outvertexes'] = outerVertexes;
        json = JSON.stringify(jsonpath);
    }

    function sendData(){
        alert(json);
        var url = "http://localhost:1978";
        var method = "POST";
        var postData = json;
        // want shouldBeAsync = true.
        // Otherwise, it'll block ALL execution waiting for server response.
        var shouldBeAsync = true;

        var request = new XMLHttpRequest();

        request.onload = function () {
            var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
            var data = request.response;
             // Returned data, e.g., an HTML document.
        }
        request.open(method, url, shouldBeAsync);
        request.send(postData);

    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXHp9g0R5pEPgs2AlSUQBBBv0xe8vIhY&libraries=places&callback=initMap">
</script>
</body>
</html>