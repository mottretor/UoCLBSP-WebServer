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
                <p>Add Room Type</p></div>
            </br>
            <form method="post" action="<?php echo base_url()?>index.php/Manage_room_types/add_room_type">

                <table>
                    <tr>
                        <td>
                            Room Type:
                        </td>
                        <td>
                            <input type="text" name="type">
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
                </table>
                <input class="button" type="submit" name="add_building" value="Add">
                <input class="button" type="reset" name="cancel" value="Cancel">

            </form>

        </div>
    </body>
</html>