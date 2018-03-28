<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf"/>
    <title>MANAGING BUILDINGS AND PEOPLE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script src="css/boostrap.js"></script>
    <link herf="css/boostrap.css" rel="stylesheet"/>
    <style>
        html,
        body {
            font-family: 'Droid Serif';
            color: #343434;
            font-size: 1.1em;
            line-height: 1.6;
            /*overflow-x: hidden;*/
            margin: 0;
            height: 100%;
        }

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
        input[type=reset] {
            width: 45%;
            background-color: #898989;
            color: #cdcdcd;
            padding: 14px 10px;
            margin: 8px 6px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>


<div style="width: 25%; float: left; background-color: black; height: 100%">

    <!--    <div class="container">-->
    <!--        <br>-->
    <!--        <div style="width: 300px">-->
    <!---->
    <!--        </div>-->
    <!--        <br/>-->
    <!--        <div id="result"></div>-->
    <!--    </div>-->
    <div>
        <!--        <div>-->
        <!--            <div class="container">-->
        <form method="post" action="<?php echo base_url() ?>index.php/Manage_room_types/change_room_type">

            <table>
                <tr>
                    <td>
                        Type :
                    </td>
                    <td>

                        <!--                                    <input type="hidden" name="id" value="">-->
                        <input type="text" name="type" id="name" value="<?php echo $type ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        Description :
                    </td>
                    <td>
                        <!-- <input type="text" name="Description" value=""> -->
                        <!-- {!!Form::text('description',null,['class'=>'form-control']);!!} -->
                        <input type="text" name="description" id="description" value="<?php echo $description ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" id="room_type_id" value="<?php echo $id ?>">

                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="update" value="Update">

                    </td>
                </tr>

            </table>

        </form>

    </div>

    <!--        </div>-->

    <!--    </div>-->
</div>
<div style="width: 75%; height:100%; float:right">
    <!--    <div>-->
    <html>
    <head>
        <!--                        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            var geocoder = new google.maps.Geocoder();

            function geocodePosition(pos) {
                geocoder.geocode({
                    latLng: pos
                });
            }

            // function updateMarkerStatus(str) {
            //     document.getElementById('markerStatus').innerHTML = str;
            // }

            function updateMarkerPosition(latLng) {
                document.getElementById('infoLat').setAttribute('value', latLng.lat());
                document.getElementById('infoLng').setAttribute('value', latLng.lng());
            }

            function initialize() {
                var latLng = new google.maps.LatLng(<?php echo $latitudes ?>, <?php echo $longitudes ?>);
                var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                    zoom: 16,
                    center: latLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                //var buildingPos = {'lat': '<?php //echo $latitudes ?>//', 'lng': '<?php //echo $longitudes ?>//'};
                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    draggable: true
                });
                // Update current position info.
                updateMarkerPosition(latLng);
                geocodePosition(latLng);
                google.maps.event.addListener(marker, 'drag', function () {
                    // updateMarkerStatus('Dragging...');
                    updateMarkerPosition(marker.getPosition());
                });
                google.maps.event.addListener(marker, 'dragend', function () {
                    // updateMarkerStatus('Position Found!');
                    geocodePosition(marker.getPosition());
                });
            }

            // Onload handler to fire off the app.
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('api_key');?>&libraries=places&callback=initMap"
                async defer></script>

    </head>
    <body>
    <style>
        #mapCanvas {
            width: 100%;
            height: 100%;
            float: left;
            z-index: 1;
        }
    </style>

    <div id="mapCanvas"></div>

    </body>
    </html>

    <!--    </div>-->
</div>


</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>