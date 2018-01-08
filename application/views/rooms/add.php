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

        input[type=submit],
        input[type=reset]:hover {
            background-color: #45a049;
        }

    </style>
    <!--    <link rel="stylesheet" type="text/css" href="assets/css/form.css">-->
</head>

<body>
<div style="width: 100%; height: 90%; float: bottom">
    <div style="width: 25%;  height:100%; float: left; background-color: #E8E8E8">
        <div>
            </br>
            <form method="post" action="<?php echo base_url() ?>index.php/manage_rooms/add_room">

                <table>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <input type="text" name="room_name">
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
                            Floor Number:
                        </td>
                        <td>
                            <input type="text" name="floor" id="floor" value="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Room Type :
                        </td>
                        <td>
                            <input type="text" name="room_type" id="roomType" value="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Building :
                        </td>
                        <td>
                            <input type="text" name="building_name" id="buildingName" value="">
                        </td>
                    </tr>

                </table>

                <input class="button" type="submit" name="add_building" value="Add">
                <input class="button" type="reset" name="reset" value="Reset">

            </form>


            <p>Drag the marker to where you should add the building!</p>

            <div id="infoPanel">
                <div id="markerStatus"><i>Drag the marker.</i></div>

            </div>

        </div>
    </div>
</div>

</body>
</html>