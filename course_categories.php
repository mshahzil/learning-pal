<?php
include('./header-cat.php');
include('./config.php');
?>

<body style="background-color: #f3e0dc;">
	<!-- Start of Course Categories -->
	<div class="container mt-5 container-cat">
		<h1 class="text-center stu-feed">Course Categories</h1>

		<!-- Start of Deck 1 -->
		<div class="card-deck mt-5">
			<?php
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				exit();
			}
			$sql = "SELECT * FROM course_category LIMIT 3";
			$result = mysqli_query($mysqli, $sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$category_id = $row['category_id'];
					$category_name = $row['category_name'];
					$num_courses = $row['num_courses'];
					$category_img = $row['category_img'];
					echo '<a href="./courses.php?category_id=' . $category_id . '&category_name=' . $category_name . '" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
						<div class="card">
							<img src="' . $category_img . '" class="card-img-top border-bottom" alt="Guitar" style="width: 344px; height: 174px;">
							<div class="card-body">
								<h5 class="card-title" id="cat" style="">' . $category_name . '</h5>
							</div>
							<div class="card-footer d-flex align-items-center justify-content-between">
								<p class="card-text d-inline">' . $num_courses . '+ Courses</p>
								<a href="./courses.php?category_id=' . $category_id . '&category_name=' . $category_name . '" class="btn view view-2">View Courses</a>
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
			$sql = "SELECT * FROM course_category LIMIT 3,3";
			$result = mysqli_query($mysqli, $sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$category_id = $row['category_id'];
					$category_name = $row['category_name'];
					$num_courses = $row['num_courses'];
					$category_img = $row['category_img'];
					echo '<a href="./courses.php?category_id=' . $category_id . '&category_name=' . $category_name . '" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
						<div class="card">
							<img src="' . $category_img . '" class="card-img-top border-bottom" alt="Guitar" style="width: 344px; height: 174px;">
							<div class="card-body">
								<h5 class="card-title" id="cat" style="">' . $category_name . '</h5>
							</div>
							<div class="card-footer d-flex align-items-center justify-content-between">
								<p class="card-text d-inline">' . $num_courses . '+ Courses</p>
								<a href="./courses.php?category_id=' . $category_id . '&category_name=' . $category_name . '" class="btn view view-2">View Courses</a>
							</div>
						</div>
					</a>';
				}
			}
			?>
		</div>
		<!-- End of Deck 2 -->

		<!-- Start of Deck 3 -->
		<div class="card-deck mt-4 mb-5 pb-3">
			<?php
			$sql = "SELECT * FROM course_category LIMIT 6,3";
			$result = mysqli_query($mysqli, $sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$category_id = $row['category_id'];
					$category_name = $row['category_name'];
					$num_courses = $row['num_courses'];
					$category_img = $row['category_img'];
					echo '<a href="./courses.php?category_id=' . $category_id . '&category_name=' . $category_name . '" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
						<div class="card">
							<img src="' . $category_img . '" class="card-img-top border-bottom" alt="Guitar" style="width: 344px; height: 174px;">
							<div class="card-body">
								<h5 class="card-title" id="cat" style="">' . $category_name . '</h5>
							</div>
							<div class="card-footer d-flex align-items-center justify-content-between">
								<p class="card-text d-inline">' . $num_courses . '+ Courses</p>
								<a href="./courses.php?category_id=' . $category_id . '&category_name=' . $category_name . '" class="btn view view-2">View Courses</a>
							</div>
						</div>
					</a>';
				}
			}
			?>
		</div>
		<!-- End of Deck 3 -->

	</div>
	<!-- End of Course Categories -->

	<!-- Footer -->
	<?php
	include("footer.php");
	?>
	<!-- End Footer -->

</body>
</html>