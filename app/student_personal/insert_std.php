<?php $con=mysqli_connect("localhost","root","","ams");

$std_name=$_POST["std_name"];
$std_father_name=$_POST["std_father_name"];
$std_contact_no=$_POST["std_contact_no"];
$std_father_contact_no=$_POST["std_father_contact_no"];
$std_email=$_POST["std_email"];
$std_gender=$_POST["std_gender"];
$std_address=$_POST["std_address"];
$std_district=$_POST["std_district"];
$std_tehseel=$_POST["std_tehseel"];
$std_religion=$_POST["std_religion"];
$std_picture=$_POST["std_picture"];
$std_registeration=$_POST["std_registeration"];
$subjects=$_POST["subjects"];
$fee=$_POST["fee"];
$net_total=$_POST["net_total"];
$discounts=$_POST["discounts"];
$fee_after_discount=$_POST["fee_after_discount"];
$subject_duration_Arr=$_POST["subject_duration_Arr"];

$length=count($subjects);

$sql="INSERT INTO student_personal_information(std_name,std_father_name,std_contact_no,std_email,std_father_contact_no,std_gender,std_address,std_district,std_tehseel,std_religion,std_cnic)VALUES('$std_name','$std_father_name','$std_contact_no','$std_email','$std_father_contact_no','$std_gender','$std_address','$std_district','$std_tehseel','$std_religion','$std_picture')";
$result=mysqli_query($con,$sql);
if ($result) {
	$last_id = mysqli_insert_id($con);
	$sql11="INSERT INTO std_fee_details(std_id,subject_id,std_monthly_fee,delete_status,net_total,month_duration) VALUES ($last_id,12,'$std_registeration',2,'$std_registeration',1)";
	$result11=mysqli_query($con,$sql11);
	for ($i=0; $i <$length ; $i++) { 
		$sql="INSERT INTO std_fee_details(std_id,subject_id,std_monthly_fee,discount_monthly_fee,net_total,month_duration) VALUES ('$last_id','$subjects[$i]','$fee[$i]','$discounts[$i]','$fee_after_discount[$i]','$subject_duration_Arr[$i]')";
		$sql_result=mysqli_query($con,$sql);
	}
	if ($sql_result) {
		echo json_encode($last_id);
	}
		
		
	
}
else{
	$query_result="data is not inserted of outside";
}
//echo json_encode($query_result);