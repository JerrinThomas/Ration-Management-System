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
        color: white;
    }
    #flex-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 1200px;
        margin: 0 auto;
        background-color:white;
    }

    .flex {
        width: 500px;
        height: 200px;
        margin:20px;
    }
    .bx {
        width:270px;
        height:40px;
        border:2px solid #3d4444;
        border-radius:15px;
        background-color:white;
        color:#3d4444;
        margin-top:12.5px;
        font-size:30px;
    }
    .bx:focus {
        background-color:#1ebb90;
        color: white;
        border:none;
    }
    p {
        color:#3d4444;
        font-size:30px;
    }
    .jst{
        margin-top:30px;
        width:150px;
        height:50px;
        font-size:25px;
        color:#3d4444;
        background-color:white;
        border:none;
    }
    .jst:hover {
        background-color:#1ebb90;
        color:white;
    }
    </style>
    <body>
    <center>
    <br>
        <h2 style=\"color : white;\">Stock Management</h2>
        <h3>Enter The Stock </h3><br>
    <div id=\"flex-container\">
        <div class=\"flex\">
            
            <p>Rice</p>
            <input type=text class=\"bx\" name=\"stockr\" id=\"inputstockr\">
        </div>
        <div class=\"flex\">
            
            <p>Wheat</p>
            <input type=text class=\"bx\" name=\"stockw\" id=\"inputstockw\">
        </div>
        <div class=\"flex\">
            
            <p>Kerosene</p>
            <input type=text class=\"bx\" name=\"stockk\" id=\"inputstockk\">
        </div>  
    </div>
    <input type=\"submit\" class=\"jst\" name=\"submit\" value=\"submit\" onclick=\"return st()\">
    <br>
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

