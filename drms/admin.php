<?php
include('includes/checksuper.php');
include('includes/header.php');
if(!isset($_SESSION['name']))
  header("Location: adminlogin.php?msg=Sign In Again");
?>

    <body>

        <?php include('includes/nav.php'); ?>

    </body>

    </html>
