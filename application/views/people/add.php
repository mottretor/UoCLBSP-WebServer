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

    </style>
    <!--    <link rel="stylesheet" type="text/css" href="assets/css/form.css">-->
</head>

<body>
<div style="width: 100%; height: 90%; float: bottom">
    <div style="width: 50%;  height:75%; align:centre; background-color: #E8E8E8; border-top: 5px solid white;">
        <div>
            </br>
            <form method="post" action="<?php echo base_url()?>index.php/manage_people/add_people">

                <table>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <input type="text" name="people_name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Designation :
                        </td>
                        <td>
                            <textarea rows="1.5" cols="30" name="designation"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Description :
                        </td>
                        <td>
                            <input type="text" name="description" id="description" value="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Building Name :
                        </td>
                        <td>
                            <input type="text" name="building_name" id="buildingName" value="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Room Name :
                        </td>
                        <td>
                            <input type="text" name="room_name" id="roomName" value="">
                        </td>
                    </tr>

                </table>

                <input class="button" type="submit" name="add_people" value="Add">
                <input class="button" type="reset" name="reset" value="Reset">

            </form>

        </div>
    </div>
</div>

</body>
</html>