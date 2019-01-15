<?php include("../includes/connection.php"); ?>



<?php 
	session_start();
	$user=$_SESSION["user_name"];
	if ($user) {
	
	}
	else{
		echo "<script type='text/javascript'>window.location='../index/login.php'</script>";
	}


?>
