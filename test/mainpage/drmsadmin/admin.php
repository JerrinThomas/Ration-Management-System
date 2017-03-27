<?php
include('includes/checksuper.php');
include('includes/header.php');
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
if(!isset($_SESSION['name']))
  header("Location: adminlogin.php?msg=Sign In Again");
?>

    <body>

        <?php include('includes/nav.php'); ?>

    </body>

    </html>
