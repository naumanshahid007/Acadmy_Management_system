
<?php
	include("../includes/header.php");
	$id = $_GET["institute_id"];
	if ($id==$user) {
		echo "<script>alert('Can not delte yourself');</script>";
		echo "<script>window.location='manage_admin.php';</script>";
			
	}
	else{
		$query_delete  = "UPDATE `institutes` SET delete_status = 0 WHERE institute_id = $id ";
	$res           = mysqli_query($con,$query_delete);
	if($res)
	{
		echo "<script>window.location='index.php';</script>";
	}
	}
?>