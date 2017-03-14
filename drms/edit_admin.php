<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
require_once('config.php');
header("Cache-Control: public, must-revalidate");
if(isset($_POST["Submit"])) {
  $uname = $_POST["uname"];
}
else {
  $cardno="";
}
$sql1="SELECT * from admindetails where username='$uname'";
$result=mysqli_query($dbC,$sql1);
$count=mysqli_num_rows($result);
if($count==0)
header("location:edit_admin_home.php?msg=Invalid Username");
$row=mysqli_fetch_row($result);
if($_SESSION['taluk']!=$row[3])
header("location:edit_admin_home.php?msg=Ration Card Is Not Under Your Taluk");
?>
    <body>
    <h2>Modify User</h2>
    <!-- container containing form code-->

    <div class="div1">
        <div class="container">
            <!-- form sta rt-->
            <section class="content bgcolor-3">
                <!-- head of family box starting-->
                <form action="edit_admin_db.php" method="post" enctype="multipart/form-data">
                    <span class="input input--manami input--filled" >
        <input class="input__field input__field--manami" type="text" id="input-32" name="uname" placeholder="<?php echo $row[0]; ?>" value="<?php echo $row[0]; ?>" readonly="readonly"/>
        <label class="input__label input__label--manami" for="input-32">
          <span class="input__label-content input__label-content--manami">Username</span>
                    </label>
                    </span>
                    <!-- head of family box end-->
                    <span class="input input--manami">
				<input class="input__field input__field--manami" type="text" id="input-34" name="pass" placeholder="<?php echo $row[1]; ?>" value="<?php echo $row[1]; ?>"/>
				<label class="input__label input__label--manami" for="input-34">
					<span class="input__label-content input__label-content--manami">Password</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-33" name="name"  placeholder="<?php echo $row[2]; ?>" value="<?php echo $row[2]; ?>"/>
        <label class="input__label input__label--manami" for="input-33">
          <span class="input__label-content input__label-content--manami">Name</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="taluk"  placeholder="<?php echo $row[3]; ?>" value="<?php echo $row[3]; ?>"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Taluk</span>
                    </label>
                    </span>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name=""  placeholder="0"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Role</span>
        </label>
        </span>

          <div>
               <input class="btn" type="submit" value="submit" name="Submit" />
           </div>



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
          </body>
