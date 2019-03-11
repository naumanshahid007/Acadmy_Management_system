<?php $con=mysqli_connect("localhost","root","","ams"); ?>
<?php 
	$std=$_POST["std"];
	$arrayId=array();
	$nameArray=array();
	if (isset($std)) {
		$sql="SELECT subject_id FROM groups WHERE group_id='$std' AND delete_status=1";
		$sql_result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($sql_result);
		$abc=$row["subject_id"];
		//echo json_encode($abc);
		$sql1="SELECT * FROM std_fee_details WHERE subject_id='$abc' AND delete_status=1 AND enroll_status=0";
		$sql_result1=mysqli_query($con,$sql1);
		//$row1=mysqli_fetch_assoc($sql_result1);
		$count=mysqli_num_rows($sql_result1);
		while ($row1=mysqli_fetch_assoc($sql_result1)) {
			$id_value=$row1["std_id"];
			array_push($arrayId,$id_value);

		}
		$length=count($arrayId);
		
		
		for ($i=0; $i <$length ; $i++) { 
			$sql2="SELECT * FROM student_personal_information WHERE std_id='$arrayId[$i]' AND delete_status=1";
			//echo json_encode($sql2);
			//die;
			$sql_result2=mysqli_query($con,$sql2);
			$row2=mysqli_fetch_assoc($sql_result2);
			$name=$row2["std_name"];
			array_push($nameArray, $name);
			$id=$arrayId[$i];
			
			//echo json_encode($id);
		}
		
		$obj = (object) array($arrayId,$nameArray);
		echo json_encode($obj);
	}

?>