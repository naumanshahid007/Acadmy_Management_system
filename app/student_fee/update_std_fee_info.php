<?php include"../includes/header.php"; 

$id=$_GET["std_fee_id"];
$sql="SELECT * FROM std_fee_details WHERE std_fee_id='$id'";
$sql_result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($sql); 
