<?php
session_start();
include_once("config.php");

if(isset($_POST['loginCheck']) && isset($_POST['adminLogemail']) && isset($_POST['adminLogpass'])){
        $adminLogemail= $_POST['adminLogemail'];
        $adminLogpass = $_POST['adminLogpass'];
        
        $q = "SELECT admin_email, admin_pass FROM admin WHERE admin_email='".$adminLogemail."' AND admin_pass='".$adminLogpass."'";
        $result_que= $mysqli->query($q);
        $rows = mysqli_num_rows($result_que);
        if($rows === 1){
            $_SESSION['is_admin_login'] = true;
            $_SESSION['adminLogemail'] = $adminLogemail;
            echo json_encode($rows);
        
        }
        else if($rows === 0){
            echo json_encode($rows);
        }   
}

?>