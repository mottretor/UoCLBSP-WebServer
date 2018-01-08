<html>
<head>
    <title>Admin Home</title>
    <style>
        html,
        body {
            font-family: 'Droid Serif';
            color: #343434;
            font-size: 1.1em;
            line-height: 1.6;
            overflow-x: hidden;
            margin: 0;
        }

        header {
            /*border-bottom: 1px solid #cdcdcd;*/
            padding: 40px 0;
            background-color: #F8F8F8;
        }

        .container {
            max-width: 750px;
            /*margin-top: 10px;*/
            margin-left: 70px;
            padding: 0 20px;
        }

        h1 {
            font-size: 1em;
            text-align: center;
            margin: 0;
            line-height: 0;
        }

        @media screen and (min-width: 900px) {
            h1 {
                color: #585858;
                font-size: 1.4em;
                text-align: left;
            }
        }

        h1 span {
            display: none;
            /*color: #888888;*/
        }

        @media screen and (min-width: 900px) {
            h1 span {
                display: inline;
                font-size: .6em;
                color: #585858;
            }
        }

        #map {
            /*max-width: 750px;*/
            margin: 0 auto;
            padding: 0;
        }

        h2 {
            font-size: 1.5em;
            margin: 1em 0 0;
        }

        dt {
            font-weight: bold;
        }

        time {
            font-size: .9em;
            color: #898989;
            display: block;
        }
        /* Nav icon positioning */

        .position {
            position: absolute;
            top: 28px;
            left: 20px;
            transition: all .3s ease;
            z-index: 2;
        }

        @media screen and (min-width: 900px) {
            .position {
                position: fixed;
            }
        }
        /* Elijah Manor Nav button */

        #nav-toggle {
            cursor: pointer;
            padding: 10px 35px 16px 0px;
        }

        #nav-toggle span,
        #nav-toggle span:before,
        #nav-toggle span:after {
            cursor: pointer;
            border-radius: 1px;
            height: 5px;
            width: 35px;
            background: #A0A0A0;
            position: absolute;
            display: block;
            content: '';
        }

        #nav-toggle span:before {
            top: -10px;
        }

        #nav-toggle span:after {
            bottom: -10px;
        }

        #nav-toggle span,
        #nav-toggle span:before,
        #nav-toggle span:after {
            transition: all 200ms ease-in-out;
        }

        #nav-toggle.active span {
            background-color: transparent;
        }

        #nav-toggle.active span:before,
        #nav-toggle.active span:after {
            top: 0;
        }

        #nav-toggle.active span:before {
            transform: rotate(45deg);
        }

        #nav-toggle.active span:after {
            transform: rotate(-45deg);
        }
        /* Off Canvas Navigation */

        main {
            width: 100%;
            /*position: absolute;*/
            left: 0;
            /*top:0;  */
            transition: .3s ease all;
        }

        aside {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px;
            background: #F8F8F8;
            font-size: .8em;
            font-family: sans-serif;
            font-weight: 300;
            transition: all .3s ease;
        }

        aside p {
            color: #cdcdcd;
            padding: 10px;
        }

        aside nav ul {
            margin: 0;
            padding: 0;
        }

        aside nav ul li:first-of-type {
            /*border-top: 1px solid #565656;*/
        }

        aside nav ul li {
            /*border-bottom: 1px solid #565656;*/
        }

        aside nav ul li a {
            padding: 10px 20px;
            display: block;
            color: #404040;
            text-decoration: none;
        }

        aside nav ul li a:hover {
            background: #E8E8E8;
        }
        /* JavaScript toggle */

        .show-nav aside,
        .show-nav .position,
        .show-nav main {
            transform: translateX(250px);
        }
        .show-nav .position {
            position: fixed;
        }

        .show-nav article {
            /*padding: 0 80px;*/
        }

        a {
            text-decoration: none;
            color: #6699cc;
        }

        a:hover {
            /*text-decoration: underline;*/
        }
        #map {
            margin: 5px;
            height: 600px;
            width: 100%;
        }

    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
        (function ($) {
            $(function () { // DOM Ready

                // Toggle navigation
                $('#nav-toggle').click(function () {
                    // console.log( $('#nav-toggle').classList);
                    // console.log(this);
                    this.classList.toggle("active");
                    // If sidebar is visible:
                    if ($('body').hasClass('show-nav')) {
                        // Hide sidebar
                        $('body').removeClass('show-nav');
                    } else { // If sidebar is hidden:
                        $('body').addClass('show-nav');
                        // Display sidebar
                    }
                });
            });
        })(jQuery);

        $(document).ready(function () {
            var trigger = $('#nav ul li a'),
                contain = $('#cont');

            trigger.on('click', function () {
                var $this = $(this),
                    target = $this.attr('data-target');
                // console.log(target+'.php');

                $.ajax({
                    url: '<?php echo base_url(); ?>' + target,
                    method: 'GET',
                    success: function (data) {
                        contain.html(data);


                        // Toggle navigation
                        // $('#nav-toggle').click(function () {
                        // console.log( $('#nav-toggle').classList);
                        // $('#nav-toggle').classList.toggle("active");
                        document.getElementById('nav-toggle').classList.toggle("active");
                            // If sidebar is visible:
                            if ($('body').hasClass('show-nav')) {
                                // Hide sidebar
                                $('body').removeClass('show-nav');
                            } else { // If sidebar is hidden:
                                $('body').addClass('show-nav');
                                // Display sidebar
                            }

                        return false;
                        // });
                    }
                });

               //contain.load('<?php //echo base_url(); ?>//'+ 'index.php/Manage_building/add_building');

                // return false;

            });
        });
    </script>
</head>
<body>
<aside>
    <p></p>
    <p></p>
    <nav id="nav">
        <p style="color: #888888"><b>Manage Map</b></p>
        <ul>
            <li><a href="#" data-target="index.php/Admin_home/add_polygon"><b>Geofencing</b></a></li>
            <li><a href="#" data-target="index.php/Admin_home/add_road"><b>Paths</b></a></li>
            <li><a href="#" data-target="index.php/Manage_building/building"><b>Buildings</b></a></li>
            <li><a href="#" data-target="index.php/Manage_rooms/rooms"><b>Rooms</b></a></li>
            <li><a href="#" data-target="index.php/Manage_room_types/room_types"><b>Room Types</b></a></li>
            <li><a href="#" data-target="index.php/Manage_people/people"><b>People</b></a></li>
        </ul>

        <p style="color: #888888"><b>Manage Roles</b></p>
        <ul>
            <li><a href="#" data-target="admins"><b>Admins</b></a></li>
            <li><a href="#" data-target="users"><b>Users</b></a></li>
        </ul>
    </nav>
    <p>Copyright @University of Colombo &copy; 2017</p>
</aside>
<a id="nav-toggle" href="#!" class="position"><span></span></a>
<main>
    <header>
        <div class="container">
            <h1>UoC Location Based Services Platform <span>C!</span></h1>
        </div>
    </header>
    <div id="cont">
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
    </div>
</main>
</body>
</html>