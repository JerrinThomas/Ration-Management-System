<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
require_once('config.php');
header("Cache-Control: no-cache, must-revalidate");
if(isset($_POST["Submit"])) {
  $cardno = $_POST["cardno"];
}
else {
  $cardno="";
}
$sql1="SELECT ration_card_no,adhar_no,hofamily,add1,add2,add3,pan_mun_cor,pincode,wardno,house_no,monthly_in,mob_no,taluk,category,no_of_mem,hof_img from rationcard_holder where ration_card_no='$cardno'";
$result=mysqli_query($dbC,$sql1);
$count=mysqli_num_rows($result);
$row1=mysqli_fetch_row($result);
if($count==0)
header("location:edit_user_home.php?msg=Invalid RationCard Number");
elseif (strcasecmp($_SESSION['taluk'],$row1[12]) != 0) {
 header("location:edit_user_home.php?msg=Ration Card ".$cardno." Is Not Under Your Taluk");
}
$sql2="SELECT mem_name,age,adhar_no FROM cardholder_and_mem WHERE ration_card_no='$cardno'";
$res=mysqli_query($dbC,$sql2);

?>
<body>
    <style>
    .error{
        color: coral;
        font-size: 25px;
        visibility: hidden;
    }

</style>
        <script type="text/javascript" src="js/validateedituser.js"></script>
    <h2>Modify User</h2>
    <!-- container containing form code-->

    <div class="div1">
        <div class="container">
            <!-- form sta rt-->
            <section class="content bgcolor-3">
                <!-- head of family box starting-->
                <img src="<?php echo $row1[15];?>"/>
                <form action="edit_user_db.php" method="post" enctype="multipart/form-data" name="frm" onsubmit="return vali();">
                    <span class="input input--manami input--filled" >
        <input class="input__field input__field--manami" type="text" id="input-32" name="cardno" placeholder="<?php echo $row1[0]; ?>" value="<?php echo $row1[0]; ?>" readonly="readonly"/>
        <label class="input__label input__label--manami" for="input-32">
          <span class="input__label-content input__label-content--manami">Ration Card Number</span>
                    </label>
                    </span>
                    <!-- head of family box end-->
                    <span class="input input--manami input--filled">
                        <input class="input__field input__field--manami" type="text" id="input-34" name="adhar_no" placeholder="<?php echo $row1[1]; ?>" value="<?php echo $row1[1]; ?>" onblur="validate('erradhar',this.value)" />
				<label class="input__label input__label--manami" for="input-34">
                    <span class="input__label-content input__label-content--manami" id="erradhar">Adhar Number</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-33" name="hofamily"  placeholder="<?php echo $row1[2]; ?>" value="<?php echo $row1[2]; ?>"/>
        <label class="input__label input__label--manami" for="input-33">
            <span class="input__label-content input__label-content--manami" id="erhoname">Head Of Family</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="add1"  placeholder="<?php echo $row1[3]; ?>" value="<?php echo $row1[3]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
            <span class="input__label-content input__label-content--manami" id="erradd">Address 1</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="add2"  placeholder="<?php echo $row1[4]; ?>" value="<?php echo $row1[4]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Address 2</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="add3"  placeholder="<?php echo $row1[5]; ?>" value="<?php echo $row1[5]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Address 3</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="pan_mun_cor"  placeholder="<?php echo $row1[6]; ?>" value="<?php echo $row1[6]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
            <span class="input__label-content input__label-content--manami" id="errpan">Panchayath/Muncipality/Corporation</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="pincode"  placeholder="<?php echo $row1[7]; ?>" value="<?php echo $row1[7]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
            <span class="input__label-content input__label-content--manami" id="errpin">Pincode</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="wardno"  placeholder="<?php echo $row1[8]; ?>" value="<?php echo $row1[8]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
            <span class="input__label-content input__label-content--manami" id="errward">Ward Number</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="house_no"  placeholder="<?php echo $row1[9]; ?>" value="<?php echo $row1[9]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
            <span class="input__label-content input__label-content--manami" id="errhouse">House Number</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="monthly_in"  placeholder="<?php echo $row1[10]; ?>" value="<?php echo $row1[10]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
            <span class="input__label-content input__label-content--manami" id="errmon">Monthly Income</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
                        <input class="input__field input__field--manami" type="text" id="input-34" name="mob_no"  placeholder="<?php echo $row1[11]; ?>" value="<?php echo $row1[11]; ?>" onblur="validate('errmob',this.value)"/>
				<label class="input__label input__label--manami" for="input-34">
                    <span class="input__label-content input__label-content--manami" id="errmob">Mobile Number</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
				<input class="input__field input__field--manami" type="text" id="input-34" name="taluk"  placeholder="<?php echo $row1[12]; ?>" value="<?php echo $row1[12]; ?>" readonly="readonly"/>
				<label class="input__label input__label--manami" for="input-34">
					<span class="input__label-content input__label-content--manami">Taluk</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
				<input class="input__field input__field--manami" type="text" id="input-34" name="cat"  placeholder="<?php echo $row1[13]; ?>" value="<?php echo $row1[13]; ?>" readonly="readonly"/>
				<label class="input__label input__label--manami" for="input-34">
                    <span class="input__label-content input__label-content--manami" id="errcat">Category</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="no_of_mem"  placeholder="<?php echo $row1[14]; ?>" value="<?php echo $row1[14]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
            <span class="input__label-content input__label-content--manami" id="errno">Number Of Members Family</span>
                    </label>
                    </span>
                    
        <h4>Details of other Family Member(s)</h4>
        </label>
      </span>
                    <table id="employee_table" align=center>
                          <?php while ($row2=mysqli_fetch_row($res))
                            {
                              $i=1;
                              echo "<tr id=\"row".$i."\"><td><input class=\"memfam\" type=\"text\" name=\"name[]\" placeholder=\"".$row2[0]."\" value=\"".$row2[0]."\" id=\"name".$i."\"
                              ></td><td><input class=\"memfam\" type=\"number\" name=\"age[]\" placeholder=\"".$row2[1]."\" value=\"".$row2[1]."\" id=\"age".$i."\"></td><td><input class=\"memfam\" type=\"number\" name=\"adhar_no2[]\" placeholder=\"".$row2[2]
                              ."\" value=\"".$row2[2]."\" id=\"adhar".$i."\" onblur=\"valid('check',this.value)\"></td><td><input class='btnew' type='button' value='-' onclick=delete_('row1')></td></tr>";
                              $i++;
                            }
                          ?>
                    </table>
                    <input class="btnew" type="button" onclick="add_row();" value="+">
                    <br/>
                    <span id="errrowname" class="error">Please Enter Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
            <span style="padding-right:30px; padding-left:70px; " id="errrowage" class="error"> Please Enter Age  </span>
            <span style="padding-left:40px;" id="errrowadhar" class="error">Please Enter Aadhar No</span>
            </section>
        </div>
        <!-- ended form container-->
        <!-- image upload button code-->
        <h4>Upload an Image : </h4>
        <div class="two">
            <div class="box">
                <input type="file" name="fileToUpload" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                <label for="file-1">
                    <span>Choose a file&hellip;</span>
                </label>
            </div>
        </div>
        <!-- ended image upload button-->
        <!-- submit button-->
        <div>
            <input class="btn" type="submit" value="submit" />
        </div>
        <!-- ended submit button -->
        </form>
        <script type="text/javascript" src="https://gc.kis.scr.kaspersky-labs.com/EB053B0F-62D3-E04B-B72C-CDF5F58B09B7/main.js" charset="UTF-8"></script>
        <script>
        function validate(field, query) {
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else { // for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
        document.getElementById(field).innerHTML = "Validating..";

        }
        else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var sal = document.getElementById(field);
            sal.setAttribute("style","color:#ff7f50");
            document.getElementById(field).innerHTML = xmlhttp.responseText;
        }
        else {
        document.getElementById(field).value = "Error Occurred. <a href='adduserhome.php'>Reload Or Try Again</a> the page.";
        }
        }
        xmlhttp.open("GET", "adduser.php?field=" + field + "&query=" + query, false);
        xmlhttp.send();
        }
        </script>
<!-- Error Section -->
      <script>
        function valid(field, query) {
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else { // for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
           if(xmlhttp.responseText != "")
              alert(xmlhttp.responseText);
        }
        xmlhttp.open("GET", "adduser.php?field=" + field + "&query=" + query, false);
        xmlhttp.send();
        }
      </script>
        <script>
            (function (e, t, n) {
                var r = e.querySelectorAll("html")[0];
                r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
            })(document, window, 0);
        </script>
        <script src="js/custom-file-input.js"></script>
        <script src="js/classie.js"></script>
        <script>
            (function () {
                // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
                if (!String.prototype.trim) {
                    (function () {
                        // Make sure we trim BOM and NBSP
                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                        String.prototype.trim = function () {
                            return this.replace(rtrim, '');
                        };
                    })();
                }

        [].slice.call(document.querySelectorAll('input.input__field')).forEach(function (inputEl) {
                    // in case the input is already filled..
                    if (inputEl.value.trim() !== '') {
                        classie.add(inputEl.parentNode, 'input--filled');
                    }

                    // events:
                    inputEl.addEventListener('focus', onInputFocus);
                    inputEl.addEventListener('blur', onInputBlur);
                });

                function onInputFocus(ev) {
                    classie.add(ev.target.parentNode, 'input--filled');
                }

                function onInputBlur(ev) {
                    if (ev.target.value.trim() === '') {
                        classie.remove(ev.target.parentNode, 'input--filled');
                    }
                }
            })();
        </script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            function add_row() {
                $rowno = $("#employee_table tr").length;
                $rowno = $rowno + 1;
                $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><input class='memfam' type='text' name='name[]' placeholder=' Name '></td><td><input class='memfam' type='text' name='age[]' placeholder=' Age '></td><td><input class='memfam' type='text' name='adhar_no2[]' placeholder=' Aadhaar Number '></td><td><input class='btnew' type='button' value='-' onclick=delete_row('row" + $rowno + "')></td></tr>");
            }

            function delete_row(rowno) {
                $('#' + rowno).remove();
            }
            function delete_(rowno){
                $('#' + rowno).empty();
            }
        </script>
    </div>

    </body>
