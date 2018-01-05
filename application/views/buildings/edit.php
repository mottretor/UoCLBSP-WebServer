<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf"/>
    <title>MANAGING BUILDINGS AND PEOPLE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script src="css/boostrap.js"></script>
    <link herf="css/boostrap.css" rel="stylesheet"/>
</head>

<body>

<div style="width: 100%; height: 90%; float: bottom">
    <div style="width: 25%; float: left">

        <div class="container">
            <br>
            <div  style=" width: 300px">

            </div>
            <br />
            <div id="result"></div>
        </div>
        <div>
            <div>
                <div class="container">
                    <!--                    @if(isset($details))-->
                    <!--                    <p>Search results <b> {{ $query }} </b> are</p>-->
                    <!---->
                    <!--                    {!! Form::open(['url' => '/update','method' => 'post']) !!}-->
                    <!--                    <form action="/update" method="post">-->
                    <form method="post">

                        <table>
                            <tr>
                                <td>
                                    Name :
                                </td>
                                <td>
                                    <!-- {!!Form::text('name',null,['class'=>'form-control']);!!} -->
                                    <!-- @foreach($details as $user) -->

                                    <!-- <td>{{$user->name}}</td> -->


                                    <!-- @endforeach -->
                                    <input type="hidden" name="id" value="">
                                    <input type="text" name="name" id="name" value="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Description :
                                </td>
                                <td>
                                    <!-- <input type="text" name="Description" value=""> -->
                                    <!-- {!!Form::text('description',null,['class'=>'form-control']);!!} -->
                                    <input type="text" name="description" id="name" value="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Latitude :
                                </td>
                                <td>
                                    <input type="text" name="Latitudes" id="infoLat" value="">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Longitude :
                                </td>
                                <td>
                                    <input type="text" name="Longitudes" id="infoLng" value="">

                                </td>
                            </tr>

                        </table>

                        <input type="submit" name="update" value="UPDATE">
                        <!-- <a type="button" href="/delete/{{$user->id}}">Delete</a> -->
                        <button type="button" class="btn btn-default">Delete</button>
                        <!-- <input type="submit" name="delete" value="DELETE"> -->
                        <button type="button" class="btn btn-default">Back</button>


                    </form>
                    <!--                    {!! Form::close() !!}-->
                    <!--                    @endif-->
                </div>


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
                        zoom: 16
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







<!-- <button type="button" class="btn btn-default"><a href="">Search Building</a></button> -->
<!-- <button type="button" class="btn btn-default"><a href="">Update Building</a></button> -->
<!-- <button type="button" class="btn btn-default"><a href="">Delete Building</a></button> -->

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>