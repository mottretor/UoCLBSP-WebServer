<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
    <style>
        textarea,
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit],
        input[type=reset]{
            width: 45%;
            background-color: #898989;
            color: #cdcdcd;
            padding: 14px 10px;
            margin: 8px 6px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /*input[type=submit],*/
        /*input[type=reset]:hover {*/
        /*background-color: #45a049;*/
        /*}*/

    </style>
    <!--    <link rel="stylesheet" type="text/css" href="assets/css/form.css">-->
</head>

<body>
<div style="width: 100%; height: 90%; float: bottom">
    <div style="width: 25%;  height:100%; float: left; background-color: #343434">
        <div>
            </br>
            <?php echo form_open('manage_building/add_building'); ?>

            <table>
                <tr>
                    <td>
                        Name :
                    </td>
                    <td>
                        <input type="text" name="building_name">
                    </td>
                </tr>

                <tr>
                    <td>
                        Description :
                    </td>
                    <td>
                        <textarea rows="1.5" cols="30" name="description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        Latitude :
                    </td>
                    <td>
                        <input type="text" name="latitudes" id="infoLat" value="">
                    </td>
                </tr>

                <tr>
                    <td>
                        Longitude :
                    </td>
                    <td>
                        <input type="text" name="longitudes" id="infoLng" value="">
                    </td>
                </tr>

                <tr>
                    <td>
                        Graph Id :
                    </td>
                    <td>
                        <input type="text" name="graph_id" id="graph_id" value="">
                    </td>
                </tr>

            </table>

            <input class="button" type="submit" name="add_building" value="Add Building">
            <input class="button" type="reset" name="reset" value="Reset">

            </form>


            <p>Drag the marker to where you should add the building!</p>

            <div id="infoPanel">
                <div id="markerStatus"><i>Drag the marker.</i></div>

            </div>

        </div>
    </div>

    <div style="width: 75%; float:right">
        <div>
            <html>
            <head>
                <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
                <meta charset="utf-8">
                <title>UoC Maps</title>
                <style>
                    #map {
                        height: 100%;
                    }

                    /* Optional: Makes the sample page fill the window. */
                    html, body {
                        height: 100%;
                        margin: 0;
                        padding: 0;
                    }
                </style>
            </head>
            <body>
            <div id="map"></div>
            <script>

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
                var buildingLat;
                var buildingLng;
                var graph_id;

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 6.901120, lng: 79.860532},
                        zoom: 17
                    });

                    map.addListener('dblclick', sendData);

                    // mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":10,"lat":6.903579},{"lng":79.859726,"id":11,"lat":6.90225},{"lng":79.85948,"id":12,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":12},{"destination":12,"id":11,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

//                var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
                    var urlPoly = "http://localhost:1978";
                    var method = "POST";
                    var mapData = JSON.stringify({"type": "mapRequest"});
                    var shouldBeAsync = true;
                    var requestMap = new XMLHttpRequest();

                    requestMap.onload = function () {
                        var status = requestMap.status; // HTTP response status, e.g., 200 for "200 OK"
                        var data = requestMap.response;
                        alert(data);
                        maparray = JSON.parse(data);

                        // //alert(dataPoly);
                        polyArray = maparray.polygons;
                        graphArray = maparray.graphs;
                        loadmap();
                        line = [];
                        temp = [];
                        flag = 0;
                        source = [];
                        // cestination = [];
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
                }

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
                            // alert(sourcemark.id);
                            sourcemark.addListener('click', setAsBuilding);
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

                function setAsBuilding(eve) {
                    document.getElementById('infoLat').setAttribute('value', JSON.stringify(eve.latLng.lat()));
                    document.getElementById('infoLng').setAttribute('value', JSON.stringify(eve.latLng.lng()));
                    document.getElementById('graph_id').setAttribute('value', this.id);

                    // alert(graph_id);
                }

                function sendData(ev) {
                    var resultJson = [];
                    for (var i = 0; i < polyindex.length; i++) {
                        if (outJSON[polyindex[i]].length > 0) {
                            var getElement = {};
                            getElement['id'] = polyindex[i];
                            getElement['paths'] = outJSON[polyindex[i]];
                            resultJson.push(getElement);
                        }
                    }
                    var finalJson = {};
                    finalJson['type'] = "addPaths";
                    finalJson['Changes'] = resultJson;
                    alert(JSON.stringify(finalJson));

//                var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
                    var urlPoly = "http://localhost:1978";
                    var method = "POST";
                    var mapData = JSON.stringify(finalJson);
                    var shouldBeAsync = true;
                    var requestMap = new XMLHttpRequest();
                    var data;
                    requestMap.onload = function () {
                        var status = requestMap.status; // HTTP response status, e.g., 200 for "200 OK"
                        var data = requestMap.response;
                        alert(data);
                    }
                    requestMap.open(method, urlPoly, shouldBeAsync);
                    requestMap.send(mapData);


                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC564I5ucBK7bdyzJvVzTeG_AuPlubn3kY&libraries=geometry&callback=initMap"
                    async defer></script>

            </body>
            </html>

        </div>
    </div>
</div>

</body>
</html>