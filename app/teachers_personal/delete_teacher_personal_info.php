<?php
	include("../includes/header.php");
	
	// get `teacher_id` from teacher personal `index.php`

    $stdId 			= $_GET['teacher_id'];

	$stddelete  	= "UPDATE teacher_personal_info SET delete_status = 0 WHERE teacher_id = '$stdId' ";
	$stdresult      = mysqli_query($con,$stddelete);
	
	if($stdresult)
	{
		echo "<script>window.location='index.php';</script>";
	}