<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/form.css">
    </head>

    <body>

        <div id="form-div">
            <div id="title-div">
                <p>Add Room</p></div>
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

                <input class="button" type="submit" name="add_building" value="Add" style="margin-top: 20px">
                <input class="button" type="reset" name="reset" value="Reset"style="margin-top: 20px">

            </form>






        </div>


    </body>
</html>