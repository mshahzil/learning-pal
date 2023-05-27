<?php
include("header.php");
?>

<div class="container-fluid reg-background">
    <h1 class="text-center stuLogin" >Student Login Form</h1>
    <form id="stdLoginForm" class="stdLoginForm" action="loginCheck.php" method="post" name="form2">
        <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stdLoginemail" class="text-left pl-2 font-weight-bold">Email</label><small id="stdErr1"></small><input type="text" class="form-control" placeholder="Email" name="stdLoginemail" id="stdLoginemail">
            <small class="form-text">Your email is secure with us.</small>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stdLoginpass" class="text-left pl-2 font-weight-bold">Password</label><small id="stdErr2"></small><input type="password" class="form-control" placeholder="Password" name="stdLoginpass" id="stdLoginpass">
        </div>
        <div class="signup-btn-row">
            <div class="signup-text">Don't have an account yet? Register <a href="user_reg.php" class="signup-link">here</a></div>
            <div class="text-right">
                <span id="LoginMsg"></span>
                <button id="Login" type="button" class="btn signup-btn" onclick="StuLoginfunc()">Login</button>
            </div>
        </div>
        <!-- <div class="text-center">
            <small id="LoginMsg"></small> 
            <button id="Login" type="button" class="btn signup-btn" onclick="StuLoginfunc()">Login</button>
        </div> -->
    </form>
</div>

<?php
include("footer.php");
?>