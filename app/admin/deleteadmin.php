
<?php
	include("../includes/header.php");
	$id = $_GET["admin_id"];
	if ($id==$user) {
		echo "<script>alert('Can not delte yourself');</script>";
		echo "<script>window.location='manage_admin.php';</script>";
			
	}
	else{
		$query_delete  = "UPDATE `manage_admin` SET delete_status = 0 WHERE admin_id = $id ";
	$res           = mysqli_query($con,$query_delete);
	if($res)
	{
		echo "<script>window.location='manage_admin.php';</script>";
	}
	}
?>