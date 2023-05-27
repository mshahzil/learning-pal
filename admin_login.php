<?php
    include("header.php");
?>

<div class="container-fluid reg-background">
    <h1 class="text-center stuLogin">Admin Login Form</h1>
    <form id="stdLoginForm" class="stdLoginForm" action="login.php" method="post" name="form3">
        <div class="form-group">
            <i class="fas fa-envelope"></i><label for="adminLogemail" class="text-left pl-2 font-weight-bold">Email</label><small id="admErr1"></small><input type="text" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="adminLogpass" class="text-left pl-2 font-weight-bold">Password</label><small id="admErr2"></small><input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
        </div>
        <div class="text-right">
            <small id="AdminLoginMsg"></small> 
            <button id="Login" type="button" class="btn signup-btn" onclick="AdminLoginfunc()">Login</button>
        </div>
    </form>
</div>

<?php
    include("footer.php");
?>