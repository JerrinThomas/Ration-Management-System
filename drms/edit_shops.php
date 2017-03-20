<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
require_once('config.php');
if(isset($_POST["Submit"])) {
  $shopno = $_POST["shopno"];
}
elseif (isset($_GET['sno'])){
  $shopno=$_GET['sno'];
}
else {
  $shopno="";
}

$sql1="SELECT * from rationshops where shopno='$shopno'";
$result=mysqli_query($dbC,$sql1);
$count=mysqli_num_rows($result);
$row=mysqli_fetch_row($result);
if($count==0)
    header("location:edit_shop_home.php?msg=Invalid Shop Number");
elseif (strcasecmp($_SESSION['taluk'],$row[3]) != 0) {
 header("location:edit_shop_home.php?msg=Ration Shop Is Not Under Your Taluk");
}
?>

    <body>
        <h2>Modify Ration Shop</h2>
        <!-- container containing form code-->

        <div class="div1">
            <div class="container">
                <!-- form sta rt-->
                <section class="content bgcolor-3">
                    <!-- head of family box starting-->
                    <form action="edit_shops_db.php" method="post" enctype="multipart/form-data">
                        <span class="input input--manami input--filled">
    <input class="input__field input__field--manami" type="text" id="input-32" name="shopno" placeholder="<?php echo $row[0]; ?>" value="<?php echo $row[0]; ?>" readonly="readonly"/>
    <label class="input__label input__label--manami" for="input-32">
      <span class="input__label-content input__label-content--manami">Shop Number</span>
                        </label>
                        </span>
                        <!-- head of family box end-->
                        <span class="input input--manami">
    <input class="input__field input__field--manami" type="text" id="input-34" name="lname" placeholder="<?php echo $row[1]; ?>" value="<?php echo $row[1]; ?>" onblur="validate('erlname',this.value)"/>
    <label class="input__label input__label--manami" for="input-34">
      <span class="input__label-content input__label-content--manami" id="erlname">Licensee Name</span>
                        </label>
                        </span>
                        <span class="input input--manami input--filled">
    <input class="input__field input__field--manami" type="text" id="input-33" name="address"  placeholder="<?php echo $row[2]; ?>" value="<?php echo $row[2]; ?>" onblur="validate('eraddress',this.value)"/>
    <label class="input__label input__label--manami" for="input-33">
      <span class="input__label-content input__label-content--manami" id="eraddress">Address</span>
                        </label>
                        </span>
                        <span class="input input--manami input--filled">
    <input class="input__field input__field--manami" type="text" id="input-34" name="taluk"  placeholder="<?php echo $row[3]; ?>" value="<?php echo $row[3]; ?>" readonly="readonly"/>
    <label class="input__label input__label--manami" for="input-34">
      <span class="input__label-content input__label-content--manami">Taluk</span>
                        </label>
                        </span>
                        <div>
                            <input class="btn" type="submit" value="submit" name="Submit" />
                        </div>

                    </form>
                </section>
            </div>
        </div>
        <script src="js/custom-file-input.js"></script>
        <script src="js/classie.js"></script>
        <script>
            (function() {
                // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
                if (!String.prototype.trim) {
                    (function() {
                        // Make sure we trim BOM and NBSP
                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                        String.prototype.trim = function() {
                            return this.replace(rtrim, '');
                        };
                    })();
                }

                [].slice.call(document.querySelectorAll('input.input__field')).forEach(function(inputEl) {
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

                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var sal = document.getElementById(field);
                        sal.setAttribute("style", "color:#ff7f50");
                        document.getElementById(field).innerHTML = xmlhttp.responseText;
                    } else {
                        document.getElementById(field).value = "Error Occurred. <a href='adduserhome.php'>Reload Or Try Again</a> the page.";
                    }
                }
                xmlhttp.open("GET", "add_shops.php?field=" + field + "&query=" + query, false);
                xmlhttp.send();
            }

        </script>
    </body>
