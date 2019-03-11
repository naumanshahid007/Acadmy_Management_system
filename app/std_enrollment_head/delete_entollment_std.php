<?php include"../includes/connection.php";
$std_id=$_GET["std_id"];
$head_id=$_GET["head_id"];  
$enroll_id=$_GET["enroll_id"];
//echo $enroll_id,$head_id,$std_id;

	//$delete_query="DELETE FROM std_enrollment_details WHERE std_enrollment_details_id=$enroll_id";
	//$result=mysqli_query($con,$delete_query);
	  			$sql_enroll="SELECT group_id FROM std_enrollment_head WHERE std_enrollment_head_id='$head_id'";
                $enroll_result=mysqli_query($con,$sql_enroll);
                //echo mysqli_num_rows($enroll_result);
                $row=mysqli_fetch_assoc($enroll_result);
                	$group_id= $row["group_id"];
                	//echo "<br>head id".$group_id;
						               	

                   	$sql_details="SELECT subject_id FROM groups WHERE group_id='$group_id'";

                   	//echo $sql_details;

                	$details_result=mysqli_query($con,$sql_details);
                	$row_details=mysqli_fetch_assoc($details_result);
                	$row_detail_id= $row_details['subject_id'];
  //              	echo "<br> subject id".$row_detail_id;
                	 $sql="DELETE FROM 	std_enrollment_details where std_enrollment_details_id='$enroll_id'";
                	 //echo $sql;
                	 $result=mysqli_query($con,$sql);
                	 if ($result) {
                	 	$sql1_update="UPDATE std_fee_details SET enroll_status=0 WHERE std_id='$std_id' AND subject_id=$row_detail_id";
    //            	 	echo $sql1_update;
                	 	$sql_update_result=mysqli_query($con,$sql1_update);
                	 	var_dump($sql_update_result);
                	 	if ($sql_update_result) {
  							echo "<script>window.location='view_enrollment_head.php?head_id=$head_id'</script>";
                	 	}
                	 }
            
?>