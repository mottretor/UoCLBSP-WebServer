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

                <input class="button" type="submit" name="add_building" value="Add">
                <input class="button" type="reset" name="cancel" value="Cancel">

            </form>

        </div>
    </div>

</div>

</body>
</html>