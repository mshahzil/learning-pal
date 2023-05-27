<?php
//including the database connection file
include_once("config.php");

//checking email
if(isset($_POST['checkemail']) && isset($_POST['stdemail'])){
    $stdemail = $_POST['stdemail'];
    $sql = "SELECT std_email FROM student WHERE std_email = '".$stdemail."';";
    $query_result = $mysqli->query($sql);
    //echo json_encode($query_result);
    $Nrows = mysqli_num_rows($query_result);
    echo json_encode($Nrows);   
}

//add student
if(isset($_POST['stduser']) && isset($_POST['stdname']) && isset($_POST['stdemail']) && isset($_POST['stdpass'])) {	
	$stdname = $_POST['stdname'];
	$stdemail = $_POST['stdemail'];
	$stdpass =  $_POST['stdpass'];
				
	//insert data to database	
	$query = "INSERT INTO student (std_name, std_email, std_pass) VALUES ('$stdname','$stdemail', '$stdpass')";
        
    if($mysqli->query($query)){
        echo json_encode("OK");
    }
    else{
        echo json_encode("Failed");
    }

	$mysqli->close();
}
?>