<?php
	include("./header.php");
	include("./config.php");
?>

<?php
	if (isset($_REQUEST["submit"])) {
		if ($_REQUEST['name'] == "" || $_REQUEST['subject'] == "" || $_REQUEST['email'] == "") {
			$msg = '<span class="alert alert-warning col-sm-6 ml-3 mt-2">Please fill all fields</span>';
		} else {
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$subject = $_REQUEST['subject'];
			$message = $_REQUEST['message'];
			$sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
			$result = mysqli_query($mysqli, $sql);
			if ($result == TRUE) {
				$msg = '<span class="alert alert-success col-sm-6 ml-3 mt-2">Message Sent Successfully</span>';
			} else {
				$msg = "<span class='alert alert-danger col-sm-6 ml-3 mt-2'>Unable to Send Message. Refresh and Try Again</span>";
			}
		}
	}
?>

<div class="container-fluid reg-background">
	<div class="container" id="Contact">
		<h1 class="text-center mb-5">Contact Us</h1>
		<div class="row">
			<div class="col-md-8">
				<form action="" method="POST">
					<input type="text" class="form-control" name="name" placeholder="Name"><br>
					<input type="text" class="form-control" name="subject" placeholder="Subject"><br>
					<input type="text" class="form-control" name="email" placeholder="Email"><br>
					<textarea class="form-control" name="message" placeholder="How can we help you?" style="height: 150px;"></textarea><br>
					<button type="submit" class="btn view" name="submit">Send</button>
					<?php if (isset($msg)) { echo $msg; } ?>
				</form>
			</div>
			<div class="col-md-4 stripe text-white text-center">
				<h4>LearningPal</h4>
				<p>LearningPal, NUST Islamabad
				Phone: 111-222-333
				www.learningpal.com</p>
			</div>
		</div>
	</div>
</div>

<?php
	include("footer.php");
?>