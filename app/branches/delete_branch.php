
<?php
	include("../includes/header.php");
	$id = $_GET["branch_id"];
	
		$query_delete  = "UPDATE `branches` SET delete_status = 0 WHERE branch_id = $id ";
	$res           = mysqli_query($con,$query_delete);
	if($res)
	{
		echo "<script>window.location='index.php';</script>";
	}
	
?>