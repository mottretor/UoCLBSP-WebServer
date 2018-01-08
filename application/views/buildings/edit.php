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


    <div style="width: 25%; float: left">

        <div class="container">
            <br>
            <div  style="width: 300px">

            </div>
            <br />
            <div id="result"></div>
        </div>
        <div>
            <div>
                <div class="container">
                    <form method="post" action="<?php echo base_url()?>index.php/Manage_building/change_building">

                        <table>
                            <tr>
                                <td>
                                    Name :
                                </td>
                                <td>

<!--                                    <input type="hidden" name="id" value="">-->
                                    <input type="text" name="name" id="name" value="<?php echo $name ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Description :
                                </td>
                                <td>
                                    <!-- <input type="text" name="Description" value=""> -->
                                    <!-- {!!Form::text('description',null,['class'=>'form-control']);!!} -->
                                    <input type="text" name="description" id="name" value="<?php echo $description ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Latitude :
                                </td>
                                <td>
                                    <input type="text" name="latitudes" id="infoLat" value="<?php echo $latitudes ?>">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Longitude :
                                </td>
                                <td>
                                    <input type="text" name="longitudes" id="infoLng" value="<?php echo $longitudes ?>">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" name="id" id="id" value="<?php echo $id ?>">
<!--                                    <input type="hidden" name="id" id="id" value="--><?php //echo $id ?><!--">-->

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" name="graphId" id="graph_id" value="<?php echo $graph_id ?>">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" name="id" id="building_id" value="<?php echo $id ?>">

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

            </div>

        </div>
<!--        <form method="post" action="--><?php //echo base_url()?><!--/index.php/Manage_building/change_building">-->
<!--            <input type="submit" name="edit" value="Edit">-->
<!--        </form>-->
    </div>

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>