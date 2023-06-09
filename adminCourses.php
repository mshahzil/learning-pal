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

$sql = "SELECT * FROM course";
$result = mysqli_query($mysqli, $sql);
?>

<div class="col-sm-9 mt-5">
	<p class="bg-dark text-white p-2 ">List of Courses</p>
	<?php if($result->num_rows > 0){ ?>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Course ID</th>
					<th scope="col">Name</th>
					<th scope="col">Author</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch_assoc()){ 
					echo '<tr>';
					echo	'<th scope="row">'.$row['course_id'].'</th>';
					echo     '<td>'.$row['course_name'].'</td>';
					echo	'<td>'.$row['course_author'].'</td>';
					echo '<td>';

					echo	'<form action="editcourse.php" method="POST" class="d-inline">
								<input type="hidden" name="id" value='.$row['course_id'].'>
								<button type="submit" class="btn btn-info mr-3" name="view" value="view">

								<i class="fas fa-pen"></i>
								</button>
							</form>

					<form action="" method="POST" class="d-inline">
						<input type="hidden" name="id" value='.$row['course_id'].'>
						<button type="submit" class="btn btn-secondary" name="delete" value="Delete">
						<i class="far fa-trash-alt"></i>
						</button>
					</form>';
					echo '</td>';
					echo '</tr>';
				} ?>
			</tbody>
		</table>
	<?php } else {
		echo "0 Results";
	} ?>
</div>

</div>  

<!-- Start Delete Button Functionality -->
<?php 
if(isset($_REQUEST['delete'])){
	$sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
	if (mysqli_query($mysqli, $sql) == TRUE){
		echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
	} else{
		echo "Unable to Delete Data";
	}
}
?>
<!-- End Delete Button Functionality -->

<div>
	<a href="./addCourse.php" class="btn btn-danger box" style="position: fixed; right: 40px; bottom: 40px;">
		<i class="fas fa-plus fa-2x"></i>
	</a>
</div>

</div> <!-- div Container-fluid close from header -->

<?php
include('admin_footer.php');
?>