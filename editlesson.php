<?php
if (!isset($_SESSION)) {
	session_start();
}

include('admin_header.php');
include('config.php');

 if (isset($_SESSION['is_admin_login'])) {
 	$adminEmail = $_SESSION['adminLogemail'];
 }
 else {
	echo "<script> location.href='./admin_login.php'; </script>";
 }

//Update Button 
if(isset($_REQUEST['reupdate'])) {
	//Checking for Empty Fields
	if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "")) {
		//message displyed if any field is missing
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>'; 
	} 
	else {
		//Assigning User Values to Variable
		$lesson_id = $_REQUEST['lesson_id'];
		$lesson_name = $_REQUEST['lesson_name'];
		$lesson_desc = $_REQUEST['lesson_desc'];
		$lesson_link = $_FILES['lesson_link']['name'];
		$lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
		$link_folder = './lessonvid/' . $lesson_link;
		move_uploaded_file($lesson_link_temp, $link_folder);

		$sql = "UPDATE lesson SET lesson_name = '$lesson_name', lesson_desc = '$lesson_desc', lesson_link = '$link_folder' WHERE lesson_id = '$lesson_id'";

		if(mysqli_query($mysqli, $sql) == TRUE) {
			//below msg display on form submit success
			$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Lesson Updated Successfully </div>';
		}

		else {
				//below msg display on form submit failed
			$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update Lesson </div>';
		}

	}
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Update Lesson Details</h3>

	<?php  
	if(isset($_REQUEST['view'])){
		$sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
		$result = mysqli_query($mysqli, $sql);
		$row = $result->fetch_assoc();
	}

	?>


	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="course_id">Course ID</label>
			<input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) {echo $row['course_id']; } ?>" readonly>
		</div>

		<div class="form-group">
			<label for="course_name">Course Name</label>
			<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) {echo $row['course_name']; } ?>" readonly>
		</div>

		<div class="form-group">
			<label for="lesson_id">Lesson No.</label>
			<input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])) {echo $row['lesson_id']; } ?>" readonly>
		</div>

		<div class="form-group">
			<label for="lesson_name">Lesson Name</label>
			<input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])) {echo $row['lesson_name']; } ?>">
		</div>

		<div class="form-group">
			<label for="lesson_desc">Lesson Description</label>
			<textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2><?php if(isset($row['lesson_desc'])) { echo $row['lesson_desc']; } ?></textarea>
		</div>
		<div class="form-group">
			<label for="lesson_link">Current Lesson Video Link</label>
			<input type="text" class="form-control" id="lesson_link_old" name="lesson_link_old" value="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link']; } ?>" readonly>
		</div>
		<div class="form-group">
			<label for="lesson_link">New Lesson Video Link</label>
			<input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="reupdate" name="reupdate">Update</button>
			<a href="lessons.php" class="btn btn-secondary">Close</a>
		</div>

		<?php
		if (isset($msg)) { echo $msg; }
		?>

	</form>
</div>

</div>  <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->


<?php
include('admin_footer.php');
?>