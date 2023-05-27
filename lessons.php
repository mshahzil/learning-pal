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
?>

<div class="col-sm-9 mt-5 mx-3">
	<form action="" class="mt-3 form-inline d-print-none">
		<div class="form-group mr-3">
			<label for="checkid">Enter Course ID:</label>
			<input type="text" class="form-control ml-3" id="checkid" name="checkid">
		</div>
		<button type="submit" class="btn btn-danger">Search</button>
	</form>

	<?php
	$sql = "SELECT course_id FROM course";
	$result = mysqli_query($mysqli, $sql);
	while ($row = $result->fetch_assoc()) {
		if (isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
			$sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
			$result = mysqli_query($mysqli, $sql);
			$row = $result->fetch_assoc();
			if ($_REQUEST['checkid'] == $row['course_id']) {
				$_SESSION['course_id'] = $row['course_id'];
				$_SESSION['course_name'] = $row['course_name'];
				?>
				<h3 class="mt-5 bg-dark text-white p-2">
					Course ID: <?php if (isset($row['course_id'])) { echo $row['course_id']; } ?>&nbsp;&nbsp;
					Course Name: <?php if (isset($row['course_name'])) { echo $row['course_name']; } ?>
				</h3>
				<?php
				$sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
				$result = mysqli_query($mysqli, $sql);
				echo'<table class="table">
				<thead>
					<tr>
						<th scope="col">Lesson No.</th>
						<th scope="col">Lesson Name</th>
						<th scope="col">Lesson Link</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>';
				$lesson_no = 1;
				while ($row = $result->fetch_assoc()) {
					echo '<tr>
						<th scope="row">'. $lesson_no .'</th>
						<td>'. $row['lesson_name'].'</td>
						<td>'. $row['lesson_link'].'</td>
						<td>
							<form action="editlesson.php" method="POST" class="d-inline">
								<input type="hidden" name="id" value=' . $lesson_no . '>
								<button type="submit" class="btn btn-info mr-3" name="view" value="View">
									<i class="fas fa-pen"></i>
								</button>
							</form>
							<form action="" method="POST" class="d-inline">
								<input type="hidden" name="id" value=' . $lesson_no . '>
								<button type="submit" class="btn btn-secondary" name="delete" value="Delete">
									<i class="far fa-trash-alt"></i>
								</button>
							</form>
						</td>
					</tr>';
					$lesson_no += 1;
				}
				echo '</tbody>
				</table>';
			} else {
				echo '<div class="alert alert-dark mt-4" role="alert"> Course Not Found! </div>';
			}
			if (isset($_REQUEST['delete'])) {
				$sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
				if (mysqli_query($mysqli, $sql) == TRUE) {
					echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
				} else {
					echo 'Unable to Delete Data';
				}
			}
		}
	}
	?>
</div>

<?php 
if (isset($_SESSION['course_id'])) {
	echo '<div>
			<a href="./addLesson.php" class="btn btn-danger box" style="position: fixed; right: 40px; bottom: 40px;">
				<i class="fas fa-plus fa-2x"></i>
			</a>
		</div>';
}
?>

</div>  <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php
	include('admin_footer.php');
?>