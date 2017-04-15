<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
if(isset($_SESSION['lname']))
     header("Location: maintab.php");
if(isset($_GET["msg"]))
    $msg=$_GET["msg"];
else
    $msg="";
if(isset($_GET["lout"]))
    $lout=$_GET["lout"];
else
    $lout="";

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Ration Shop Management System</title>
    <meta name="description" content="DRMS" />
    <meta name="keywords" content="Ration System, digital" />
    <meta name="author" content="DRMS" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/modernizr.custom.js"></script>



</head>

<body>
    <div class="container">

        <div id="splitlayout" class="splitlayout">

            <div class="intro">

                <!-- Left Side -->
                <div class="side side-left">
                    
                    <input type="button" name="hdr" id="bttn" value="Ration Card Search"><br>
                    <input type="text" name="srcht" id="srcht" placeholder="Enter card number..." onblur="return cnochk()">
                    <input type="submit" name="srchb" id="srchb" value="Search" onclick="return search()">
                    <div class="overlay">
                        </img>
                    </div>
                    
                </div>

                <!-- Right Side -->
                <div class="side side-right">
                     <div class="formlog">
                        <h2>Ration Shop Login</h2><img id="loading" src="loading.gif" alt="loading" style="visibility:hidden" />
                        <!-- <input type="button" name="hdr" id="rbttn" value="Ration Shop Login"><br> -->
                        <form action="drmsrshop/shoplogin.php" method="post">
                            
                            <h2 id="message"><?php echo $lout ?></h2>
                            <input type="text" name="shopno" id="rsrcht" placeholder="Ration Shop Number" required="required" onblur="ajax_check(this.value)"><br>
                            <input type="password" name="pword" id="rsrcht2" placeholder="Password" required="required"><br>
                            <input type="submit" name="slogin" id="rsrchb" value="Login">
                            <h2><?php echo $msg ?></h2>
                        </form>
                    
                    <div class="overlay">

                    </div>
                    <container id="header-cont">
                      <img src="header.png" id="headimgr">  </img>
                  </container>
                </div>
                <div class="adminlog">
                  <a href="drmsadmin/adminlogin.php"><img id="adminl" src="adminbtn.png"></img></a>
                </div>
            </div>
            <!-- /intro -->

        </div>
        <!-- /splitlayout -->

    </div>

    <!-- /container -->
    <script src="js/classie.js"></script>
    <script src="js/cbpSplitLayout.js"></script>
    <script src="drmsadmin/js/jquery-v1.min.js"></script>
    <script>
function ajax_check(no)	{
  $('#loading').css('visibility','visible');
  $.ajax({
    type: "POST",
    url: "drmsrshop/shoplogin.php",
    data: 'sno='+no,
    dataType: "text",
    success: function(msg){

      if(parseInt(msg)!=0)
      {
        $('#message').html(msg);
        $('#loading').css('visibility','hidden');
      }
        }
  });

}
var v;
var t=true;
function cnochk(){     
                var xmlhttp;
                v=document.getElementById('srcht').value;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                      if(parseInt(xmlhttp.responseText) != 0){
                                                alert(xmlhttp.responseText);
                                                t=false;
                                      }
                                      else
                                          t=true;
                    }
                }
                xmlhttp.open("GET", "cardsearch.php?cno=" + v , false);
                xmlhttp.send();
            return true;
}
function search(){   
    v=document.getElementById('srcht').value;
    if( v== '' )
        alert('Enter A CardNumber.');
    else{
        if(t==true)
            window.location.href = "cardsearch.php?value=" + v ;
    }
}

</script>
</body>

</html>
