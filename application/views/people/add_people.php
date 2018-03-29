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
                <p>Add People</p></div>
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

                <input class="button" type="submit" name="add_people" value="Add"style="margin-top: 20px">

                <input class="button" type="reset" name="reset" value="Reset"style="margin-top: 20px">


            </form>

        </div>
   

</body>
</html>