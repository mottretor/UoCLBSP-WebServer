<html>

    <head>
        <title>UoC Maps</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/admin_styles.css" >
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>/assets/js/admin_panel.js"></script>
    </head>
    <body>
        <aside>
            <p></p>
            <p></p>
            <nav id="nav">
                <p style="color: #888888"><b>Manage Map</b></p>
                <ul>
                    <li><a  data-target="Admin_home/add_polygon"><b>Geofencing</b></a></li>
                    <li><a  data-target="Admin_home/add_road"><b>Paths</b></a></li>
                    <li><a  data-target="Manage_building/building"><b>Buildings</b></a></li>
                    <li><a  data-target="Manage_rooms/rooms"><b>Rooms</b></a></li>
                    <li><a  data-target="Manage_room_types/room_types"><b>Room Types</b></a></li>
                    <li><a  data-target="Manage_people/people"><b>People</b></a></li>
                </ul>

                <p style="color: #888888"><b>Manage Roles</b></p>
                <ul>
                    <li><a  data-target="admins"><b>Admins</b></a></li>
                    <li><a  data-target="users"><b>Users</b></a></li>
                </ul>
            </nav>
            <p>Copyright @University of Colombo &copy; 2017</p>
        </aside>
        <a id="nav-toggle"  class="position"><span></span></a>

        <header>
            <div class="container">
                <img src="<?php echo base_url();?>/assets/drawable/web_icon.png" height="45px">
            </div>
        </header>
        <main>
            <div id="cont" >
            </div>
        </main>
    </body>


</html>