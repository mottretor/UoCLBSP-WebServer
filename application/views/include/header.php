
<html>

<head>
    <title>UoC Maps</title>
    <link href="<?php echo base_url(); ?>/assets/drawable/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/admin_styles.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/fontawesome-all.css" >
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">

    <script>
        function onSignIn(googleUser) {
            /*
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            */
            window.location.href = "<?php echo site_url();?>" ; //redirect controller goes inside site_url() function.
        }

    </script>
<!--    <script type = 'text/javascript' src = "--><?php //echo base_url(); ?><!--/assets/js/admin_panel.js"></script>-->
    <?php if($call == True) {
        echo '<script>
                $(function(){
                    $("#cont").load("Admin_home/search");
                });

    </script>';
    }
    ?>
</head>
<body>

<!--<a id="nav-toggle"  class="position"><span></span></a>-->


<header>
           <div class="container">
          <a data-target="Admin_home/search"><img src="<?php echo base_url();?>/assets/drawable/web_icon.png" height="45px"></a>
         </div>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
</header>




<main>
    <div id="cont">
    </div>
</main>

</body>
</html>