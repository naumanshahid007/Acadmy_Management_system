<?php
	include("../includes/header.php");
	
	// get `teacher_id` from teacher personal `index.php`

    $stdId 			= $_GET['std_id'];

	$stddelete  	= "UPDATE student_personal_information SET delete_status = 0 WHERE std_id = '$stdId' ";
	$stdresult      = mysqli_query($con,$stddelete);
	
	if($stdresult)
	{
		echo "<script>window.location='index.php';</script>";
	}