<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
include('add_admin.php');
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
if(!isset($_SESSION['name']))
  header("Location: adminlogin.php?msg=Sign In Again");
?>

    <body>
        <h2>Add RationShops</h2>
        <!-- container containing form code-->

        <div class="div1">
            <div class="container">
                <section class="content bgcolor-3">
                    <!-- head of family box starting-->
                    <form action="add_shops.php" method="post" enctype="multipart/form-data">
                        <span class="input input--manami">
      <input class="input__field input__field--manami" type="text" id="input-32" name="lname" onblur="validate('erlname',this.value)"/>
      <label class="input__label input__label--manami" for="input-32">
        <span class="input__label-content input__label-content--manami" id="erlname">Licensee Name</span>
                        </label>
                        </span>
                    <span class="input input--manami">
      <input class="input__field input__field--manami" type="text" id="input-32" name="pass" onblur="validate('erpass',this.value)"/>
      <label class="input__label input__label--manami" for="input-32">
        <span class="input__label-content input__label-content--manami" id="erpass">Password</span>
                        </label>
                        </span>
                        <span class="input input--manami">
      <input class="input__field input__field--manami" type="text" id="input-32" name="address" onblur="validate('eraddress',this.value)" />
      <label class="input__label input__label--manami" for="input-32">
        <span class="input__label-content input__label-content--manami" id="eraddress">Address</span>
                        </label>
                        </span>
                        <span class="input input--manami">
      <input class="input__field input__field--manami" type="text" id="input-34" name="taluk"  placeholder="<?php echo $ro[1]; ?>" value="<?php echo $ro[1]; ?>" readonly="readonly" />
      <label class="input__label input__label--manami" for="input-34">
        <span class="input__label-content input__label-content--manami">Taluk</span>
                        </label>
                        </span>
                        <div>
                            <input class="btn" type="submit" value="submit" />
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

        <body>
