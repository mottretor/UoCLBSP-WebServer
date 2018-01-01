<html>
<head>
    <title>Test 3</title>
    <style>
        html,
        body {
            font-family: 'Droid Serif';
            color: #343434;
            font-size: 1.1em;
            line-height: 1.6;
            overflow-x: hidden;
            margin: 0;
        }

        header {
            border-bottom: 1px solid #cdcdcd;
            padding: 40px 0;
            background-color: #343434;
        }

        .container {
            max-width: 750px;
            /*margin-top: 10px;*/
            margin-left: 70px;
            padding: 0 20px;
        }

        h1 {
            font-size: 1em;
            text-align: center;
            margin: 0;
            line-height: 0;
        }

        @media screen and (min-width: 900px) {
            h1 {
                color: white;
                font-size: 1.4em;
                text-align: left;
            }
        }

        h1 span {
            display: none;
        }

        @media screen and (min-width: 900px) {
            h1 span {
                display: inline;
                font-size: .6em;
                color: #898989;
            }
        }

        #map {
            /*max-width: 750px;*/
            margin: 0 auto;
            padding: 0;
        }

        h2 {
            font-size: 1.5em;
            margin: 1em 0 0;
        }

        dt {
            font-weight: bold;
        }

        time {
            font-size: .9em;
            color: #898989;
            display: block;
        }
        /* Nav icon positioning */

        .position {
            position: absolute;
            top: 28px;
            left: 20px;
            transition: all .3s ease;
            z-index: 2;
        }

        @media screen and (min-width: 900px) {
            .position {
                position: fixed;
            }
        }
        /* Elijah Manor Nav button */

        #nav-toggle {
            cursor: pointer;
            padding: 10px 35px 16px 0px;
        }

        #nav-toggle span,
        #nav-toggle span:before,
        #nav-toggle span:after {
            cursor: pointer;
            border-radius: 1px;
            height: 5px;
            width: 35px;
            background: white;
            position: absolute;
            display: block;
            content: '';
        }

        #nav-toggle span:before {
            top: -10px;
        }

        #nav-toggle span:after {
            bottom: -10px;
        }

        #nav-toggle span,
        #nav-toggle span:before,
        #nav-toggle span:after {
            transition: all 200ms ease-in-out;
        }

        #nav-toggle.active span {
            background-color: transparent;
        }

        #nav-toggle.active span:before,
        #nav-toggle.active span:after {
            top: 0;
        }

        #nav-toggle.active span:before {
            transform: rotate(45deg);
        }

        #nav-toggle.active span:after {
            transform: rotate(-45deg);
        }
        /* Off Canvas Navigation */

        main {
            width: 100%;
            /*position: absolute;*/
            left: 0;
            /*top:0;  */
            transition: .3s ease all;
        }

        aside {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px;
            background: #343434;
            font-size: .8em;
            font-family: sans-serif;
            font-weight: 300;
            transition: all .3s ease;
        }

        aside p {
            color: #cdcdcd;
            padding: 10px;
        }

        aside nav ul {
            margin: 0;
            padding: 0;
        }

        aside nav ul li:first-of-type {
            border-top: 1px solid #565656;
        }

        aside nav ul li {
            border-bottom: 1px solid #565656;
        }

        aside nav ul li a {
            padding: 10px 20px;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        aside nav ul li a:hover {
            background: #454545;
        }
        /* JavaScript toggle */

        .show-nav aside,
        .show-nav .position,
        .show-nav main {
            transform: translateX(250px);
        }
        .show-nav .position {
            position: fixed;
        }

        .show-nav article {
            /*padding: 0 80px;*/
        }

        a {
            text-decoration: none;
            color: #6699cc;
        }

        a:hover {
            /*text-decoration: underline;*/
        }
        #map {
             height: 600px;
             width: 100%;
         }

    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
        (function ($) {
            $(function () { // DOM Ready

                // Toggle navigation
                $('#nav-toggle').click(function () {
                    this.classList.toggle("active");
                    // If sidebar is visible:
                    if ($('body').hasClass('show-nav')) {
                        // Hide sidebar
                        $('body').removeClass('show-nav');
                    } else { // If sidebar is hidden:
                        $('body').addClass('show-nav');
                        // Display sidebar
                    }
                });
            });
        })(jQuery);

        $(document).ready(function () {
            var trigger = $('#nav ul li a'),
                contain = $('#cont');

            trigger.on('click', function () {
                var $this = $(this),
                target = $this.data('target');
                console.log(target);

                contain.load(target + '.php');

                return false;

            });
        });
    </script>
</head>
<body>
<aside>
    <p></p>
    <p></p>
    <nav id="nav">
        <p>Manage Map</p>
        <ul>
            <li><a href="#" data-target="geofencing">Geofencing</a></li>
            <li><a href="#" data-target="paths">Paths</a></li>
            <li><a href="#" data-target="buildings">Buildings</a></li>
            <li><a href="#" data-target="rooms">Rooms</a></li>
            <li><a href="#" data-target="people">People</a></li>
        </ul>

        <p>Manage Roles</p>
        <ul>
            <li><a href="#" data-target="admins">Admins</a></li>
            <li><a href="#" data-target="users">Users</a></li>
        </ul>
    </nav>
    <p>Copyright @University of Colombo &copy; 2017</p>
</aside>
<a id="nav-toggle" href="#!" class="position"><span></span></a>
<main>
    <header>
        <div class="container">
            <h1>UoC Location Based Services Platform <span>Customized!</span></h1>
        </div>
    </header>
    <div id="cont">
        <div id="map"></div>
        <script>
            function initMap() {
                var uluru = {lat: 6.902215976621638,  lng: 79.86069999999995};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 19,
                    center: uluru
                });
                var ucsc = {lat: 6.902215976621638, lng: 79.86069999999995};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: ucsc,
                    mapTypeId: 'roadmap'
                });
                var marker = new google.maps.Marker({
                    position: ucsc,
                    map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuVuyPajdEVimNlE-ejFP3_ca3dRNHLT4&callback=initMap"
                async defer></script>
    </div>
</main>
</body>
</html>