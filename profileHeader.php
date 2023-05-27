<?php
include_once('config.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $stdLoginemail = $_SESSION['stdLoginemail'];
}

if(isset($stdLoginemail)){
    $sql="SELECT std_img FROM student WHERE std_email ='$stdLoginemail'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result);
    $std_img = $row['std_img'];
    // echo $std_img;
    echo '<br/>';
}
echo'<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Including css files-->
    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--Font Awesome Link-->
    <link rel="stylesheet" href="css/all.min.css"></link>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/style.css">
	<title>Profile</title>
    </head>
    <body>
        <!--Top bar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
    <a class="navbar-brand" href="MyProfile.php">Student Profile</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav custom-navbar pl-3">
        <li class="nav-item custom-nav-item"><img src="'.$std_img.'" alt="studentImage" class="img-thumbnail " style="border-radius:50%; height:100px; width:100px; border:2px; padding: 0px; margin-right:10px;"></li>
        <li class="nav-item custom-nav-item">
            <a class="nav-link"  href="index.php">
                <i class="fas fa-user"></i>Home<span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item custom-nav-item"><a class="nav-link" href="myCourses.php"><i class="fas fa-book"></i>
                            My Courses</a></li>
        
        <li class="nav-item custom-nav-item"><a class="nav-link" href="stdfeedback.php"><i class="fas fa-comments"></i>
                            Feedback</a></li>
        <li class="nav-item custom-nav-item"><a class="nav-link" href="changeStdPass.php"><i class="fas fa-key"></i>
                            Change Password</a></li>

        
        <li class="nav-item custom-nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>
                            Logout</a></li>
        
        
        </ul>
    </div>
    </nav>
    </body>
</html>'
?>





        
