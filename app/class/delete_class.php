<?php
	include("../includes/header.php");
	$id = $_GET["class_id"];

	$query_delete  = "UPDATE classes SET delete_status = 0 WHERE class_id = $id ";
	$res           = mysqli_query($con,$query_delete);
	if($res)
	{
		echo "<script>window.location='index.php';</script>";
	}