<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
if(isset($_GET['msg']))
 {
   $msg=$_GET['msg'];
 }
 else {
   $msg="";
 }
?>

</body>
<h2>Modify Admin</h2>

<div class="bfore">
     <form action="edit_admin.php" method="post">
                    <span><?php echo "<h1>".$msg."</h1>" ?></span>
                    <span class="input input--manami">
        <input class="input__field input__field--manami" type="text" id="input-32" name="uname" required/>
        <label class="input__label input__label--manami" for="input-32">
          <span class="input__label-content input__label-content--manami">Username</span>
                    </label>
                    </span>
       <div>
            <input class="btn" type="submit" value="submit" name="Submit" />
        </div>

    </form>
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
