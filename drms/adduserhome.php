<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
/*header("Cache-Control: public, must-revalidate"); */
    if(!isset($_SESSION['name']))
      header("Location: adminlogin.php");

?>
<style>
    .error{
        color: coral;
        font-size: 25px;
        visibility: hidden;
    }

</style>
   <script src="js/adduser.js"></script>
     <body>
    <h2>Add User</h2>
    <!-- container containing form code-->

    <div class="div1">
        <div class="container">
            <!-- form start-->
            <section class="content bgcolor-3">
                <!-- head of family box starting-->
                <form action="adduser.php" method="post" enctype="multipart/form-data" name="frm" onsubmit="return val();">

                    <span class="input input--manami">
                        <input class="input__field input__field--manami" type="text" id="input-32" name="hofamily" placeholder="Name of the Head of the Family" />
        <label class="input__label input__label--manami" for="input-32">
          <span class="input__label-content input__label-content--manami" id="erhoname">Name of the Head of the Family</span>
                    </label>
                    </span>

                    <!-- head of family box end-->
                    <span class="input input--manami">
                        <input class="input__field input__field--manami" type="text" id="input-34" name="adhar_no" placeholder="Enter Adhar Number"/>
				<label class="input__label input__label--manami" for="input-34">
                    <span class="input__label-content input__label-content--manami" id="erradhar">Adhar Number</span>
                    </label>
                    </span>

                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-33" name="add1" placeholder="Enter Address"/>
        <label class="input__label input__label--manami" for="input-33">
          <span class="input__label-content input__label-content--manami" id="erradd">Address 1</span>
                    </label>
                    </span>

                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="add2"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Address 2</span>
                    </label>
                    </span>

                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="add3"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Address 3</span>
                    </label>
                    </span>

                    <span class="input input--manami">
                        <input class="input__field input__field--manami" type="text" id="input-34" name="pan_mun_cor" placeholder="Enter Panchayath/Muncipality/Corporation"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami" id="errpan">Panchayath/Muncipality/Corporation</span>
                    </label>
                    </span>

                    <span class="input input--manami">
                        <input class="input__field input__field--manami" type="text" id="input-34" name="pincode" placeholder="Enter PINCODE"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami" id="errpin">PINCODE</span>
                    </label>
                    </span>

                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="wardno" placeholder="Enter Ward Number"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami" id="errward">Ward Number</span>
                    </label>
                    </span>

                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="house_no" placeholder="Enter House Number"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami" id="errhouse">House Number</span>
                    </label>
                    </span>

                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="monthly_in" placeholder="Enter Monthly Income"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami" id="errmon">Monthly Income</span>
                    </label>
                    </span>

                    <span class="input input--manami">
				<input class="input__field input__field--manami" type="text" id="input-34" name="mob_no" placeholder="Enter Mobile Number"/>
				<label class="input__label input__label--manami" for="input-34">
					<span class="input__label-content input__label-content--manami" id="errmob">Mobile Number</span>
                    </label>
                    </span>

                    <span class="input input--manami input--filled">
				<input class="input__field input__field--manami" type="text" id="input-34" name="taluk"  placeholder="<?php echo $ro[1]; ?>" value="<?php echo $ro[1]; ?>" readonly="readonly"/>
				<label class="input__label input__label--manami" for="input-34">
					<span class="input__label-content input__label-content--manami">Taluk</span>
                    </label>
                    </span>

                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="cat" placeholder="Enter Category"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami" id="errcat">Category</span>
                    </label>
                    </span>

                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="no_of_mem" placeholder="Enter Number of Members in Family"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami" id="errno">Number of Members in Family</span>
                    </label>
                    </span>

        <h4>Details of other Family Member(s)</h4>
        </label>
      </span>
          <table id="employee_table" align=center>
              <tr id="row1">
                 <td>
                  <input  class="memfam" type="text" name="name[]" placeholder=" Name " id="name1">
                 </td>
                 <td>
                       <input class="memfam" type="number" name="age[]" placeholder=" Age " id="age1">
                </td>
                <td>
                      <input class="memfam" type="number" name="adhar_no2[]" placeholder=" Aadhar Number " id="adhar1">
                </td>
                <td><input class='btnew' type='button' value='-' onclick=delete_('row1')></td>

              </tr>

        </table>
                    <input class="btnew" type="button" onclick="add_row();" value="+">
                    <br/>
                    <span id="errrowname" class="error">please enter name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
            <span style="padding-right:30px; padding-left:70px; " id="errrowage" class="error"> please enter age  </span>
            <span style="padding-left:40px;" id="errrowadhar" class="error">please enter adhar No</span>
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
                $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><input class='memfam' type='text' name='name[]' placeholder=' Name ' id='name"+$rowno+"'></td><td><input class='memfam' type='text' name='age[]' placeholder=' Age 'id='age"+$rowno+"'></td><td><input class='memfam' type='text' name='adhar_no2[]' placeholder=' Aadhaar Number 'id='adhar"+$rowno+"'></td><td><input class='btnew' type='button' value='-' onclick=delete_row('row" + $rowno + "')></td></tr>");              }

            function delete_row(rowno) {
                $('#' + rowno).remove();
            }
            function delete_(rowno){
                $('#' + rowno).empty();
            }
        </script>
    </div>

    </body>
