<!--navigaation bar-->

<ul>
    <li><a href="#">Home</a></li>
    <li class="dropdown"><a href="#" class="dropdown-btn">Ration Shops</a>
        <div class="dropdown-menu">
            <a href="#">Add</a>
            <a href="#">Remove</a>
            <a href="#">Modify</a>
        </div>
    </li>
    <li class="dropdown"><a href="#" class="dropdown-btn">Users</a>
        <div class="dropdown-menu">
            <a href="adduserhome.php">Add</a>
            <a href="rm_user_home.php">Remove</a>
            <a href="edit_user_home.php">Modify</a>
        </div>
    </li>
    <li><a href="#">Stock</a></li>
    <?php
    // displays only if the admin is Super ! ..
    if($ro[0]==1)
        echo "<li class=\"dropdown\"><a href=\"^\" class=\"dropdown-btn\">Modify Admins</a><div class=\"dropdown-menu\"><a href=\"%\">Add</a><a href=\"%\">Remove</a><a href=\"%\">Modify</a></div></li>";
    ?>
        <a class="anbutton" href="adminlogout.php">Logout</a>
</ul>
<!-- ended navigation bar-->
<div class="logg">
    <p>logged In As : <span style="color:#FF0000;"><?php echo $_SESSION['name'] ?></span></p>
</div>
