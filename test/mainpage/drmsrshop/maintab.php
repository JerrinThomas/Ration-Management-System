<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
session_start();
if(!isset($_SESSION['lname']))
     header("Location:../index.php?lout=Sign In Again");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
        <a href="slogout.php"><h4 style="color:red">Logout<h4></a>
    <div class="col-md-12">
        <div class=" with-nav-tabs panel-primary">
            <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active hvr-reveal"><a href="#tab1primary " data-toggle="tab">Home</a></li>
                    <li class="hvr-reveal"><a href="#tab2primary " data-toggle="tab">Sales History</a></li>
                    <li class="hvr-reveal"><a href="#tab3primary " data-toggle="tab">Stock</a></li>

                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active " id="tab1primary">

                        <div class="container">
                            <div class="row vertical-align">
                                <div class="card card-container">
                                    <input type="text" name="srcht" id="srcht" style="text-align:center;" placeholder="Enter card number...">
                                    <input type="submit" name="srchb" id="srchb" value="Search" onclick="return ld();"> 
                                </div>
                          
                                <div class="card1 card-container1" id="tabl">
                                    <center><img id="loading" src="load.gif" alt="loading" style="visibility:hidden" /></center>
                                </div>
                            </div>
                        </div>
                    </div>


                
                <div class="tab-pane fade" id="tab2primary">Primary 2</div>
                <div class="tab-pane fade" id="tab3primary">Primary 3</div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        function ld(){
            var chng = document.getElementsByClassName('card1');
            var ldgif=document.getElementById('loading');
            var v=document.getElementById('srcht');
            var val=v.value;
            var sno='<?php echo $_SESSION['shopno'] ?>'; 
            var sal = document.getElementById('tabl');
            ldgif.setAttribute("style","visibility:visible");
            chng[0].style.display = "table-cell";
            chng[0].style.zIndex = "0";
                var xmlhttp;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                        ldgif.setAttribute("style","visibility:visible");
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(parseInt(xmlhttp.responseText) == 0 ) 
                        {
                          sal.innerHTML = 'Ration Card No. '+v.value+' Not Found Or Does Not Belongs To This Shop. <br><br><center><a href="maintab.php"><input type="submit" value="Back" </a></center>';
                        }
                        else
                        {
                           ldgif.setAttribute("style","visibility:hidden");
                           sal.innerHTML = xmlhttp.responseText;
                        }
                    } 
                }
                xmlhttp.open("GET", "cartarea.php?cardno=" + val + "&shopno=" +sno, false);
                xmlhttp.send();
            return true;
        }
        
        
    ///  page is reloaded instead of executing this functn ......
        function rtn() {
            var chng = document.getElementsByClassName('card1');
            chng[0].style.display = "none";
            chng[0].style.zIndex = "-10";
            return true;
        }
   
        function total()
        {
            var pr=parseFloat(document.getElementById('price').innerHTML);
            var pw=parseFloat(document.getElementById('pwheat').innerHTML);
            var pk=parseFloat(document.getElementById('pker').innerHTML);
            var r=document.getElementById('valr').value; 
            var w=document.getElementById('valw').value;
            var k=document.getElementById('valk').value;
            var tot=0.00;
            tot=parseFloat(pw*w)+parseFloat(pr*r)+parseFloat(pk*k);
            var dis=document.getElementById('totamt');
            if(isNaN(tot)){
                dis.value='OOPS.';
            }
            else
            dis.value='Rs '+tot+' /-';
            return true;
        } 
        
        
    </script>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

 <!--   <script src="js/jquery-v1.min.js"></script> 

 /*  function loadcart(val)	
   {	
	$('#loading').css('visibility','visible');	

	$.ajax({	
		type: "POST",
		url: "cartarea.php",
		data: 'shopno='+val,	
		dataType: "html",	
		success: function(msg){

			if(parseInt(msg)!=0)	
			{
				$('#tabl').html(msg);	
                $('#tab1').style.display = "table-cell";
                $('#tab1').style.zIndex = "0";
				$('#loading').css('visibility','hidden');	
			}
		}

	});

   } */

    </script> -->

</body>

</html>