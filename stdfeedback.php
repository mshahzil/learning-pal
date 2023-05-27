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
    //$stdImg = $row["std_img"];
}

if(isset($_REQUEST['submitFeedback'])){
    if(($_REQUEST['feedback'] == "")){
        $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Please Enter Feedback</div>';

    }else{
        $feed = $_REQUEST['feedback'];
        $sql="INSERT INTO feedback (feedback, std_id) VALUES ('$feed','$stdId')";
        if($mysqli->query($sql) == TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Feedback submitted</div>';
        }
    }
}
?>
<body class="profile-background">
<div class="container-fluid col-sm-6 mt-5 " style="padding-top:100px;">
<div class="row" style="padding-left:0; margin-left:0px;">
      <div class="col-sm-6">
    <form  method="POST" enctype="multipart/form-data"style="width:100%">
        <div class="form-group">
            <label class="font-weight-bold" for="stdId">Student ID</label>
            <input type="text" class="form-control" id="stdId" name="stdId" value="<?php if(isset($stdId)){echo $stdId;}?>" readonly>
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="feedback">Add your Feedback Here:</label>
            <textarea class="form-control" id="feedback" name="feedback" row=4></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary" name="submitFeedback">Submit</button>
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