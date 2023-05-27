<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
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
	<title>LearningPal</title>
</head>
<body>
<!---Start Navigation--->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
  <a class="navbar-brand" href="index.php">LearningPal</a>
  <span class="navbar-text">Learn at your Ease</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav custom-navbar pl-3">
      <li class="nav-item custom-nav-item mr-2"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item custom-nav-item mr-2"><a href="course_categories.php" class="nav-link">Courses</a></li>
      <?php 
      if(!isset($_SESSION)){
        session_start();
      }
      if(isset($_SESSION['is_login'])){
          echo '<li class="nav-item custom-nav-item mr-2"><a href="MyProfile.php" class="nav-link">My Profile</a></li>
          <li class="nav-item custom-nav-item mr-2"><a href="logout.php" class="nav-link">Logout</a></li>';
      } else{
          echo '<li class="nav-item custom-nav-item mr-2"><a href="user_login.php" class="nav-link">Login</a></li>
          <li class="nav-item custom-nav-item"><a href="user_reg.php" class="nav-link">SignUp</a></li>';
      }
      ?>
      <li class="nav-item custom-nav-item mr-2"><a href="feedback.php" class="nav-link">Feedback</a></li>
      <li class="nav-item custom-nav-item mr-2"><a href="contactUs.php" class="nav-link">Contact</a></li>
      <li class="nav-item custom-nav-item mr-2"><a href="aboutUs.php" class="nav-link">About Us</a></li>
      <li class="nav-item custom-nav-item mr-2"><a href="admin_login.php" class="nav-link" onclick="AdminLoginfunc()">Admin Login</a></li>
    </ul>
  </div>
</nav>
<!---End of Navigation--->

<?php
include("./config.php");
?>

<div class="container-fluid bg-dark">
	<div class="row">
		<img src="./image/coursebanner.jpg" alt="courses" style="height:500px;
		width:100%; object-fit: cover; box-shadow: 10px;">
	</div>
</div>