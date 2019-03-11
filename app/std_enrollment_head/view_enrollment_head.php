<?php include"../includes/header.php"; 
?>
<link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<style type="text/css" media="screen">
  
  #delte:hover{
    color: red;
  }
</style>
<div class="content-wrapper" style="background-color: #CCCCCC">
    <div class="container-fluid">
   		<section class="content-header">
<?php 
$id=$_GET["head_id"];
$students = "SELECT * FROM std_enrollment_head WHERE delete_status = 1 AND std_enrollment_head_id='$id'";
    $studentresult     = mysqli_query($con,$students);
    $sql_result=mysqli_fetch_assoc($studentresult);
    $subject_id=$sql_result["subject_id"];

?>  
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
      </ol>
    </section>
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				
				<button class="btn btn-success" title="Add Student" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" ></i></button>
				
				<h3><?php echo $sql_result["group_info"]; ?></h3>
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-primary">
                    <th style="text-align: center">Sr #</th>
                    <th>Student Name</th>
                    <th>Phone No</th>
                    <th>Father Name</th>
                    <th>Father Contact No</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                
               

                $sql_enroll="SELECT * FROM std_enrollment_details WHERE std_enrollment_head_id='$id' AND delete_status=1";
                
                  $srNo=1;
                $enroll_result=mysqli_query($con,$sql_enroll);
                //echo mysqli_num_rows($enroll_result);
                while ($row=mysqli_fetch_assoc($enroll_result)) {
                  $std_id= $row["std_id"];
                  //echo $std_id;
                    $sql_details="SELECT std_id FROM std_fee_details WHERE delete_status=1 AND enroll_status=1 AND std_id='$std_id'";
                    //echo $sql_details;
                  $details_result=mysqli_query($con,$sql_details);
                  $row_details=mysqli_fetch_assoc($details_result);
                  $row_detail_id= $row_details['std_id'];
                   $student="SELECT std_name,std_contact_no,std_father_name,std_father_contact_no FROM student_personal_information WHERE std_id='$row_detail_id'";
                    $student_result=mysqli_query($con,$student);
                    $student_row=mysqli_fetch_assoc($student_result);
                    //echo $student_row["std_name"];
               
            ?>
            <tr>
                  <td align="center"><b><?php echo $srNo; ?></b></td>
                    <td><?php echo $student_row["std_name"]; ?></td>
                    <td><?php echo $student_row["std_contact_no"]; ?></td>
                    <td><?php echo $student_row["std_father_name"]; ?></td>
                    <td><?php echo $student_row["std_father_contact_no"]; ?></td>
                   <td>
                    
                    
                    <a href="delete_entollment_std.php?enroll_id=<?php echo $row['std_enrollment_details_id'];?>&&head_id=<?php echo $id; ?>&&std_id=<?php echo $row['std_id']; ?>" onclick="return confirm('Are you sure to delete this student');" title="Delete"><i class="glyphicon glyphicon-trash" id="delte"></i></a>
                  </td> 

                  </tr>
              <?php
                $srNo++;
              } ?>
                   </tbody>
              </table>

			</div>
		</div>
	</section>
    </div>
</div>
<div class="modal fade" id="myModal" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Student Enrollment</h4>
              </div>
              <form method="POST">
              <div class="modal-body">
                <div class="row">
                	<div class="col-md-1"></div>
            	<?php 
            		$abc=$sql_result["subject_id"];
                 
					//subject Id
					//echo $abc;
					$sql1="SELECT std_id FROM std_fee_details WHERE subject_id='$abc' AND delete_status=1 AND enroll_status=0 ";
						$sql_result1=mysqli_query($con,$sql1);
						
						
                  	
						
						
                ?>
              <div class="col-md-10">
                <label>Select </label>
                  <select name="std[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Student"
                        style="width: 100%;">

                  	<?php while ($row1=mysqli_fetch_assoc($sql_result1)) {
							$std_id=$row1["std_id"];
							$sql7="SELECT std_name,std_id FROM student_personal_information WHERE std_id='$std_id'";
                    	$result7=mysqli_query($con,$sql7);
                    	$students_row7=mysqli_fetch_assoc($result7);
                    	
						echo"<option value='".$std_id."'>".$students_row7['std_name']. "</option>";	
						}?>
                  </select>
                  
              </div>
                  
                  
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 <?php include"../includes/footer.php" ?>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2() 
  })
</script>
<?php  
  if (isset($_POST["submit"])) {
      $std_id=$_POST["std"];
      foreach ($std_id as  $std) {
        $sql_select="SELECT std_name FROM student_personal_information WHERE std_id='$std'";
        $sql_select_result=mysqli_query($con,$sql_select);
        $sql_select_row=mysqli_fetch_assoc($sql_select_result);
        $std_name=$sql_select_row["std_name"];
        $sql_insert="INSERT INTO std_enrollment_details (std_enrollment_head_id,std_id,std_name) VALUES('$id','$std','$std_name')";
        $insert_result=mysqli_query($con,$sql_insert);
        if ($insert_result) {
          $sql_update="UPDATE std_fee_details SET enroll_status=1 WHERE std_id=$std AND subject_id='$subject_id'";
          $updateresult=mysqli_query($con,$sql_update);
          if ($updateresult) {
           echo "<script>window.location='view_enrollment_head.php?head_id=$id</script>";
          }
        }
      }
  }
?>
