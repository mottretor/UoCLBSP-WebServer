<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf"/>
    <title>MANAGING BUILDINGS AND PEOPLE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script src="css/boostrap.js"></script>
    <!--    <script src="Scripts/jquery-2.1.0.min.js"></script>-->
    <link herf="css/boostrap.css" rel="stylesheet"/>
</head>

<body>
<div>
    <p id="details">
        Room Type: <?php echo $type ?>
    </p>
    <form method="post" action="<?php echo base_url()?>index.php/Manage_room_types/update_room_type">
        <input type="submit" name="edit" value="Edit">
        <input type="text" name="type" value="<?php echo $type ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>
    <form method="post" action="<?php echo base_url()?>index.php/Manage_room_types/delete_room_type">
        <input type="submit" name="delete" value="Delete">
        <input type="text" name="type" value="<?php echo $type ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>
</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>