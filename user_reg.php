<?php
    include("header.php");
?>

<div class="container-fluid reg-background">
    <h1 class="text-center stu-reg ">Student Registration Form</h1>
    <form id="std-form" class="std-form" action="addStd.php" method="post" name="form1">
        <div class="form-group">
            <i class="fas fa-user"></i><label for="stdname" class="text-left pl-2 font-weight-bold">Name</label><small id="errorMsg1"></small><input type="text" class="form-control" placeholder="Name" name="stdname" id="stdname">
            
        </div>
        <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stdemail" class="text-left pl-2 font-weight-bold">Email</label><small id="errorMsg2"></small><input type="text" class="form-control" placeholder="Email" name="stdemail" id="stdemail">
            <small class="form-text">Your email is secure with us.</small>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stdpass" class="text-left pl-2 font-weight-bold">Password</label><small id="errorMsg3"></small><input type="password" class="form-control" placeholder="Password" name="stdpass" id="stdpass">
        </div>
        <div class="signup-btn-row">
            <div class="signup-text">Already have an account? Log in <a href="user_login.php" class="signup-link">here</a></div>
            <div class="text-right">
                <span id="SuccessMsg"></span>
                <button id="Signup" type="button" class="btn signup-btn" onclick="AddStd()">Sign Up</button>
            </div>
        </div>
    </form>
</div>

<?php
    include("footer.php");
?>