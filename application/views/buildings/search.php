<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

        background-color: #2196F3;
        color: white;
        }

        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }
            .topnav a, .topnav input[type=text], .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }
            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }
        *, *:before, *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        html {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 100%;
            background: #333;
            -webkit-font-smoothing: antialiased;
        }

        #page-wrapper {
            /*width: 640px;*/
            height: 100%;
            background: #FFFFFF;
            padding: 1em;
            margin: 1em auto;
            border-top: 5px solid #69c773;
            box-shadow: 0 2px 10px rgba(0,0,0,0.8);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 2em;
            margin-bottom: 0.5em;
            color: #999999;
        }

        input {
            width: 100%;
            padding: 0.5em 0.5em;
            font-size: 1.2em;
            border-radius: 3px;
            border: 1px solid #D9D9D9;
        }

        button {
            display: inline-block;
            border-radius: 3px;
            border: none;
            font-size: 0.9rem;
            padding: 0.5rem 0.8em;
            background: #69c773;
            border-bottom: 1px solid #498b50;
            color: white;
            -webkit-font-smoothing: antialiased;
            font-weight: bold;
            margin: 0;
            width: 100%;
            text-align: center;
        }

        button:hover, button:focus {
            opacity: 0.75;
            cursor: pointer;
        }

        button:active {
            opacity: 1;
            box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.1) inset;
        }

    </style>
    <!--    <link rel="stylesheet" type="text/css" href="assets/css/form.css">-->
</head>

<body>
<div style="width: 100%; height: 90%; float: bottom">
<!--    <script>-->
<!--        // Get the <datalist> and <input> elements.-->
<!--        var dataList = document.getElementById('json-datalist');-->
<!--        var input = document.getElementById('ajax');-->
<!---->
<!--        // Create a new XMLHttpRequest.-->
<!--        var request = new XMLHttpRequest();-->
<!---->
<!--        // Handle state changes for the request.-->
<!--        request.onreadystatechange = function(response) {-->
<!--            if (request.readyState === 4) {-->
<!--                if (request.status === 200) {-->
<!--                    // Parse the JSON-->
<!--                    var jsonOptions = JSON.parse(request.responseText);-->
<!---->
<!--                    // Loop over the JSON array.-->
<!--                    jsonOptions.forEach(function(item) {-->
<!--                        // Create a new <option> element.-->
<!--                        var option = document.createElement('option');-->
<!--                        // Set the value using the item in the JSON array.-->
<!--                        option.value = item;-->
<!--                        // Add the <option> element to the <datalist>.-->
<!--                        dataList.appendChild(option);-->
<!--                    });-->
<!---->
<!--                    // Update the placeholder text.-->
<!--                    input.placeholder = "e.g. datalist";-->
<!--                } else {-->
<!--                    // An error occured :(-->
<!--                    input.placeholder = "Couldn't load datalist options :(";-->
<!--                }-->
<!--            }-->
<!--        };-->
<!---->
<!--        // Update the placeholder text.-->
<!--        input.placeholder = "Loading options...";-->
<!---->
<!--        // Set up and make the request.-->
<!--        request.open('GET', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/4621/html-elements.json', true);-->
<!--        request.send();-->
<!---->
<!--    </script>-->
    <div style="width: 25%;  height:100%; float: left; background-color: #343434">
        <div id="page-wrapper">
            <label for="default">Search the building by name</label>
            <input type="text" id="default" list="languages" placeholder="">

<!--            <datalist id="languages">-->
<!--                <option value="HTML">-->
<!--                <option value="CSS">-->
<!--                <option value="JavaScript">-->
<!--                <option value="Java">-->
<!--                <option value="Ruby">-->
<!--                <option value="PHP">-->
<!--                <option value="Go">-->
<!--                <option value="Erlang">-->
<!--                <option value="Python">-->
<!--                <option value="C">-->
<!--                <option value="C#">-->
<!--                <option value="C++">-->
<!--            </datalist>-->


<!--            <label for="ajax">Pick an HTML Element (options loaded using AJAX)</label>-->
<!--            <input type="text" id="ajax" list="json-datalist" placeholder="e.g. datalist">-->
<!--            <datalist id="json-datalist"></datalist>-->


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
                    // requestMap.send(mapData);
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