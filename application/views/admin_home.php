<html>

    <head>
        <title>UoC Maps</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/admin_styles.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/fontawesome-all.css" >
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>/assets/js/admin_panel.js"></script>
    </head>
    <body>
        <aside>            
            <nav id="nav">
                <ul>
                    <li><a  data-target="Admin_home/add_polygon"><i class="fas fa-home" ></i><div class="list-item">Home</div></a></li>
                </ul>
                <p >Manage Map</p>
                <ul>                    
                    <li><a  data-target="Admin_home/add_polygon"><i class="fas fa-street-view"></i><div class="list-item">Geofencing</div></a></li>
                    <li><a  data-target="Admin_home/add_road"><i class="fas fa-map-signs"></i><div class="list-item">Paths</div></a></li>
                    <li><a  data-target="Manage_building/building"><i class="fas fa-building"></i><div class="list-item">Buildings</div></a></li>
                    <li><a  data-target="Manage_rooms/rooms"><i class="fas fa-columns"></i><div class="list-item">Rooms</div></a></li>
                    <li><a  data-target="Manage_room_types/room_types"><i class="fas fa-tags"></i><div class="list-item">Room Types</div></a></li>
                    <li><a  data-target="Manage_people/people"><i class="fas fa-user"></i><div class="list-item">People</div></a></li>
                </ul>

                <p ><b>Manage Roles</b></p>
                <ul>
                    <li><a  data-target="admins"><i class="fas fa-id-badge"></i><div class="list-item">Admins</div></a></li>
                    <li><a  data-target="users"><i class="fas fa-user-circle"></i><div class="list-item">Users</div></a></li>
                </ul>
            </nav>
            
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