<html>
<head>
    <meta name="google-signin-client_id" content="370161228622-rutsjqc2l06b02usd6qrn7sf0470vc2e.apps.googleusercontent.com">
</head>
<body>
<div class="g-signin2" data-onsuccess="onSignIn"></div>

<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var id_token = googleUser.getAuthResponse().id_token; // get the user's ID token
        // console.log('ID Token: ' + id_token);
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

        //var xhr = new XMLHttpRequest();
        //xhr.open('POST', '<?php //echo base_url(); ?>//');
        //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //xhr.onload = function() {
        //    console.log('Signed in as: ' + xhr.responseText);
        //};
        //xhr.send('idtoken=' + id_token);
    }


</script>
<a href="#" onclick="signOut();">Sign out</a>
<script>
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }
</script>

<!--Includes the Google Platform Library-->
<script src="https://apis.google.com/js/platform.js" async defer></script>
</body>
</html>