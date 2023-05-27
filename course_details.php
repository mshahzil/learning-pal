<?php

if(!isset($_SESSION)){
    session_start();
}

include('./header-cat.php');
include('./config.php');

if (isset($_SESSION['is_login'])){
    $std_email =$_SESSION['stdLoginemail'];
    $sql="SELECT * FROM student WHERE std_email = '$std_email'";
	$result=$mysqli->query($sql);
	if ($result->num_rows == 1) {
	    $row = $result->fetch_assoc();
	    $stdId= $row["std_id"];
	    $stdName=$row["std_name"];
	    $stdProf=$row["std_prof"];
	    $stdImg = $row["std_img"];
	}
}
?>
<body style="background-color: #f3e0dc;">
<!-- Start Main Content -->
<div class="container mt-5">
	<?php
		if (isset($_GET['course_id'])) {
			$course_id = $_GET['course_id'];
			$_SESSION['course_id'] = $course_id;
			$sql = "SELECT * FROM course WHERE course_id = '$course_id'";
			$result = mysqli_query($mysqli, $sql);
			$row = $result->fetch_assoc();
		}
	?>
	<div class="row mb-5">
		<div class="col-md-4">
			<img src="<?php echo str_replace("..", ".", $row['course_img']); ?>" class="card-img-top" alt="Guitar" style="width: 344px; height: 190px;"/>
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title"><?php echo $row['course_name']?></h5>
				<p class="card-text"><?php echo $row['course_desc']?></p>
				<p class="card-text">Duration: <?php echo $row['course_duration']?></p>
				<form action="" method="POST">
					<p class="card-text d-inline">
						Price: <small><del>Rs. <?php echo $row['course_original_price']?></del></small>
						<span class="font-weight-bolder">Rs. <?php echo $row['course_price']?></span>
					</p>
					<input type="hidden" name="course_id" value="<?php echo $row['course_id'] ?>">
					
				<input type="hidden" name="std_id" value= "<?php if(isset($stdId)) { echo $stdId; }?>">
						<button type="submit" class="btn view font-weight-bolder float-right" name="enroll">Enroll Now</button>

					
					
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_REQUEST['enroll'])) {
	if (isset($_SESSION['is_login'])){
		$course_id = $_REQUEST['course_id'];
		$std_id = $_REQUEST['std_id'];

		$test = "SELECT * FROM enrolment WHERE std_id = '$std_id' && course_id = '$course_id'";
		$test_result = mysqli_query($mysqli, $test);
		if ($test_result->num_rows > 0) {
			echo "<script>location.href='MyCourses.php'</script>";
		}
		else {
			$sql = "INSERT INTO enrolment (std_id, course_id) VALUES ('$std_id', '$course_id')";
			$result = mysqli_query($mysqli, $sql);

			if ($result == TRUE) {
				echo "<script>location.href='MyCourses.php'</script>";
			}
			else {
				echo '<center><div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Enroll</div></center>';
			}
		}
	}
	else{
		echo"<script>
	location.href='user_reg.php'
	</script>";

	}
}

?>


<div class="container" style="margin-bottom: 30px;">
	<div class="row">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Lesson No.</th>
					<th scope="col">Lesson Name</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = "SELECT * FROM lesson";
				$result = mysqli_query($mysqli, $sql);
				if ($result->num_rows > 0) {
					$lesson_no = 1;
					while ($row = $result->fetch_assoc()) {
						if ($row['course_id'] == $course_id) {
							echo'<tr>
									<th scope="row">'.$lesson_no.'</th>
									<td>'.$row['lesson_name'].'</td>
								</tr>';
							$lesson_no += 1;
						}
					}
				}
			?>


			</tbody>
		</table>
	</div>
</div>

<?php
include("footer.php");
?>

</body>
</html>