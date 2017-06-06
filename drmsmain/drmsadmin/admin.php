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
        <style>
            input {
                width: 200px;
            }
            
            body {
                color: green;
            }
            
            img {
                width: 1000px;
            }
            .hmbut {
                background-color: transparent;
                border: 2px solid white;
                border-radius: 20px;
                color: white;
                height: 45px;
                font-size: 20px;
                
            }
            .hmbut:hover {
                background-color: white;
                color: #3d4444;
                font-size: 25px;
            }
            .hmdiv {
                background-color: white;
                min-width: 600px;
                min-height: 200px;
                margin-top: 40px;
                display: none;
            }
            .sm {
                font-size: 22px;
                color: #3d4444;
                padding-top: 25px;
            }
        </style>

        <?php include('includes/nav.php'); 
                  
        ?>

            <center>
                <div>
                    <img src="header.png" />
                </div>
                <div style="width: 600px; float:left; height:1000px; margin-left:100px; margin-top:5%;">
                    <input class="hmbut" type="button" value="Search Admin" onclick="return search()">
                    
                    <div class="hmdiv" id="hmdiv1">
                    <div id="div1" class="sm"></div>
                    <div id="div11"></div>
                    </div>
                </div>
                <div style="width: 700px; float:right; height:1000px; margin-right:50px; margin-top:5%;">
                    <input class="hmbut" type="button" value=" Search  User " onclick="return search1()">
                    
                    <div class="hmdiv" id="hmdiv2">
                    <div id="div2" class="sm"></div>
                    <div id="div22"></div>
                    </div>
                </div>
            </center>
    </body>
    <script type="text/javascript">
        
        function search() {
            var x = document.getElementById('hmdiv1');
            if (x.style.display === 'none') {
                x.style.display = 'block';
                
            } else {
                x.style.display = 'none';
                
            }
            document.getElementById('div1').innerHTML = 'Search By : <select><option id=\"an\">Name</option><option id=\"aun\">Username</option></select>Enter Input <input type=\"text\" onkeyup=\"return searchadmin()\" id=\"sa\" >';
            return true;
        }

        function search1() {
            var x = document.getElementById('hmdiv2');
            if (x.style.display === 'none') {
                x.style.display = 'block';

            } else {
                x.style.display = 'none';

            }
            document.getElementById('div2').innerHTML = "Search By : <select><option id=\"un\">Aadhar Number</option><option id=\"hof\">Head Of Family</option><option id=\"mob\">Mobile Number</option></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\"  onkeyup=\"return searchuser()\" id=\"su\" >";
        }

        function searchadmin() {
            var sa = document.getElementById('sa').value;
            var sal = document.getElementById('div11');
            var optns;
            if (document.getElementById('an').selected) {
                optns = "name";
            } else if (document.getElementById('aun').selected) {
                optns = "username";
            }
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (parseInt(xmlhttp.responseText) == 0) {
                        return;
                    } else {
                        sal.innerHTML = xmlhttp.responseText;
                    }
                }
            }
            xmlhttp.open("GET", "adminwrk.php?&sadmin=" + 1 + "&optns=" + optns + "&value=" + sa, false);
            xmlhttp.send();
            return true;
        }

        function searchuser() {
            var su = document.getElementById('su').value;
            var sal = document.getElementById('div22');
            var optns;
            if (document.getElementById('un').selected) {
                optns = "aadhar";
            } else if (document.getElementById('hof').selected) {
                optns = "hof";
            } else
                optns = "mob";
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (parseInt(xmlhttp.responseText) == 0) {
                        return;
                    } else {
                        sal.innerHTML = xmlhttp.responseText;
                    }
                }
            }
            xmlhttp.open("GET", "adminwrk.php?&sadmin=" + 0 + "&optns=" + optns + "&value=" + su, false);
            xmlhttp.send();
            return true;
        }
    </script>

    </html>