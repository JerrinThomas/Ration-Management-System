<?php
include_once 'check_login.php';
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
if(isset($_SESSION['name']))
  header("Location: admin.php");
if(isset($_GET['msg']))
 {
   $msg=$_GET['msg'];
 }
 else {
   $msg="";
 }
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
                <span style="color:#d64550;text-align:center;"><?php echo "<h1>".$msg."</h1>" ?></span>
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
