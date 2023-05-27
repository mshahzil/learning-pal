<?php
    include("header.php");
    include_once("config.php");
    $query="SELECT f.feedback, f.std_id, s.std_name, s.std_img,s.std_prof FROM feedback f, student s WHERE f.std_id=s.std_id";
    $res=$mysqli->query($query);
?>

<div class="container-fluid reg-background">
    <div class="feedback">
        <h1 class="stu-feed">Student Feedback</h1>
    </div>
    <div class="flex-container">
        <?php
            while($result= mysqli_fetch_array($res)){
                echo '
                    <div class="feed-div">
                        <div class="stdImg">
                            <p><img src="'. $result['std_img'].'" alt="studentImage" class="img-thumbnail"></p>
                        </div>
                        <div class="stdName">
                            <h4 class="f_name"> '. $result['std_name'].'</h4>
                            <h5 class="f_prof">'. $result['std_prof'].'</h5>
                            <p class="feed-display">'. $result['feedback'].'</p>
                        </div>
                    </div>
                    </br></br>
                ';
            }
        ?>
    </div>
</div>

<?php
    include("footer.php");
?>