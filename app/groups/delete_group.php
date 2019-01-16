<?php
	include("../includes/header.php");
	$id = $_GET["group_id"];

	$query_delete  = "UPDATE groups SET delete_status = 0 WHERE group_id = $id ";
	$res           = mysqli_query($con,$query_delete);
	if($res)
	{
		echo "<script>window.location='index.php';</script>";
	}