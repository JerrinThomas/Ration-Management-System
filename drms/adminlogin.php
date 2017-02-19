<?php
include_once 'check_login.php';
 ?>
    <!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>adminlogin</title>
        <link rel="stylesheet" href="css/styleadmin.css">

    </head>

    <body class="align">
        <div class="grid">
            <form class="form-signin" name="form1" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="form__field">
                <input name="username" id="uname" type="text" class="form-control" placeholder="Username" required>
                </div>
                <div class="form__field">
                <input name="password" id="pword" type="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="butt">
                <button name="Submit" id="submit" class="button" type="submit">Sign in</button>
                </div>
                <span><?php if($error)
                        echo "<h3>".$error."</h3>"; ?>
                </span>
            </form>
        </div>
    </body>

    </html>