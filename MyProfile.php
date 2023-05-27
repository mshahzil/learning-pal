<?php
if(!isset($_SESSION)){
    session_start();
}
include('profileHeader.php');
include_once('config.php');

if(isset($_SESSION['is_login'])){
    $std_email =$_SESSION['stdLoginemail'];
}else{
    echo "<script>location.href='index.php'</script>";
}

$sql="SELECT * FROM student WHERE std_email = '$std_email'";
$result=$mysqli->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $stdId= $row["std_id"];
    $stdName=$row["std_name"];
    $stdProf=$row["std_prof"];
    $stdImg = $row["std_img"];

}
if(isset($_REQUEST['updatestd'])){
    if(($_REQUEST['stdName'] == "")){
        $msg="<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>Required field is Empty</div>";

    }
    else{
        $stdName =$_REQUEST['stdName'];
        $stdProf= $_REQUEST['stdProf'];
        $std_image=$_FILES['stdImg']['name'];
        $std_img_tmp=$_FILES['stdImg']['tmp_name'];
        $imgFolder='images/'.$std_image;
        move_uploaded_file($std_img_tmp, $imgFolder);
        $sql = "UPDATE student SET std_name = '$stdName', std_prof = '$stdProf', std_img = '$imgFolder' WHERE std_email = '$std_email'";
        if($mysqli->query($sql) == TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Profile Updated!</div>';
        } 
        else{
            $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Updation failed!</div>';
        }

    }
}
?>
<html>
    <body class="profile-background myProfile" style="padding-top:60px;">
<div class="container-fluid  col-sm-6 mt-5 pt-100" >
    <form class="mt-50" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stdId">ID</label>
            <input type="text" class="form-control" id="stdId" name="stdId" value="<?php if(isset($stdId)){echo $stdId;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stdEmail">Email</label>
            <input type="email" class="form-control" id="std_email" value="<?php echo $std_email;?>" readonly>
        </div>
        <div class="form-group">
            <label for="stdName">Name</label>
            <input type="text" class="form-control" id="stdName" name="stdName" value="<?php if(isset($stdName)){echo $stdName;}?>" >
        </div>
        <div class="form-group">
            <label for="stdProf">Occupation</label>
            <input type="text" class="form-control" id="stdProf" name="stdProf" value="<?php if(isset($stdProf)){echo $stdProf;}?>">
        </div>
        <div class="form-group">
            <label for="stdImg">Upload Image</label>
            <input type="file" class="form-control-file" id="stdImg" name="stdImg" >
        </div>
        <button type="submit" class="btn btn-primary" name="updatestd">Submit</button>
        <?php if(isset($msg)){echo $msg;}?>

    </form>
</div>
</body>
</html>
<?php
include('footer.php');
?>