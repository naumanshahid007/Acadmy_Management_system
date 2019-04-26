  <?php include("../includes/header.php"); 
  $id=$_GET["std_id"];
  $subject=$_GET["subject_id"];
  $query=mysqli_query($con,"SELECT * FROM std_fee_details WHERE std_fee_id='$subject'");
  $row=mysqli_fetch_assoc($query);
  $sub=$row["subject_id"];
  //echo $sub;

  $sql1=mysqli_query($con,"SELECT * FROM std_total_fee WHERE std_id='$id'");
  $sql1res=mysqli_fetch_assoc($sql1);
  $net= $sql1res["std_total_fee"];
  $a=$net-$row["net_total"];
 
 $query1=mysqli_query($con,"SELECT * FROM subjects WHERE subject_id='$sub'");
  $row1=mysqli_fetch_assoc($query1);
 // echo $row1["subject_name"];
  
  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="container-fluid">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Edit the Subject</h3><br>
        <form method="POST"  class="well" style="border-top:1px solid #00a65a;">
        <div class="row" >
          <div class="col-md-4 form-group">
            <label>Subject Name</label>
            <select name="subject_id" id="subject" class="form-control">
            	<option value="<?php echo $row['subject_id'] ?>"><?php echo $row1["subject_name"] ?></option>
            <option disabled="">--Select Subject--</option>
            <?php 
            	$sql="SELECT * FROM subjects WHERE delete_status=1";
            	$sql_result=mysqli_query($con,$sql);
            	while ($row2=mysqli_fetch_assoc($sql_result)) {
            		if ($row2['subject_id']!=$row['subject_id']) {
            			# code...
            		
            		?>
            		<option value="<?php echo $row2['subject_id']; ?>"><?php echo $row2["subject_name"]; ?></option>
            		<?php
            		}
            	}

            ?>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label>Fee</label>
            <input type="text" id="monthlyFee" class="form-control" name="std_monthly_fee" placeholder="Fee of the subject" required="" readonly="" value="<?php echo $row['std_monthly_fee']; ?>">
          </div>
          <div class="col-md-4 form-group">
            <label>Discount</label>
            <input type="text" class="form-control" name="discount_monthly_fee" placeholder="Discount" value="<?php echo$row["discount_monthly_fee"]; ?>">
            
          </div>

        </div>
        <div class="row">
          <div class="col-md-4">
            <label> Duration</label>
            <input type="text" name="duration" value="<?php echo $row["month_duration"]; ?>"  class="form-control"> 
          </div>
        </div>
        <br>
        
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary btn-xs" name="submit"><i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
        <a href="view_std_personal_info.php?std_id=<?php echo $id; ?>" title="Go to main page" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
        

  		<?php 
  			if (isset($_POST["submit"])) {
  				$subj=$_POST["subject_id"];
          $duration=$_POST["duration"];
		  		$std_monthly_fee=$_POST["std_monthly_fee"];
		  		$discount_monthly_fee=$_POST["discount_monthly_fee"];
		  		$ab=$std_monthly_fee-$discount_monthly_fee;

		  		$ac=$a+$ab;
		  		//echo $subj."<br>".$std_monthly_fee."<br>".$discount_monthly_fee."<br>".$ab."<br>".$ac;
		  		$sql11="UPDATE std_fee_details SET subject_id='$subj',std_monthly_fee='$std_monthly_fee',discount_monthly_fee='$discount_monthly_fee' , net_total='$ab',month_duration ='$duration' WHERE std_fee_id='$subject'";
		  		$result12=mysqli_query($con,$sql11);
		  		if ($result12) {
		  			
		  				echo"<script>window.location='view_std_personal_info.php?std_id=$id'</script>";
		  			}
		  		}
  			
  		?>
</div>
      </div>
  <!-- jQuery 3 -->
  <?php include"../includes/footer.php"; ?>

<script type="text/javascript">
$(document).ready(function(){
  var getFee = 0;
  $('#subject').change(function(){
   var subject_Id = $('#subject').val();
   $('#monthlyFee').val();

   $.ajax({
        type:'post',
        data:{subject_Id:subject_Id},
        url: "fetch-fee.php",

        success: function(result){
        data=$.parseJSON(result);
        var fee = data["subject_fee"];
        //alert(getFee);

          $('#monthlyFee').val(fee);
        
        }         
    });
  });
});
</script>
