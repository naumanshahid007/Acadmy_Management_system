<?php
	include("../includes/header.php");
	
	// get `teacher_id` from teacher personal `index.php`

    $teacherId 			= $_GET['teacher_id'];

	$teacherdelete  	= "UPDATE teacher_personal_info SET delete_status = 0 WHERE teacher_id = '$teacherId' ";
	$teacherresult      = mysqli_query($con,$teacherdelete);
	
	if($teacherresult)
	{
		echo "<script>window.location='index.php';</script>";
	}