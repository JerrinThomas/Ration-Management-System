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
            
            input[type="radio"] {
                display: none;
            }
            label {
                cursor: pointer;
            }
            input[type="radio"] + label:before {
                border: 1px solid #ffffff;
                content: "\00a0";
                display: inline-block;
                font: 16px/1em sans-serif;
                height: 16px;
                margin: 0 .25em 0 0;
                padding:0;
                vertical-align: top;
                width: 16px;
                margin-top: 10px;
                margin-right: 15px;
            }
            input[type="radio"]:checked + label:before {
                background: #fff;
                color: #666;
                content: "\2713";
                text-align: center;
            }
            input[type="radio"]:checked + label:after {
                font-weight: bold;
            }
            #myDIV {
                width: 50%;
                padding: 50px 0;
                text-align: center;
                background-color: white;
                margin-top:0px;
                display: none;
            }
            .stub:hover {
                background-color: #f33636;
                color: white;
            }
            .stub {
                width: 10%;
                height: 40px;
                background-color: white;
                color: #47a3da;
                font-size: 20px;
                border: none;
                letter-spacing: 2.5px;
                margin-bottom: 20px;
            }
            .salessub {
                background-color: #FF8484;
                color: white;
                font-size: 30px;
                width: 25%;
                height: 60px;
                letter-spacing: 2px;
                border: 3px solid white;
                margin: 12px;
            }
            .salessub:hover {
                background-color: #DA344D;
                color: white;
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
                   <div class="container" style="background-color: #47a3da;
                   margin-top: 10%; 
                    ">
                    <br><br><br><h3 style=" color: white;
                    font-size: 80px; 
                    margin-bottom: 4%;"><center>Search</center></h3>
                    <center>
                        <select onchange="return history()" style=" width: 200px;
                           height: 30px;
                           color: white;
                           background-color: #47a3da;
                           font-size: 25px;
                           border: 3px solid white;
                           margin-bottom: 5px; ">
                            <option id="a" style=" color: #47a3da;
                            background-color: white; ">All</option>
                            background-color: white;<option id="w" style=" color: #47a3da;
                            background-color: white; ">Wheat</option>
                            background-color: white;<option id="r" style=" color: #47a3da;
                            background-color: white;
                             ">Rice</option>
                            <option id="k" style=" color: #47a3da;
                            background-color: white;
                             ">Kerosene</option>
                        </select><br>
                        
                        
                       <!-- <input type="radio" name="cat" id="today" checked="checked"> <label>Today's Sale</label>
                        <input type="radio" name="cat" id="past"><label>Past Month's Sale</label>-->
                        <div class="rdr" style="
                        width: 50%;
                        margin-left: 80px;
                        margin-top: 20px;">
                        <center>
                            <input type="radio" id="today" name="cat" checked="checked">
                        <label for="today" style=" font-family: 'Lato', sans-serif;
                        font-size: 25px;
                        color: white;
                        letter-spacing: 2px; ">Today's Sale</label>
                        
                            <input type="radio" id="past" name="cat">
                        
                        <label for="past" style=" font-family: 'Lato', sans-serif;
                        letter-spacing: 2px;
                        color: white;
                        font-size: 25px;
                        margin-left: 40px;
                         ">Past Month's Sale</label>
                            </center>     
                        </div>
                        
                        
                           <!-- <br><input type="radio" name="cat" id="custom"><label for="custom">Custom</label><br>
                            <label>From</label> <input type="date" name="frmdate" id="frmdate"><label>To :</label>  <input type="date" name="todate" id="todate">-->
                    <br>
                        <button onclick="myFunction()" class="stub" name="cat" id="custom">Filter</button>
                            <div id="myDIV">
                                <label for="past" style=" font-family: 'Lato', sans-serif;
                                letter-spacing: 2px;
                                color: #47a3da;
                                font-size: 25px;">From :</label>
                                <input type="date" name="frmdate" id="frmdate" style=" height: 30px;
                                                                                      background-color: white;
                                                                                      border: 2.2px solid #47a3da;
                                                                                      color: #47a3da;
                                                                                      font-size: 18px;
                                                                                      border-radius: 8px;
                                  "><label for="past" style=" font-family: 'Lato', sans-serif;
                                   letter-spacing: 2px;
                                    color: #47a3da;
                                    font-size: 25px;">To :</label>  <input type="date" name="todate" id="todate" style=" height: 30px;
                                    background-color: white;
                                    border: 2.2px solid #47a3da;
                                    color: #47a3da;
                                    font-size: 18px;
                                    border-radius: 8px;
                                    ">
                            </div><br>
                    <input type="submit" name="subsales" value="submit" onclick="return history()" class="salessub">
                      
                       
                            
                    </center>
                    <div id="tablehere" style=" margin-top: 0px;
                        margin-bottom: 80px;
                     "></div>
                    </div>
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
        var pww= -0.001;
        var prr= -0.001;
        var pkk= -0.001;
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
                // check whether the transaction may lead to a negative value in the balance fields...                        
                var xmlhttp;
                if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome , Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } 
                xmlhttp.onreadystatechange = function() {
                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(parseInt(xmlhttp.responseText) != 0 )
                        {
                          alert(xmlhttp.responseText);
                          dis.value='OOPs.';
                        }
                    }
                }
                xmlhttp.open("GET", "check.php?&shno=" +sno +"&crdno=" + window.value+"&qr=" + r +"&qw=" + w +"&qk=" + k , false);
                xmlhttp.send();
            
            return true;
        }

        function otpcheck()
        {
          var v=document.getElementById('votp' );
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
        if(prr == -0.001 && pkk == -0.001 && pww == -0.001 ){
            alert ("Enter An Input");
            return; 
        }
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
        if(isNaN(tot)){
            alert(' Entry Is Invalid Try Again After Giving A Valid Entry.');
            return;
        }
        else
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
      var chkfltr=0;
      function myFunction() {
          var x = document.getElementById('myDIV');
          if (x.style.display === 'none') {
              x.style.display = 'block';
              chkfltr=1;
          } else {
              x.style.display = 'none';
              chkfltr=0;
          }
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
                }/*else if(document.getElementById('custom').checked) {
                    cat='custom';
                }*/
                else if(chkfltr){
                    cat='custom';
                }
                else if(document.getElementById('today').checked) {
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
