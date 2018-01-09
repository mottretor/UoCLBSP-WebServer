<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>

<body>
<div style="width: 100%; height: 90%; float: bottom">

    <div style="width: 25%;  height:100%; float: left; background-color: #343434">
        <form method="post" action="<?php echo base_url()?>index.php/Manage_room_types/search_room_type">
            <table>
                <tr>
                    <td>
                        <input type="text" name="type">
                    </td>

                    <td>
                        <input type="text" name="id">
                    </td>

                    <td>
                        <input type="submit" name="button" value="Search">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>

</body>
</html>