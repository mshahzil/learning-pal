<?php
include("header.php");
include_once("config.php");

$query="SELECT f.feedback, f.std_id, s.std_name, s.std_img,s.std_prof FROM feedback f, student s WHERE f.std_id=s.std_id";
$res=$mysqli->query($query);

?>

<div class="container-fluid reg-background">
    <div class=" feedback text-center">
        <h1 class="stu-feed">Student Feedback</h1>
    </div>
    <div class="flex-container">
    <?php
    while($result= mysqli_fetch_array($res)){
        echo '<div class="feed-div">
         <div class=" stdImg" >
         <p><img src="'. $result['std_img'].'" alt="studentImage" class="img-thumbnail " style="border-radius:80%; height:100px; width:100px; border:2px; padding: 0px;"></p>
         </div>
        <div class=" stdName">
        <h4 class="f_name"> '. $result['std_name'].'</h4>
        <p class="f_prof">'. $result['std_prof'].'</p>
        <h5 class="feed-display">'. $result['feedback'].'</h5>
        </div>
        </div></br></br>';

    }
        
    ?>
    </div>

    
</div>
<?php
include("footer.php");

?>