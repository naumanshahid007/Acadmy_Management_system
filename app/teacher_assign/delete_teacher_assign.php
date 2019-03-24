<?php include "../includes/connection.php";
	$id=$_GET["teacher_assign_id"];
	$group_id=$_GET["group_id"];

	$sql="UPDATE assign_teacher SET delete_status=0 WHERE assign_teacher_id=$id";
	$sql_result=mysqli_query($con,$sql);
	if ($sql_result) {
		$sql_group=mysqli_query($con,"UPDATE groups SET assign_status=0 WHERE group_id='$group_id'");
		if ($sql_group) {
			$sql_head=mysqli_query($con,"SELECT std_enrollment_head_id FROM std_enrollment_head WHERE group_id='$group_id'");
			$row=mysqli_fetch_assoc($sql_head);
			$head_id=$row["std_enrollment_head_id"];
			$sql_head1=mysqli_query($con,"SELECT std_id FROM std_enrollment_details WHERE std_enrollment_head_id='$head_id'");
			while ($std_data=mysqli_fetch_assoc($sql_head1)) {
				$std=$std_data["std_id"];
					$std_update=mysqli_query($con,"UPDATE std_fee_details SET enroll_status=0 WHERE std_id=$std");
					if ($std_update) {
						echo "<script>window.loaction='index.php'</script>";
					}
			}
		}
	}
	

?>