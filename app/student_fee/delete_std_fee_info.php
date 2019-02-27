<?php include"../includes/header.php"; ?>
<?php $id=$_GET["std_fee_id"]; 
	$sql="UPDATE std_fee_details SET delete_status=0 WHERE std_fee_id=$id";
	$sql_result=mysqli_query($con,$sql);
	if($sql_result)
	{
		echo "<script>window.location='index.php';</script>";
	}

?>