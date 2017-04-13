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
    <title>D R M S</title>

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
        
        <style>
            #srchb6 {
                width: 100%;
                height: 100%;
                display: inline;
                position: relative;
                top: 12%;
                box-sizing: border-box;
                border: 2px solid #47a3da;
                border-radius: 10px;
                font-size: 30px;
                color: #47a3da;
                background-color: transparent;
                margin-left: 5%;
                letter-spacing: 5px;
            }
            #srchb6:hover {
                background-color: #47a3da; /* white */
                color: #fff;
            }
            a:hover{text-decoration: none;}
            .card-container.card {
                margin-top: 25  
            }
    </style>
        
    <div class="col-md-12">
        <div class=" with-nav-tabs panel-primary">
            <div class="panel-heading" style="position: fixed; overflow: hidden; z-index: 100; box-shadow: 5px 4px .5px #fff; width: 97.5%;">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active hvr-reveal"><a href="#tab1primary " data-toggle="tab">Home</a></li>
                    <li class="hvr-reveal"><a href="#tab2primary " data-toggle="tab">Sales History</a></li>
                    <li class="hvr-reveal"><a href="#tab3primary " data-toggle="tab" onclick="return stock()">Stock</a></li>

                </ul>
            </div>
            <div style="position: fixed;
                        margin-top: 100px;
                        margin-left: 85%;">
                <a href="slogout.php"><input type="submit" name="srchb" id="srchb6" value="Logout"></a>
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


                
                <div class="tab-pane fade" id="tab2primary">Primary 2
                    <br><br><br><h3><center>Search</center></h3>
                    <center>
                        <select onchange="return history()">
                            <option id="a">All</option>
                            <option id="w">Wheat</option>
                            <option id="r">Rice</option>
                            <option id="k">Kerosene</option>
                        </select><br>
                        
                    <input type="radio" name="cat" id="today" checked="checked">Today's Sale
                    <input type="radio" name="cat" id="past">Past Month's Sale
                    <br><input type="radio" name="cat" id="custom">Custom   From : <input type="date" name="frmdate" id="frmdate"> To : <input type="date" name="todate" id="todate">
                    <br>
                    <input type="submit" name="subsales" value="submit" onclick="return history()">
                        
                    </center>
                    <div id="tablehere"></div>

                </div>
                <div class="tab-pane fade" id="tab3primary">Primary 3
                    
                    
                </div>
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
            window.value=val;
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
                          sal.innerHTML = '<style>a:hover{text-decoration: none;}#srchb3 {width: 20%;height: 25%;display: inline;position: relative;top: 40%;box-sizing: border-box;border: 2px solid white;border-radius: 15px;font-size: 40px;color: white;background-color: transparent;margin-left: 25%;}#srchb3:hover {background-color: #ffffff; /* white */color: #47a3da;}.abc{font-size: 45px;letter-spacing: 1px;margin-top: 20%;}</style><h3 class="abc">Ration Card No. '+v.value+' Not Found Or Does Not Belongs To This Shop.</h3> <br><br><center><a href="maintab.php" style="margin-left: -20%;"><input type="submit" name="srchb3" id="srchb3" value="Back"></a></center>';
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
        var tot=0.00;
        var sno='<?php echo $_SESSION['shopno'] ?>';
        var pww;
        var prr;
        var pkk;
        function total()
        {
            var pr=parseFloat(document.getElementById('price').innerHTML);
            var pw=parseFloat(document.getElementById('pwheat').innerHTML);
            var pk=parseFloat(document.getElementById('pker').innerHTML);
            var r=document.getElementById('valr').value;
            var w=document.getElementById('valw').value;
            var k=document.getElementById('valk').value;
            pww=parseFloat(pw*w);
            prr=parseFloat(pr*r);
            pkk=parseFloat(pk*k);
            tot= prr+pkk+pww;
            var dis=document.getElementById('totamt');
            if(isNaN(tot)){
                dis.value='OOPS.';
            }
            else
            dis.value='Rs '+tot+' /-';
            return true;
        }

        function otpcheck()
        {
          var v=document.getElementById('votp');
          var val=v.value;
          var error = document.getElementById('otpcheckresult');
          var sal = document.getElementById('tabl');
          var xmlhttp;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                        error.innerHTML='<center><img id="loading" src="load.gif" alt="loading"/></center>';
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(parseInt(xmlhttp.responseText) == 0 )
                        {
                            sal.innerHTML = '<style>.bc{background-color: #47a3da;color: white;border: 2px solid;font-size: 30px;letter-spacing: 3px;} .bc:hover{background-color: #fff;color: #47a3da;}</style><h4 style="font-size: 40px;margin-top: 20%;">Invalid OTP or Time Expired.</h4><br><center><a href=\"maintab.php\"><input class=\"bc\" type=\"button\" value=\"Back\"></center>';
                        }
                        else
                        {
                           sal.innerHTML = xmlhttp.responseText;     
                            countdown("countdown", 3, 0 );
                        }
                    }
                }
                xmlhttp.open("GET", "cartarea.php?&otp=" + val + "&spno=" +sno +"&cdno=" + window.value, false);
                xmlhttp.send();
            return true;
        }

        function transaction(){
            var r=document.getElementById('valr').value;
            var qr=parseFloat(document.getElementById('qr').innerHTML);
            var w=document.getElementById('valw').value;
            var qw=parseFloat(document.getElementById('qw').innerHTML);
            var k=document.getElementById('valk').value;
            var qk=parseFloat(document.getElementById('qk').innerHTML);
            var sal = document.getElementById('tabl');
            var sno='<?php echo $_SESSION['shopno'] ?>';
             if(k>qk || r>qr || w>qw){
                alert("Entered value Cannot Be Processed...");
                return true;
            }
         alert('TOTAL : '+ tot + ' ');
          var xmlhttp;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                        error.innerHTML='<center><img id="loading" src="load.gif" alt="loading"/></center>';
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(parseInt(xmlhttp.responseText) == 0 )
                        {
                          sal.innerHTML = 'Processing Completed Successfully...<br><center><a href=\"maintab.php\"><input type=\"button\" value=\"Back\"></center>';
                        }
                        else
                        {
                           sal.innerHTML = xmlhttp.responseText;
                        }
                    }
                }
                xmlhttp.open("GET", "cartarea.php?&totamt=" + tot + "&shno=" +sno +"&crdno=" + window.value+"&qr=" + r +"&qw=" + w +"&qk=" + k +"&pk=" + pkk +"&pw=" + pww +"&pr=" + prr, false);
                xmlhttp.send();
            return true;

    }
     function countdown( elementName, minutes, seconds )
     {
       var element, endTime, hours, mins, msLeft, time;

         function twoDigits( n )
         {
            return (n <= 9 ? "0" + n : n);
         }

         function updateTimer()
         {
           msLeft = endTime - (+new Date);
           if ( msLeft < 1000 ) {
              element.innerHTML = "countdown's over!";
           } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
           }
        }


    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
    }
   
    function stock()
      {
                var xmlhttp;
                var sal = document.getElementById('tab3primary');
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                        error.innerHTML='<center><img id="loading" src="load.gif" alt="loading"/></center>';
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                           sal.innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "cartarea.php?&shno4stock=" +sno , false);
                xmlhttp.send();
            return true;
      }
      
      function history()
      {
                var fdat=document.getElementById('frmdate');
                var fdate=fdat.value;
                var tdat=document.getElementById('todate');
                var tdate=tdat.value;
                var cat,optns;
                if(document.getElementById('past').checked) {
                    cat='past';
                    fdate='';
                    tdate='';
                }else if(document.getElementById('custom').checked) {
                    cat='custom';
                }else if(document.getElementById('today').checked) {
                    cat='today';
                    fdate='';
                    tdate='';
                }
                if(document.getElementById('w').selected) {
                       optns="w";
                }else if(document.getElementById('k').selected) {
                       optns="k";
                }else if(document.getElementById('r').selected) {
                       optns="r";
                }else{
                     optns="a";
                }
               
                var xmlhttp;
                var sal = document.getElementById('tablehere');
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                        sal.innerHTML='<center><img id="loading" src="load.gif" alt="loading"/></center>';
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                           sal.innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "cartarea.php?&shno4sales=" +sno +"&tdate="+tdate+"&fdate="+fdate+"&cat="+cat+"&optns="+optns, false);
                xmlhttp.send();
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
