<?php
if(!isset($_SESSION)){
    session_start();
}
include('profileHeader.php');
include_once('config.php');

if(isset($_SESSION['is_login'])){
    $std_email =$_SESSION['stdLoginemail'];
} else{
    echo "<script>location.href='index.php'</script>";
}

if(isset($_REQUEST['changePass'])) {
    if(($_REQUEST['newPass'] == "")) {
        $msg = '<div class="text-danger col-sm-6 ml-5 mt-2" role="alert">Password Field is Empty</div>';
    } else {
        $query="SELECT * FROM student WHERE std_email='$std_email'";
        $res=$mysqli->query($query);
        if($res->num_rows == 1){
            $newPassword = $_REQUEST['newPass'];
            $query2 = "UPDATE student SET std_pass='$newPassword' WHERE std_email='$std_email'";
            if($mysqli->query($query2) == TRUE){
                $msg='<div class="text-success" col-sm-6 ml-5 mt-2>Password Changed Successfully!</div>';
            }else{
                $msg='<div class="text-danger font-weight-bold" col-sm-6 ml-5 mt-2>Password Change Failed!</div>';
            }
        }
    }
}
?>

<body class="profile-background">
    <div class="container-fluid col-sm-6 mt-5" style="padding-top:90px;">
    <div class="row">
        <div class="col-sm-6">
        <form class="mx-5" method="POST" style="width:100%;">
            <div class="form-group">
                <label class="font-weight-bold" for="changePassEmail">Email:</label>
                <input type="text" class="form-control" id="changePassEmail" name="changePassEmail" value="<?php echo $std_email ?>" readonly>
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="newPass">Enter New Password:</label>
                <input type="password" class="form-control" id="newPass" name="newPass" placeholder="New Password" >
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="changePass">Update Password</button>
                <?php if(isset($msg)){echo $msg;}?>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

<?php
include("footer.php");
?>
