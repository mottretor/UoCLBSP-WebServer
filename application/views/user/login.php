<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/user_style.css">
    <style>
        #form-div{
            width: 350px;
            height: 300px;
        }

    </style>
</head>

<body>

<div id="form-div">
    <div id="title-div">
        <p style="font-size: 20px">Login</p></div>
    </br>
    <form method="post" action="">

        <table>
            <tr>
                <td>
                    Email address :
                </td>
                <td>
                    <input type="text" name="emailAddress">
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
                </td>
                <td style="text-align: right ">
                    <a href="">Forgot password?</a>
                </td>
            </tr>

        </table>

        <p style="text-align: center"><input class="button" type="submit" name="login" value="Login"></p>

        <p style="text-align: center">Don't have an account? <a href="">Sign Up</a></p>

    </form>
</div>
</body>
</html>