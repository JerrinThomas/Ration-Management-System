<?php
include_once('includes/checksuper.php');
include_once('includes/header.php');
include_once('includes/nav.php');
require_once('config.php');
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
if(!isset($_SESSION['name']))
  header("Location: adminlogin.php?msg=Sign In Again");
if($_SESSION['role'] == 1)
    echo "
    <style>
    body{
        color: #4caf50;
    }
    </style>
    <body>
    <center>
    <br>
        <h2 style=\"color : white;\">.Stock Management.</h2>
    <br>Enter The Stock Here -><br>
    Rice
    <input type=text name=\"stockr\" id=\"inputstockr\">
    Wheat
    <input type=text name=\"stockw\" id=\"inputstockw\">
    Kerosene
    <input type=text name=\"stockk\" id=\"inputstockk\">
    <input type=\"submit\" name=\"submit\" value=\"submit\" onclick=\"return st()\">
    <div id=\"here\"></div>
    </center>
    <script type=\"text/javascript\">
    
    function st(){
                var xmlhttp;
                var sal = document.getElementById('here');
                var inpr = document.getElementById('inputstockr').value;
                var inpw = document.getElementById('inputstockw').value;
                var inpk = document.getElementById('inputstockk').value;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject(\"Microsoft.XMLHTTP\");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                           sal.innerHTML='<center><img id=\"loading\" src=\"load.gif\" alt=\"loading\"/></center>';
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                           sal.innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open(\"GET\", \"stockalgo.php?stockr=\" + inpr +\"&stockk=\" + inpk +\"&stockw=\" + inpw , false);
                xmlhttp.send();
            return true;
    }
    
    
    </script>
    ";


?>

