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
<script type="text/javascript">
    function val(){
        var error = 0,error1 = 0,error2 = 0,error3 = 0,error4 = 0,error5 = 0,error6 = 0,error7 = 0,error8 = 0,error9 = 0,error10 =0,error11 =1,error12 =1,error13 =1;
        var errhofamily = document.getElementById('errhofamily');
        if(frm.hofamily.value === "") 
        {
            errhofamily.setAttribute("style","visibility:visible");
            error = 0;
        }
        else if(!(isNaN(frm.hofamily.value)))
        {
            errhofamily.innerHTML = "Please enter a valid name";
            errhofamily.setAttribute("style","visibility:visible");
            error = 0;
        }
        else
        {
            errhofamily.setAttribute("style","visibility:hidden");
            error = 1;
        }
       
        var erradhar_no = document.getElementById('erradhar_no');
        if(frm.adhar_no.value== "")
        {
            erradhar_no.setAttribute("style","visibility:visible");
            error1 = 0;
        }
        else if((frm.adhar_no.value.length != 12) || (isNaN(frm.adhar_no.value)))
        {
            erradhar_no.innerHTML = "Pleas Enter a valid Adhar Number";
            erradhar_no.setAttribute("style","visibility:visible");
            error1 = 0;
        }
        else
        {
            erradhar_no.setAttribute("style","visibility:hidden");
            error1 = 1;
        }
    
       
        var erradd1 = document.getElementById('erradd1');
        if(frm.add1.value==="")
        {
            erradd1.setAttribute("style","visibility:visible");
            error2 = 0;
        }
        else
        {
            erradd1.setAttribute("style","visibility:hidden");
            error2 = 1;
        }
        
       
        var errpan_mun_cor = document.getElementById('errpan_mun_cor');
        if(frm.pan_mun_cor.value==="")
        {
            errpan_mun_cor.setAttribute("style","visibility:visible");
            error3 = 0;
        }
        else
        {
            errpan_mun_cor.setAttribute("style","visibility:hidden");
            error3 = 1;
        }
        
       
        var errpincode = document.getElementById('errpincode');
        if(frm.pincode.value == "")
        {
            errpincode.style.visibility = "visible";
            error4 = 0;
        }
        else if((isNaN(frm.pincode.value)))
        {
            errpincode.innerHTML = "Please Enter a valid Pincode";
            errpincode.style.visibility = "visible";
            error4 = 0;
        }
        else
        {
            errpincode.style.visibility = "hidden";
            error4 = 1;
        }
        
       
        var errwardno = document.getElementById('errwardno');
        if(frm.wardno.value == "")
        {
            errwardno.style.visibility = "visible";
            error5 = 0;
        }
        else if((isNaN(frm.wardno.value)))
        {
            errwardno.innerHTML = "please enter a valid Ward number";
            errwardno.style.visibility = "visible";
            error5 = 0;
        }
        else
        {
            errwardno.style.visibility = "hidden";
            error5 = 1;
        }
        
        
        var errhouse_no = document.getElementById('errhouse_no');
        if(frm.house_no.value == "")
        {
            errhouse_no.style.visibility = "visible";
            error6 = 0;
        }
        else
        {
            errhouse_no.style.visibility = "hidden";
            error6 = 1;
        }

        var errmonthly_in = document.getElementById('errmonthly_in');
        if(frm.monthly_in.value == "")
        {
            errmonthly_in.style.visibility = "visible";
            error7 = 0;
        }
        else if((isNaN(frm.monthly_in.value)))
        {
            errmonthly_in.innerHTML = "Please enter valid Income";
            errmonthly_in.style.visibility = "visible";
            error7 = 0;
        }
        else
        {
            errmonthly_in.style.visibility = "hidden";
            error7 = 1;
        }
        
        var errmob_no = document.getElementById('errmob_no');
        if(frm.mob_no.value == "")
        {
            errmob_no.style.visibility = "visible";
            error8 = 0;
        }
        else if( (frm.mob_no.value.length != 10) || (isNaN(frm.mob_no.value)))
        {
            errmob_no.innerHTML = "Please enter Valid Mobile Number";
            errmob_no.style.visibility = "visible";
            error8 = 0;
        }
        else
        {
            errmob_no.style.visibility = "hidden";
            error8 = 1;
        }

         var errcat = document.getElementById('errcat');
        if(frm.cat.value == "")
        {
            errcat.style.visibility = "visible";
            error9 = 0;
        }
        else if((isNaN(frm.cat.value)))
        {
            errcat.innerHTML = "Please enter a Valid Category";
            errcat.style.visibility = "visible";
            error9 = 0;
        }
        else
        {
            errcat.style.visibility = "hidden";
            error9 = 1;
        }

        var errno_of_mem = document.getElementById('errno_of_mem');
        if(frm.no_of_mem.value == "")
        {
            errno_of_mem.style.visibility = "visible";
            error10 = 0;
        }
        else if((isNaN(frm.no_of_mem.value)))
        {
            errno_of_mem.innerHTML = "Please enter a valid Number";
            errno_of_mem.style.visibility = "visible";
            error10 = 0;
        }
        else
        {
            errno_of_mem.style.visibility = "hidden";
            error10 = 1;
        }

        var errrow = document.getElementsByClassName('memfam');

        if(errrow[0].value=="")
        {
            errrowname.style.visibility = "visible";
            error11 = 0;
        }
        else if((!(isNaN(errrow[0].value))))
        {
            errrowname.innerHTML = "Please enter a valid name";
            errrowname.style.visibility = "visible";
            error11 = 0;
        }
        else
        {
            errrowname.style.visibility = "hidden";
            error11 = 1;
        }

       
        if((errrow[1].value =="")  || (isNaN(errrow[1].value)))
        {
            errrowage.style.visibility = "visible";
            error12 = 0;
        }
        else
        {
            errrowage.style.visibility = "hidden";
            error12 = 1;
        }

        
        if((errrow[2].value =="") || (errrow[2].value.length != 12) || (isNaN(errrow[2].value)))
        {
            errrowadhar.style.visibility = "visible";
            error13 = 0;
        }
        else
        {
            errrowadhar.style.visibility = "hidden";
            error13 = 1;
        }

        if(((error && error1) && (error2 && error3) && (error4 && error5) && (error6 && error7) && (error8 && error9) && (error10 && error11) && (error12 && error13)) ==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
</script>

    <body>
    <h2>Add User</h2>
    <!-- container containing form code-->

    <div class="div1">
        <div class="container">
            <!-- form start-->
            <section class="content bgcolor-3">
                <!-- head of family box starting-->
                <form action="adduser.php" method="post" enctype="multipart/form-data" name="frm" onsubmit="return val();">
                    <br/>
                    <span id="errhofamily" class="error">please enter a name</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-32" name="hofamily" />
        <label class="input__label input__label--manami" for="input-32">
          <span class="input__label-content input__label-content--manami">Name of the Head of the Family</span>
                    </label>
                    </span>
                    <br/>
                    <span id="erradhar_no" class="error">please enter Adhar Number</span>
                    <br/>
                    <!-- head of family box end-->
                    <span class="input input--manami">
				<input class="input__field input__field--manami" type="text" id="input-34" name="adhar_no"/>
				<label class="input__label input__label--manami" for="input-34">
					<span class="input__label-content input__label-content--manami">Adhar Number</span>
                    </label>
                    </span>
                    <br/>
                    <span id="erradd1" class="error">please enter Address</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-33" name="add1"/>
        <label class="input__label input__label--manami" for="input-33">
          <span class="input__label-content input__label-content--manami">Address 1</span>
                    </label>
                    </span>
                    <br/>
                    <span id="erradd2" class="error">please enter a name</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="add2"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Address 2</span>
                    </label>
                    </span>
                    <br/>
                    <span id="erradd3" class="error">please enter a name</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="add3"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Address 3</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errpan_mun_cor" class="error">please enter a value</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="pan_mun_cor"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Panchayath/Muncipality/Corporation</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errpincode" class="error">please enter pincode</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="pincode"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">PINCODE</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errwardno" class="error">please enter wardno</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="wardno"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Ward Number</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errhouse_no" class="error">please enter House Number</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="house_no"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">House Number</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errmonthly_in" class="error">please enter Monthly Income</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="monthly_in"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Monthly Income</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errmob_no" class="error">please enter Mobile Number</span>
                    <br/>
                    <span class="input input--manami">
				<input class="input__field input__field--manami" type="text" id="input-34" name="mob_no"/>
				<label class="input__label input__label--manami" for="input-34">
					<span class="input__label-content input__label-content--manami">Mobile Number</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errtaluk" class="error">please enter taluk</span>
                    <br/>
                    <span class="input input--manami input--filled">
				<input class="input__field input__field--manami" type="text" id="input-34" name="taluk"  placeholder="<?php echo $ro[1]; ?>" value="<?php echo $ro[1]; ?>" readonly="readonly"/>
				<label class="input__label input__label--manami" for="input-34">
					<span class="input__label-content input__label-content--manami">Taluk</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errcat" class="error">please enter Category</span>
                    <br/>
                    <span class="input input--manami input--filled">
        <input class="input__field input__field--manami" type="text" id="input-34" name="cat" />
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Category</span>
                    </label>
                    </span>
                    <br/>
                    <span id="errno_of_mem" class="error">please enter Number of Members in Family</span>
                    <br/>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-34" name="no_of_mem"/>
        <label class="input__label input__label--manami" for="input-34">
          <span class="input__label-content input__label-content--manami">Number of Members in Family</span>
                    </label>
                    </span>
                
        <h4>Details of other Family Member(s)</h4>
        </label>
      </span>
                    <table id="employee_table" align=center>
                        <tr id="row1">
                            <td>
                                <input class="memfam" type="text" name="name[]" placeholder=" Name ">
                            </td>
                            <td>
                                <input class="memfam" type="number" name="age[]" placeholder=" Age ">
                            </td>
                            <td>
                                <input class="memfam" type="number" name="adhar_no2[]" placeholder=" Aadhar Number ">
                            </td>
                            <td><input class='btnew' type='button' value='-' onclick=delete_('row1')></td>

                        </tr>

                    </table>
                    <input class="btnew" type="button" onclick="add_row();" value="+">
                    <br/>
                    <span id="errrowname" class="error">please enter name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <span id="errrowage" class="error"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;please enter age  </span>
                    <span id="errrowadhar" class="error">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;please enter adhar No</span>
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
