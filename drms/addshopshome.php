<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
include('add_admin.php');
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
      <input class="input__field input__field--manami" type="text" id="input-32" name="lname" />
      <label class="input__label input__label--manami" for="input-32">
        <span class="input__label-content input__label-content--manami">Licensee Name</span>
                  </label>
                  </span>
                  <span class="input input--manami">
      <input class="input__field input__field--manami" type="text" id="input-32" name="address" />
      <label class="input__label input__label--manami" for="input-32">
        <span class="input__label-content input__label-content--manami">Address</span>
                  </label>
                  </span>
                  <span class="input input--manami">
      <input class="input__field input__field--manami" type="text" id="input-34" name="taluk"  placeholder="<?php echo $ro[1]; ?>" value="<?php echo $ro[1]; ?>" readonly="readonly"/>
      <label class="input__label input__label--manami" for="input-34">
        <span class="input__label-content input__label-content--manami">Taluk</span>
                  </label>
                  </span>
                  <div>
                      <input class="btn" type="submit" value="submit" />
                  </div>
       </section>
      </div>
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
    <body>