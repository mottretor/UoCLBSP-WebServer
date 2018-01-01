<html>
<head>
    <style>
        html,
        body {
            font-family: 'Droid Serif';
            color: #343434;
            font-size: 1.1em;
            line-height: 1.6;
            overflow-x: hidden;
        }

        header {
            border-bottom: 1px solid #cdcdcd;
            padding: 40px 0;
        }

        .container {
            max-width: 750px;
            margin: 0 auto;
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

        map {
            max-width: 750px;
            margin: 0 auto;
            padding: 0 20px;
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
            background: #343434;
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
            position: absolute;
            left: 0;
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
            padding: 20px;
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

        .show-nav map {
            padding: 0 80px;
        }

        a {
            text-decoration: none;
            color: #6699cc;
        }

        a:hover {
            text-decoration: underline;
        }


    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
        (function($) {
            $(function() { // DOM Ready

                // Toggle navigation
                $('#nav-toggle').click(function() {
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
    </script>
</head>
<body>
<aside>

    <nav>
        <div class="nav-side-menu">

            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="menu-content collapse out">
                    <p>Manage Map</p>

                    <ul class="sub-menu collapse" id="products">

                        <li><a href="#">Buildings</a></li>
                        <li><a href="#">People</a></li>
                        <li><a href="#">Geofencing</a></li>
                        <li><a href="#">Paths</a></li>

                    </ul>

                    <p>Manage Roles</p>
                    <ul class="sub-menu collapse" id="pro">

                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Users</a></li>

                    </ul>

                </ul>
                <div>

                </div>

            </div>
    </nav>

</aside>
<a id="nav-toggle" href="#!" class="position"><span></span></a>
<main>

</body><map>
    <h2>map Title</h2>
    <time>November 1st, 2015</time>
    <p><a href="http://www.taniarascia.com/off-canvas-navigation" target="_blank">Click here to view the
            tutorial</a>.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum
        tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas
        semper. Aenean ultricies mi vitae est.
        Mauris placerat eleifend leo.</p>
    <h3>Lorem Ipsum</h3>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
    <ul>
        <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in,
            diam. Sed arcu. Cras consequat.
        </li>
        <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.
            Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.
        </li>
        <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique
            cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.
        </li>
        <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate,
            nunc.
        </li>
    </ul>
    <dl>
        <dt>Definition list</dt>
        <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </dd>
        <dt>Lorem ipsum dolor sit amet</dt>
        <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </dd>
    </dl>
</map>
</main>
</html>
