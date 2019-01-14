
<?php
	include("../includes/connection.php");
	$id = $_GET["admin_id"];
	$query_delete  = "UPDATE `manage_admin` SET delete_status = 0 WHERE admin_id = $id ";
	$res           = mysqli_query($con,$query_delete);
	if($res)
	{
		header('location:manage_admin.php');
	}
?>