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
<div style="width: 100%; height: 10%; float: top; background-color: black">
    <p style="color: white; font-size: 30px"> UoC Location Based Services Platform</p>
</div>
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
                    @if(isset($details))
                    <p>Search results <b> {{ $query }} </b> are</p>

                    {!! Form::open(['url' => '/update','method' => 'post']) !!}
                    <?php echo form_open('manage_building/search'); ?>

                        <table>
                            <tr>
                                <td>
                                    Name :
                                </td>
                                <td>
                                    <input type="hidden" name="id" value="">
                                    <input type="text" name="name" id="name" value="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Description :
                                </td>
                                <td>
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
                        <button type="button" class="btn btn-default"> <a href="/delete/{{$user->id}}">Delete</a></button>
                        <button type="button" class="btn btn-default"> <a href="/buildingShow">Back</a></button>

                    </form>
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div style="width: 75%; float:right">
        <div>


            <head>
                <style>
                    #map {
                        height: 700px;
                        width: 100%;
                    }
                </style>
            </head>
            <body>

            <div>

            </div>

            <div id="map"></div>

            <script>

                function initMap() {
                    var uluru = {lat: 6.902215976621638, lng: 79.86069999999995};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 19,
                        center: uluru
                    });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf_UNZ4XLYq1wPHkvOVF6zkrvVOzG3eE&callback=initMap"
                    async defer></script>
        </div>
    </div>
</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>