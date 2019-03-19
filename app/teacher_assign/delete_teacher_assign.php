<?php include "../includes/connection.php";
	$id=$_GET["teacher_assign_id"];
	$group_id=$_GET["group_id"];

	$sql="UPDATE assign_teacher SET delete_status=0 WHERE assign_teacher_id=$id";
	$sql_result=mysqli_query($con,$sql);
	if ($sql_result) {
		$sql_group=mysqli_query($con,"UPDATE groups SET assign_status=0 WHERE group_id='$group_id'");
		if ($sql_group) {
			echo "<script type='text/javascript'>window.location='index.php';</script>";
		}
	}
	

?>