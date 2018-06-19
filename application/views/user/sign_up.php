<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/user_style.css">
    <style>
        #form-div{
            width: 350px;
            height: 450px;
        }
    </style>
</head>

<body>

<div id="form-div">
    <div id="title-div">
        <p style="font-size: 20px">Sign Up</p></div>
    </br>
    <form method="post" action="">

        <table>

            <tr>
                <td>
                    Username :
                </td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>

            <tr>
                <td>
                    Email address :
                </td>
                <td>
                    <input type="email" name="emailAddress">
                </td>
            </tr>

            <tr>
                <td>
                    NIC number :
                </td>
                <td>
                    <input type="text" name="nicNo">
                </td>
            </tr>

            <tr>
                <td>
                    Password :
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>

            <tr>
                <td>
                    Confirm password :
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>

        </table>

        <p style="text-align: center"><input class="button" type="submit" name="signUp" value="Sign Up"></p>

        <p style="text-align: center">Already have an account? <a href="">Login</a></p>

    </form>
</div>
</body>
</html>