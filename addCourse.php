<?php
if (!isset($_SESSION)) {
	session_start();
}

include('admin_header.php');
include('config.php');

if (isset($_SESSION['is_admin_login'])) {
	$adminEmail = $_SESSION['adminLogemail'];
} else {
	echo "<script> location.href='./admin_login.php'; </script>";
}

if (isset($_REQUEST['courseSubmitBtn'])) {
	if ($_REQUEST['category_id'] == "" || $_REQUEST['course_name'] == "" || $_REQUEST['course_desc'] == "" || $_REQUEST['course_author'] == "" || $_REQUEST['course_duration'] == "" || $_REQUEST['course_status'] == "" || $_REQUEST['course_original_price'] == "" || $_REQUEST['course_price'] == "") {
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
	} else if (!((strtolower($_REQUEST['course_status']) == "free" || strtolower($_REQUEST['course_status']) == "premium"))) {
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Course Status can only be free or premium! </div>';
	} else {
		$category_id = $_REQUEST['category_id'];
		$course_name = $_REQUEST['course_name'];
		$course_desc = $_REQUEST['course_desc'];
		$course_author = $_REQUEST['course_author'];
		$course_duration = $_REQUEST['course_duration'];
		$course_status = $_REQUEST['course_status'];
		$course_price = $_REQUEST['course_price'];
		$course_original_price = $_REQUEST['course_original_price'];
		$course_image = $_FILES['course_img']['name'];
		$course_image_temp = $_FILES['course_img']['tmp_name'];
		$img_folder = '../image/courseimg/' . $course_image;
		move_uploaded_file($course_image_temp, $img_folder);

		$sql = "INSERT INTO course (course_name, course_desc, course_author, course_duration, course_status, course_original_price, course_price, course_img, category_id) VALUES ('$course_name', '$course_desc', '$course_author', '$course_duration', '$course_status', '$course_original_price', '$course_price', '$img_folder', '$category_id')";


		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();
		}

		$result = mysqli_query($mysqli, $sql);
		if ($result == TRUE) {
			$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
		} else {
			$msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Course</div>";
		}
	}
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Course</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="category_id">Category ID</label>
			<input type="text" class="form-control" id="category_id" name="category_id">
		</div>
		<div class="form-group">
			<label for="course_name">Course Name</label>
			<input type="text" class="form-control" id="course_name" name="course_name">
		</div>
		<div class="form-group">
			<label for="course_desc">Course Description</label>
			<textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
		</div>
		<div class="form-group">
			<label for="course_author">Author</label>
			<input type="text" class="form-control" id="course_author" name="course_author">
		</div>
		<div class="form-group">
			<label for="course_duration">Course Duration</label>
			<input type="text" class="form-control" id="course_duration" name="course_duration">
		</div>
		<div class="form-group">
			<label for="course_status">Course Status <small>(free or premium)</small></label>
			<input type="text" class="form-control" id="course_status" name="course_status" value="free" readonly>
		</div>
		<div class="form-group">
			<label for="course_original_price">Course Original Price</label>
			<input type="text" class="form-control" id="course_original_price" name="course_original_price">
		</div>
		<div class="form-group">
			<label for="course_price">Course Selling Price</label>
			<input type="text" class="form-control" id="course_price" name="course_price" value="0" readonly>
		</div>
		<div class="form-group">
			<label for="course_img">Course Image</label>
			<input type="file" class="form-control-file" id="course_img" name="course_img">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
			<a href="adminCourses.php" class="btn btn-secondary">Close</a>
		</div>
		<?php if (isset($msg)) { echo $msg; } ?>
	</form>
</div>

</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php
include('admin_footer.php');
?>