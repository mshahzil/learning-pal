<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--Including css files-->
    <!--Bootstrap CDN-->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--Font Awesome Link-->
    <link rel="stylesheet" href="css/all.min.css"></link>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet"  href="css/style.css?v=<?php echo time(); ?>">
	<title>Admin Dashboard</title>
</head>
<body>
	<nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470">
		<a href="adminDashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">
			LearningPal <small class="text-white"> Admin Area</small>
		</a>
	</nav>
	<div class="container-fluid mb-5" style="margin-top: 40px;">
		<div class="row">
			<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none" >
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item" style="color: #f3e0dc">
							<a href="adminDashboard.php" class="nav-link">
								<i class="fas fa-tachometer-alt"></i>
								Dashboard
							</a>
						</li>
						<li class="nav-item" style="color: #f3e0dc">
							<a href="adminCourses.php" class="nav-link">
							<i class="fas fa-book"></i>
								Courses
							</a>
						</li>
						<li class="nav-item" style="color: #f3e0dc">
							<a href="lessons.php" class="nav-link">
								<i class="fas fa-tachometer-alt"></i>
								Lessons
							</a>
						</li>
						<li class="nav-item" style="color: #f3e0dc">
							<a href="students.php" class="nav-link">
							<i class="fas fa-user"></i>
								Students
							</a>
						</li>
<!-- 						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fas fa-tachometer-alt"></i>
								Sell Report
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fas fa-tachometer-alt"></i>
								Payment Status
							</a>
						</li> -->
						<li class="nav-item" style="color: #f3e0dc">
							<a href="adminFeedback.php" class="nav-link">
							<i class="fas fa-comments"></i>
								Feedback
							</a>
						</li>
						<li class="nav-item" style="color: #f3e0dc">
							<a href="adminChangePass.php" class="nav-link">
							<i class="fas fa-key"></i>
								Change Password
							</a>
						</li>
						<li class="nav-item" style="color: #f3e0dc">
							<a href="logout.php" class="nav-link">
							<i class="fas fa-sign-out-alt"></i>
								Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>