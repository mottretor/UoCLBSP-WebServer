<html>
<style type="text/css">
    .heading {
        color : #000;
        font-family: sans-serif;
        text-align: center;
    }
</style>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/admin_styles.css" >

    <style>
        input[type=text], select {
            font-family: "roboto";
            padding: 12px 12px;
            margin: 18px 0px 12px 10px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

<input type="text" list="places"  id="origin-input" class="form-control" placeholder="Search here" style="width:200px;"/>
<datalist id="places"></datalist>

<button type="button" onclick="getLocation()" id="search-button" class="btn btn-default" style="margin: 18px 0px 12px 10px;">Search</button>

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>

<div id="map"></div>

<script>
    var line;
    var source;
    var map;
    var maparray;
    var polyArray;
    var graphArray;
    var temp;
    var flag;

    function initMap() {
        window.map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: true,
            zoom: 15,
            center: {lat: 6.9022, lng: 79.8607},
            gestureHandling: 'greedy',
        });

        // map.addListener('dblclick', sendData);

        // mapdata = '{"graphs":[{"vertexes":[{"lng":79.859614,"id":10,"lat":6.903579},{"lng":79.859726,"id":11,"lat":6.90225},{"lng":79.85948,"id":12,"lat":6.902409}],"edges":[{"destination":10,"id":9,"source":12},{"destination":12,"id":11,"source":11}],"id":16}],"polygons":[{"vertexes":[{"lng":79.858825,"lat":6.90357},{"lng":79.86155,"lat":6.903602},{"lng":79.860821,"lat":6.901334},{"lng":79.859147,"lat":6.902622}],"id":16}]}';

        // var urlPoly = "http://ec2-52-72-156-17.compute-1.amazonaws.com:1978";
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

        var originInput = document.getElementById('origin-input');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        var searchButton = document.getElementById('search-button');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchButton);

    }

    $('#origin-input').keyup(function(){
        var searchValue=$(this).val(); //sends the letters/phrases that are typed in the text field to the server
        // alert(searchValue);
        //Getting two places from the search bars Origin and Destination
        //search results are retrieved from the java server
        var getPlaces = {"type":"searchRequest","input":searchValue,"role":"registered"};
        var getPlacesJson = JSON.stringify(getPlaces);
        var urlPlaces = "<?=$this->config->item('server_url');?>";
        var method = "POST";
        var placesData = getPlacesJson;
        var shouldBeAsync = true;
        var requestPlaces = new XMLHttpRequest();
        requestPlaces.timeout = 5000;
        requestPlaces.ontimeout = function(e){
            alert('request timeout');
        }
        //on success
        requestPlaces.onload = function () {
            var status = requestPlaces.status;
            var data = requestPlaces.response; // gets the search results from the server for autocomplete suggesting
            // alert(data);
            //var datax = '{"Results":[{"lng":80.01436559999999,"name":"Gampaha","lat":7.0873101},{"lng":80.564677,"name":"Gampola","lat":7.126777},{"lng":79.9937034,"name":"Gampaha Railway Station","lat":7.093542999999999},{"lng":79.99173739999999,"name":"Gampaha Bus Station","lat":7.092380399999999},{"lng":79.8976314,"name":"Gamsabha Junction Bus Stop","lat":6.864619100000001}]}';
            //alert(status);
            var results = JSON.parse(data);
            window.resultsO = results;
            // alert(results);
            var places=[];
            window.placeLats=[];
            var nameX;
            for(var i=0; i<results.Results.length; i++){
                nameX = results.Results[i]['name']
                places[i] = nameX;
                window.placeLats.push([nameX,i]);
            }
            document.getElementById('places').innerHTML = '';
            var list = document.getElementById('places');
            places.forEach(function(item){
                var option = document.createElement('option');
                option.value = item;
                list.appendChild(option);
            });
            // alert(list);
        }
        requestPlaces.open(method, urlPlaces, shouldBeAsync);
        requestPlaces.send(placesData);
    });
    //DESTINATION************************************************
    //getting search results for the destination
    //getting directions
    function getLocation(){
        window.source;
        var originName = document.getElementById('origin-input').value;
        //alert(window.placeLatsD);
        var index=1;
        //alert(JSON.stringify(window.resultsO.Results[index]['lat']));
        for(var i=0;i<window.placeLats.length;i++){
            if(window.placeLats[i][0]==originName){
                index = window.placeLats[i][1];
                var lat = window.resultsO.Results[index]['lat'];
                var lng = window.resultsO.Results[index]['lng'];
                // window.source = new google.maps.LatLng (window.resultsO.Results[index]['lat'], window.resultsO.Results[index]['lng']);
            }
        }
        // alert(source);
        // alert(destination);
        var place_marker = new google.maps.Marker({
            position: {'lat': lat, 'lng': lng},
            map: map
        });
        map.setCenter(place_marker.getPosition());
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('api_key');?>&libraries=places,geometry&callback=initMap"
        async defer></script>


</body>
</html>