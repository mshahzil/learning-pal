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

	if (isset($_REQUEST['feedbackSubmitBtn'])) {
		if ($_REQUEST['feedback'] == "" || $_REQUEST['std_id'] == "") {
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields!</div>';
		}
		else {
			$feedback = $_REQUEST['feedback'];
			$std_id = $_REQUEST['std_id'];

			$sql = "INSERT INTO feedback (feedback, std_id) VALUES ('$feedback', '$std_id')";

			if (mysqli_connect_errno()) {
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  				exit();
			}

			$result = mysqli_query($mysqli, $sql);
			if ($result == TRUE) {
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Feedback Added Successfully</div>';
			}
			else {
				$msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Feedback</div>";
			}

		}
	}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Feedback</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="std_id">Student ID</label>
			<input type="text" class="form-control" id="std_id" name="std_id">
		</div>
		<div class="form-group">
			<label for="feedback">Feedback</label>
			<textarea class="form-control" id="feedback" name="feedback" row=3></textarea>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="feedbackSubmitBtn" name="feedbackSubmitBtn">Submit</button>
			<a href="adminFeedback.php" class="btn btn-secondary">Close</a>
		</div>
		<?php
			if (isset($msg)) {
				echo $msg;
			}
		?>
	</form>
</div>

</div>  <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php
	include('./footer.php');
?>

