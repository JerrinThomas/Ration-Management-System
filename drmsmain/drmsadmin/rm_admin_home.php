<?php
include('includes/checksuper.php');
include('includes/header.php');
include('includes/nav.php');
require_once('config.php');
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
if(!isset($_SESSION['name']))
  header("Location: adminlogin.php?msg=Sign In Again");
if(isset($_POST["Submit"])) {
    $uname = $_POST["uname"];
    $sql="SELECT username from admindetails where username='$uname'";
    $re=mysqli_query($dbC,$sql);
    $count=mysqli_num_rows($re);
    if($count==0){
    $msg="Invalid Username ! ";$msg1="";
  }
    else {
      $sql1="DELETE FROM admindetails WHERE username='$uname'";
      $res=mysqli_query($dbC,$sql1);
      if($res==true){
        $msg1="Admin ".$uname." Removed.";
          $logname=$_SESSION['name'];
          $log="insert into adminlog values('$logname','Deleted Admin : $uname ',curdate(),curtime())";
          $logres=mysqli_query($dbC,$log);
      }
      else {
       $msg1="Unsuccessfull";
      }
      $msg="";
    }
  }
  else {
    $uname="";
    $msg="";
    $msg1="";
  }

?>

</body>
<h2>Remove Admin</h2>
<div class="bfore">
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
        <span><?php echo "<center><h1 style=\"color: white;\">".$msg1."</h1></center>" ?></span>

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
