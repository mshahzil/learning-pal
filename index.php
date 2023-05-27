<?php
include("header.php");
?>
<body>

<!--Home Page Background start-->
<div class="container-fluid remove-video-margin">
    <div class="vid-background">
        <video playsinline autoplay muted loop style="padding-bottom: 0;">
            <source src="video/backgroundVid1.mp4">
            <source>
        </video>
        <div class="video-overlay"></div>
    </div>
    <div class="video-content">
        <h1 class="vid-head"> Hi! This is LearningPal</h1>
        <h4 class="vid-head">Learn at your Ease</h4>
        <br>
        <?php
        if(!isset($_SESSION['is_login'])){
           echo '<a href="user_reg.php" class="btn start mt-3">Get! Set! Learn!</a>';
        } else{
            echo '<a href="MyProfile.php" class="btn start mt-3">My Profile</a>';
        }
        ?>
        

    </div>
    
</div>
<!--Home Page Background end-->
<!--Social Media Links-->
<div class="container-fluid" id="social" style="margin-bottom:0px;">
            <div class="row text-white text-center p-1">
                <div class="col-sm">
                    <a class="text-white social-hover" href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f social-icons"></i>Facebook</a>
                </div>
                <div class="col-sm">
                    <a class="text-white social-hover" href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter social-icons"></i>Twitter</a>
                </div>
                <div class="col-sm">
                    <a class="text-white social-hover" href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram social-icons"></i>Instagram</a>
                </div>
                <div class="col-sm">
                    <a class="text-white social-hover" href="https://www.whatsapp.com" target="_blank"><i class="fab fa-whatsapp social-icons"></i>Whatsapp</a>
                </div>

            </div>
        </div>



<?php
include("footer.php");
?>