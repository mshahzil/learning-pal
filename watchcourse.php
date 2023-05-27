<?php

if (!isset($_SESSION)) {
	session_start();
}

include('./config.php');
include("header.php");

if (isset($_SESSION['is_login'])) {
	$stuEmail = $_SESSION['stdLoginemail'];
}
else {
	echo "<script> location.href='./user_login.php'; </script>";
}

?>


<div class="container-fluid reg-background" style="padding-top:100px; margin-bottom:120px;">
	<div class="row mb-0">
		<div class="col-sm-3 border-right">
			<h4 class="text-center">Lessons</h4>
			<ul id="playlist" class="nav flex-column">
				<?php
					if (isset($_GET['course_id'])) {
						$course_id = $_GET['course_id'];
						$sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
						$result = mysqli_query($mysqli, $sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo '<li class="nav-item border-bottom py-2" movieurl="'.str_replace("..", ".", $row['lesson_link']).'" style="cursor: pointer;">'.$row['lesson_name'].'</li>';
							}
						}
					}
				?>
			</ul>
		</div>
		<div class="col-sm-8">
			<!-- <iframe width="420" height="345" src="https://www.youtube.com/watch?v=NAEHbzXMNpA"></iframe> -->
			<video id="videoarea" src="" class="mt-5 ml-2" controls></video>
		</div>
	</div>
	<div class="row"></div>
</div>


<script>
	$(function () {

		$("#videoarea").attr("src", $("#playlist li").eq(0).attr("movieurl"));

		$("#playlist li").on("click" , function() {
			$("#videoarea").attr("src", $(this).attr("movieurl"));
		});
	});
</script>
<?php
include("footer.php");
?>
</body>
</html>