<?php include("../includes/connection.php"); ?>



<?php
	error_reporting(0); 
	session_start();
	$user=$_SESSION["user_name"];
	if ($user) {
	
	}
	else{
		echo "<script type='text/javascript'>window.location='../index/login.php'</script>";
	}


?>
