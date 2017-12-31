<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/navbar.css">

    </head>
    <body>

        <div class="nav-side-menu">

            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="menu-content collapse out">
<!--                    <li>-->
<!--<!--                        <a href="#">-->-->
<!--<!--                            <i class="fa fa-dashboard fa-lg"></i>-->-->
<!--<!--                        </a>-->-->
<!--                    </li>-->

                    <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                        <a href="#"><i class="fa fa-dashboard fa-lg"></i> Manage Maps <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="products">

                        <li><a href="#">Buildings</a></li>
                        <li><a href="#">People</a></li>
                        <li><a href="#">Geofencing</a></li>
                        <li><a href="#">Paths</a></li>
                        <li><a href="#">Exit Points</a></li>

                    </ul>

                    <li  data-toggle="collapse" data-target="#pro" class="collapsed active">
                        <a href="#"><i class="fa fa-dashboard fa-lg"></i> Manage Roles <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="pro">

                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Users</a></li>


                    </ul>

                </ul>
                <div>

                </div>

            </div>
    </body>
</html>

<nav class="menu">
    <ul class="active">
        <li class="current-item"><a href="#">Home</a></li>
        <li><a href="#">My Work</a></li>
        <li><a href="#">About Me</a></li>
        <li><a href="#">Get in Touch</a></li>
        <li><a href="#">Blog</a></li>
    </ul>

    <a class="toggle-nav" href="#">&#9776;</a>

    <form class="search-form">
        <input type="text">
        <button>Search</button>
    </form>
</nav>

jQuery(document).ready(function() {
jQuery('.toggle-nav').click(function(e) {
jQuery(this).toggleClass('active');
jQuery('.menu ul').toggleClass('active');

e.preventDefault();
});
});