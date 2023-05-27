<?php
session_start();
include_once("config.php");

if(isset($_POST['loginCheck']) && isset($_POST['stdLoginemail']) && isset($_POST['stdLoginpass'])){
        $stdLoginemail= $_POST['stdLoginemail'];
        $stdLoginpass = $_POST['stdLoginpass'];
        
        $q = "SELECT std_email, std_pass FROM student WHERE std_email='".$stdLoginemail."' AND std_pass='".$stdLoginpass."'";
        $result_que= $mysqli->query($q);
        $rows = mysqli_num_rows($result_que);
        if($rows === 1){
            $_SESSION['is_login'] = true;
            $_SESSION['stdLoginemail'] = $stdLoginemail;
            echo json_encode($rows);
        
        }
        else if($rows === 0){
            echo json_encode($rows);
        }   
}

?>