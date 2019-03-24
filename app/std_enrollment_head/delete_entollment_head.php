<?php 
	include "../includes/connection.php";?>
	<?php
	$head_id=$_GET["head_id"];
	
					
	$sql_head=mysqli_query($con,"SELECT subject_id FROM std_enrollment_head WHERE std_enrollment_head_id=$head_id");
	$data=mysqli_fetch_assoc($sql_head);
	$subject_id= $data["subject_id"];
		$sql_head1=mysqli_query($con,"SELECT std_id FROM std_enrollment_details WHERE std_enrollment_head_id='$head_id'");


		while ($row=mysqli_fetch_assoc($sql_head1)) {
			$id=$row["std_id"];
			$sql_delete="DELETE FROM std_enrollment_details WHERE std_id=$id";
			$sql_delete_result=mysqli_query($con,$sql_delete);
			if ($sql_delete_result) {
				$sql_update_std=mysqli_query($con,"UPDATE std_fee_details SET enroll_status=0 WHERE std_id=$id AND subject_id=$subject_id");
				
			}

		}
		$sql_update_head="UPDATE std_enrollment_head SET delete_status=0 WHERE std_enrollment_head_id=$head_id";
		$sql_update_head_result=mysqli_query($con,$sql_update_head);
		if ($sql_update_head_result) {
			header("location:index.php");
		}

?>

