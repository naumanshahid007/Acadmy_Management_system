<?php include"../includes/connection.php";
$std_id=$_GET["std_id"];
$subject_id=$_GET["subject_id"];

$sql_fetch="SELECT * FROM std_fee_details WHERE std_fee_id='$subject_id'";

$sql_result=mysqli_query($con,$sql_fetch);
$row=mysqli_fetch_assoc($sql_result);
$net_total= $row["net_total"];
echo $net_total;

$sql_fetch1="SELECT * FROM std_total_fee WHERE std_id='$std_id'";
$sql_result1=mysqli_query($con,$sql_fetch1);
$row1=mysqli_fetch_assoc($sql_result1);
$net= $row1['std_total_fee']-$net_total;



$sql2="UPDATE std_fee_details SET delete_status='0' WHERE std_fee_id='$subject_id'";
$result2=mysqli_query($con,$sql2);
if ($result2) {
	$sql="UPDATE std_total_fee SET std_total_fee='$net' WHERE std_id='$std_id'";
	$sql_res=mysqli_query($con,$sql);
	if ($sql_res) {
		echo"<script>window.location='view_std_personal_info.php?std_id=$std_id'</script>";
	}
//	
}

