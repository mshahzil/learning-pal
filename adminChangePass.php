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


$adminEmail = $_SESSION['adminLogemail'];  //actual statement
if (isset($_REQUEST['adminPassUpdatebtn'])) {
	if ($_REQUEST['adminPass'] == "") {
		$passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields! </div>';
	}
	else {
		$sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
		$result = mysqli_query($mysqli, $sql);
		if ($result->num_rows == 1) {
			$adminPass = $_REQUEST['adminPass'];
			$sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = '$adminEmail'";
			if (mysqli_query($mysqli, $sql) == TRUE) {
				$passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
			}
			else {
				$passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
			}
		}
	}
}
?>

<div class="col-sm-9 mt-5">
	<div class="row">
		<div class="col-sm-6">
			<form class="mt-5 mx-5">
				<div class="form-group">
					<label for="inputEmail">Email</label>
					<input type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="inputnewpassword">New Passsword</label>
					<input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="adminPass">
				</div>
				<button type="submit" class="btn btn-danger mr-4 mt-4" id="courseSubmitBtn" name="adminPassUpdatebtn">Update</button>
				<button type="reset" class="btn btn-secondary mt-4">Reset</button>
				<?php if(isset($passmsg)) { echo $passmsg; }?>
			</form>
		</div>
	</div>
</div>

</div>  <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php
include('admin_footer.php');
?>