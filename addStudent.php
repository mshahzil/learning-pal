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


if (isset($_REQUEST['newSubmitBtn'])) {
	if ($_REQUEST['std_name'] == "" || $_REQUEST['std_email'] == "" || $_REQUEST['std_pass'] == "" || $_REQUEST['std_prof'] == "") {
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
	}
	else {
		$std_name = $_REQUEST['std_name'];
		$std_email = $_REQUEST['std_email'];
		$std_pass = $_REQUEST['std_pass'];
		$std_prof = $_REQUEST['std_prof'];
		

		$sql = "INSERT INTO student (std_name, std_email, std_pass, std_prof) VALUES ('$std_name', '$std_email', '$std_pass', '$std_prof')";



		if (mysqli_query($mysqli, $sql) == TRUE) {
			$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
		}
		else {
			$msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Student</div>";
		}

	}
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Student</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="std_name">Name</label>
			<input type="text" class="form-control" id="std_name" name="std_name">
		</div>
		<div class="form-group">
			<label for="std_email">Email</label>
			<input type="text" class="form-control" id="std_email" name="std_email">
		</div>
		<div class="form-group">
			<label for="std_pass">Password</label>
			<input type="text" class="form-control" id="std_pass" name="std_pass">
		</div>
		<div class="form-group">
			<label for="std_prof">Profession</label>
			<input type="text" class="form-control" id="std_prof" name="std_prof">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="newSubmitBtn" name="newSubmitBtn">Submit</button>
			<a href="students.php" class="btn btn-secondary">Close</a>
		</div>
		<?php if(isset($msg)) {echo $msg;}?>
	</form>
</div>

</div>  <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php
include('admin_footer.php');
?>

