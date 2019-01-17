<?php include"../includes/connection.php"; ?>
<?php 
	$id=$_GET["subject_id"];
	$delete_query="UPDATE subjects SET delete_status='0' WHERE subject_id='$id'";
	$query_result=mysqli_query($con,$delete_query);
	if ($query_result) {
		
		echo "<script type='text/javascript'>window.location='index.php';</script>";
	}

?>
