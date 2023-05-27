<?php
if(!isset($_SESSION)){
    session_start();
}

include('profileHeader.php');
include_once('config.php');

if(isset($_SESSION['is_login'])){
    $std_email = $_SESSION['stdLoginemail'];
    $query1 = "SELECT std_id FROM student WHERE std_email='$std_email'";
    $res = mysqli_query($mysqli, $query1);
    $result = $res->fetch_assoc();
    $std_id = $result['std_id'];
} else{
    echo "<script>location.href='index.php'</script>";
}
?>

<body class="profile-background">
<div class="container mt-5 ;" style="padding-top:10px; padding-bottom: 40px;">
	<h1 class="text-center">Enrolled Courses</h1>

	<!-- Start of Deck 1 -->
	<div class="card-deck mt-4 ">
        <?php
        $query2 = "SELECT * FROM enrolment WHERE std_id = '$std_id'";
        $res2 = mysqli_query($mysqli, $query2);
        if ($res2->num_rows > 0) {
            while ($result2 = $res2->fetch_assoc()) {
                $course_id = $result2['course_id'];
                $query3 = "SELECT * FROM course WHERE course_id = '$course_id'";
                $res3 = mysqli_query($mysqli, $query3);
                if($res3->num_rows > 0) {
                    while($result3 = $res3->fetch_assoc()) {
                        $course_img = str_replace("..", ".", $result3['course_img']);
                        echo '<a href="watchcourse.php?course_id='. $result3['course_id'] .'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
                            <div class="card" >
                                <img src="' .$course_img. '" class="card-img-top" alt="image" style="width: 100%; height: 174px;">
                                <div class="card-body">
                                    <h5 class="card-title">' .$result3['course_name']. '</h5>
                                    <p class="card-text">' .$result3['course_desc']. '</p>
                                    <div class="card-footer">
                                    <p style="visibility: hidden;">.</p>
                                        <a href="watchcourse.php?course_id='. $result3['course_id'].'" class="btn btn-primary text-white font-weight-bolder float-right">View Course</a>
                                    </div>
                                </div>
                            </div>
                        </a>';
                    }
                }
            }
        }
        ?>
    </div>
</div>
</body>

<?php
include("footer.php");
?>