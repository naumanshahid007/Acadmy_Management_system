  <?php include("../includes/header.php"); 
  $id=$_GET["std_id"];
  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="container-fluid">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Add New Subject of students</h3><br>
        <form method="POST"  class="well" style="border-top:1px solid #00a65a;">
        <div class="row" >
          <div class="col-md-4 form-group">
            <label>Subject Name</label>
            <select name="subject_id" id="subject" class="form-control">
            <option>--Select Subject--</option>
            <?php 
            	$sql="SELECT * FROM subjects WHERE delete_status=1";
            	$sql_result=mysqli_query($con,$sql);
            	while ($row=mysqli_fetch_assoc($sql_result)) {
            		?>
            		<option value="<?php echo $row['subject_id']; ?>"><?php echo $row["subject_name"]; ?></option>
            		<?php
            	}

            ?>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label>Fee</label>
            <input type="text" id="monthlyFee" class="form-control" name="std_monthly_fee" placeholder="Fee of the subject" required="" readonly="">
          </div>
          <div class="col-md-4 form-group">
            <label>Discount</label>
            <input type="text" class="form-control" name="discount_monthly_fee" placeholder="Discount" required="" value="0">
            
          </div>

        </div>
        <div class="row" >
          <div class="col-md-4 form-group">
           <label>Duration of the Subject</label>
            <input type="text" class="form-control" name="duration" placeholder="Duration of Subject" required="" value="0">
             


          </div>
        </div>
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary btn-xs" name="submit"><i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
        <a href="index.php" title="Go to main page" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
        

  <?php
  
  if(isset($_POST["submit"]))
    {

      $subject_id=$_POST["subject_id"];
      
      $std_monthly_fee=$_POST["std_monthly_fee"];
      $discount_monthly_fee=$_POST["discount_monthly_fee"];
      $total=$std_monthly_fee-$discount_monthly_fee;
      $duration=$_POST["duration"];
      $sql_insert="INSERT INTO std_fee_details(std_id,subject_id,std_monthly_fee,discount_monthly_fee,net_total,month_duration) VALUES ('$id','$subject_id','$std_monthly_fee','$discount_monthly_fee','$total','$duration')";
      $result=mysqli_query($con,$sql_insert);
      if ($result) {
        echo "<script>window.location='view_std_personal_info.php?std_id=$id'</script>";
        
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
