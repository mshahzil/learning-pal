<?php

include('./header-cat.php');
include('./config.php');

if (isset($_GET['category_id']) && isset($_GET['category_name'])) {
	$category_id = $_GET['category_id'];
	$category_name = $_GET['category_name'];
	$_SESSION['category_id'] = $category_id;
	$_SESSION['category_name'] = $category_name;
}
?>

<body style="background-color: #f3e0dc;">
<!-- Start of Specific Category Courses -->
<div class="container mt-5 ;" style="padding-top:0px; padding-bottom: 40px;">
	<h1 class="text-center"><?php echo $category_name; ?></h1>

	<!-- Start of Deck 1 -->
	<div class="card-deck mt-4">

	<?php
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
	}

	$sql = "SELECT * FROM course WHERE category_id = '$category_id' LIMIT 3";
	$result = mysqli_query($mysqli, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$course_id = $row['course_id'];
			$course_name = $row['course_name'];
			$course_desc = $row['course_desc'];
			$course_status = $row['course_status'];
			$course_original_price = $row['course_original_price'];
			$course_price = $row['course_price'];
			$course_img = $row['course_img'];
			$course_img = str_replace("..", ".", $course_img);
			echo '<a href="course_details.php?course_id='. $course_id .'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
					<div class="card">
						<img src="' .$course_img. '" class="card-img-top" alt="image" style="width: 100%; height: 150px;">
						<div class="card-body">
							<h5 class="card-title">' .$course_name. '</h5>
							<p class="card-text">' .$course_desc. '</p>
						</div>
						<div class="card-footer">
							<p class="card-text d-inline">Price: <small><del>Rs. ' .$course_original_price. ' </del></small> <span class="font-weight-bolder">Rs. ' .$course_price. '</span></p>
							<a href="course_details.php?course_id='. $course_id .'" class="btn view  font-weight-bolder float-right">View Course</a>
						</div>
					</div>
					</a>';
		}
	}
	?>
	</div>
	<!-- End of Deck 1 -->



	<!-- Start of Deck 2 -->	
	<div class="card-deck mt-4">

	<?php
	$sql = "SELECT * FROM course WHERE category_id = '$category_id' LIMIT 3, 3";
	$result = mysqli_query($mysqli, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$course_id = $row['course_id'];
			$course_name = $row['course_name'];
			$course_desc = $row['course_desc'];
			$course_status = $row['course_status'];
			$course_original_price = $row['course_original_price'];
			$course_price = $row['course_price'];
			$course_img = $row['course_img'];
			$course_img = str_replace("..", ".", $course_img);
			echo '<a href="course_details.php?course_id='. $course_id .'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
					<div class="card">
						<img src="' .$course_img. '" class="card-img-top" alt="image" style="width: 100%; height: 150px;">
						<div class="card-body">
							<h5 class="card-title">' .$course_name. '</h5>
							<p class="card-text">' .$course_desc. '</p>
						</div>
						<div class="card-footer">
							<p class="card-text d-inline">Price: <small><del>Rs. ' .$course_original_price. ' </del></small> <span class="font-weight-bolder">Rs. ' .$course_price. '</span></p>
							<a href="course_details.php?course_id='. $course_id .'" class="btn view font-weight-bolder float-right">View Course</a>
						</div>
					</div>
					</a>';
		}
	}
	?>
	</div>
	<!-- End of Deck 2 -->


	<!-- Start of Deck 3 -->	
	<div class="card-deck mt-4">

	<?php
	$sql = "SELECT * FROM course WHERE category_id = '$category_id' LIMIT 6, 3";
	$result = mysqli_query($mysqli, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$course_id = $row['course_id'];
			$course_name = $row['course_name'];
			$course_desc = $row['course_desc'];
			$course_status = $row['course_status'];
			$course_original_price = $row['course_original_price'];
			$course_price = $row['course_price'];
			$course_img = $row['course_img'];
			echo '<a href="course_details.php?course_id='. $course_id .'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
					<div class="card">
						<img src="' .$course_img. '" class="card-img-top" alt="image" style="width: 100%; height: 150px;">
						<div class="card-body">
							<h5 class="card-title">' .$course_name. '</h5>
							<p class="card-text">' .$course_desc. '</p>
						</div>
						<div class="card-footer">
							<p class="card-text d-inline">Price: <small><del>Rs. ' .$course_original_price. ' </del></small> <span class="font-weight-bolder">Rs. ' .$course_price. '</span></p>
							<a href="course_details.php?course_id='. $course_id .'" class="btn view font-weight-bolder float-right">View Course</a>
						</div>
					</div>
					</a>';
		}
	}
	?>
	</div>
	<!-- End of Deck 3 -->


<!-- 	<div class="text-center m-2">
		<a href="#" class="btn btn-danger btn-sm">View All Courses</a>
	</div> -->
</div>
<!-- End of Specific Category Courses -->


<!-- Footer -->

<!-- End Footer -->

<?php
include("footer.php");
?>
