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
    input{
          width: 200px;     
   }
    body{
        color: green;
    }
    img{
            width: 500px;
    }
</style>

        <?php include('includes/nav.php'); 
                  
        ?>
        <center>
        <img src="header.png"/>
        <div>
            <input type="button" value="Search Admin" onclick="return search()" >
            <div id="div1"></div>
            <div id="div11"></div>
        </div>
        <div>
            <input type="button" value=" Search  User " onclick="return search1()">
            <div id="div2"></div>
            <div id="div22"></div>
        </div>
        </center>
    </body>
    <script type="text/javascript">
        function search(){
                document.getElementById('div1').innerHTML='Search By : <select><option id=\"an\">Name</option><option id=\"aun\">Username</option></select>Enter Input <input type=\"text\" onkeyup=\"return searchadmin()\" id=\"sa\" >';
            return true;
        }
        function search1(){
                document.getElementById('div2').innerHTML="Search By : <select><option id=\"un\">Aadhar Number</option><option id=\"hof\">Head Of Family</option><option id=\"mob\">Mobile Number</option></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\"  onkeyup=\"return searchuser()\" id=\"su\" >";
        }
        
        function searchadmin(){
          var sa=document.getElementById('sa').value;
          var sal = document.getElementById('div11');
          var optns;
                if(document.getElementById('an').selected) {
                       optns="name";
                }else if(document.getElementById('aun').selected) {
                       optns="username";
                }
          var xmlhttp;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(parseInt(xmlhttp.responseText) == 0 )
                        {
                                return;                                    
                        }
                        else
                        {
                           sal.innerHTML = xmlhttp.responseText;     
                        }
                    }
                }
                xmlhttp.open("GET", "adminwrk.php?&sadmin=" + 1 +"&optns=" + optns +"&value=" + sa , false);
                xmlhttp.send();
            return true;
        }
        function searchuser(){
          var su=document.getElementById('su').value;
          var sal = document.getElementById('div22');
                var optns;
                if(document.getElementById('un').selected) {
                       optns="aadhar";
                }else if(document.getElementById('hof').selected) {
                       optns="hof";
                }
                else
                    optns="mob";
          var xmlhttp;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(parseInt(xmlhttp.responseText) == 0 )
                        {
                               return;
                        }
                        else
                        {
                           sal.innerHTML = xmlhttp.responseText;     
                        }
                    }
                }
                xmlhttp.open("GET","adminwrk.php?&sadmin=" + 0 +"&optns=" + optns +"&value=" + su , false);
                xmlhttp.send();
            return true;
        }
    </script>

    </html>
