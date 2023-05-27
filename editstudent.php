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
if(isset($_REQUEST['requpdate'])) {
	//Checking for Empty Fields
	if(($_REQUEST['std_id'] == "") || ($_REQUEST['std_name'] == "") || ($_REQUEST['std_email'] == "")|| ($_REQUEST['std_pass'] == "") || ($_REQUEST['std_prof'] == "")) {
		//message displayed if any field is missing
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>'; 
	} 
	else {
		//Assigning User Values to Variable
		$sid = $_REQUEST['std_id'];
		$sname = $_REQUEST['std_name'];
		$semail = $_REQUEST['std_email'];
		$spass = $_REQUEST['std_pass'];
		$sprof = $_REQUEST['std_prof'];
		
		$sql = "UPDATE student SET std_id = '$sid', std_name = '$sname', std_email = '$semail', std_pass = '$spass', std_prof = '$sprof' WHERE std_id = '$sid'";

		if(mysqli_query($mysqli, $sql) == TRUE) {
			//below msg display on form submit success
			$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
		}

		else {
				//below msg display on form submit failed
			$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
		}

	}
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">

	<?php  
	if(isset($_REQUEST['view'])){
		$sql = "SELECT * FROM student WHERE std_id = {$_REQUEST['id']}";
		$result = mysqli_query($mysqli, $sql);
		$row = $result->fetch_assoc();
	}

	?>

	<h3 class="text-center">Update Student Details</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="std_id">ID</label>
			<input type="text" class="form-control" id="std_id" name="std_id" value="<?php if(isset($row['std_id'])) {echo $row['std_id']; }?>" readonly>
		</div>
		<div class="form-group">
			<label for="std_name">Name</label>
			<input type="text" class="form-control" id="std_name" name="std_name" value="<?php if(isset($row['std_name'])) {echo $row['std_name']; }?>" >
		</div>
		<div class="form-group">
			<label for="std_email">Email</label>
			<input type="text" class="form-control" id="std_email" name="std_email" value="<?php if(isset($row['std_email'])) {echo $row['std_email']; }?>" >
		</div>
		<div class="form-group">
			<label for="std_pass">Password</label>
			<input type="text" class="form-control" id="std_pass" name="std_pass" value="<?php if(isset($row['std_pass'])) {echo $row['std_pass']; }?>" >
		</div>
		<div class="form-group">
			<label for="std_prof">Profession</label>
			<input type="text" class="form-control" id="std_prof" name="std_prof" value="<?php if(isset($row['std_prof'])) {echo $row['std_prof']; }?>" >
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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