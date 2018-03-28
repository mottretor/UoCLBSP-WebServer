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
                    alert(JSON.stringify(jsonObj));

                }
            }

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('api_key');?>&libraries=places&callback=initMap">
        </script>
    </body>
</html>



