<?php
include_once 'check_login.php';
 ?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>adminlogin</title>
    </head>
    <body>
      <form class="form-signin" name="form1" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="username" id="uname" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="password" id="pword" type="password" class="form-control" placeholder="Password">
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <span><?php echo "<div>".$error."</div>"; ?></span>
      </form>
    </body>
</html>
