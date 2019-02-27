<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Subject</h3>
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">
      <div class="row">
        <div class="col-md-4 form-group">
          <label for=""> Select Class</label>
          <select name="class_id" class="form-control">
            <option >--- Select The class---</option>
            <?php 
              $sql="SELECT * FROM classes WHERE delete_status=1";
              $result=mysqli_query($con,$sql);
              while ($row=mysqli_fetch_assoc($result)) {
               ?>
                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name'];?></option>
               <?php
              }
            ?>
            
          </select>
         
        </div>
        <div class="col-md-4 form-group">
           <label for=""> Subject Name</label>
          <input type="text" class="form-control" name="subject_name" required="" placeholder="Enter Subject Name" required="" autofocus="" required="">
         
        </div>
        <div class="col-md-4 form-group">
           <label for=""> Subject Fee</label>
          <input type="text" class="form-control" name="subject_fee" required="" placeholder="Enter subject Fee" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 form-group">
          <label for=""> Subject Description</label>
          <textarea name="subject_description" class="form-control" rows="2" placeholder="Enter description  of subject" required=""></textarea>
          <br>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
          <a href="index.php" title="Go to back" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>  Cancel</a>
        </div>
      </div>
    </form>
    </div>







<?php
  if(isset($_POST["submit"]))
  {
    $subject_name=mysqli_real_escape_string($con,$_POST["subject_name"]);
    $subject_fee=mysqli_real_escape_string($con,$_POST["subject_fee"]);
    $class_id=mysqli_real_escape_string($con,$_POST["class_id"]);
    $subject_description=mysqli_real_escape_string($con,$_POST["subject_description"]);
    $created_at=date("d/m/Y");
    
    
    $query_insert = "INSERT INTO subjects(subject_name,subject_fee,class_id,created_at,created_by,subject_description) VALUES ('$subject_name','$subject_fee','$class_id','$created_at','$user','$subject_description')";
    
    $result   = mysqli_query($con,$query_insert);
    if($result)
      {
        echo "<script type='text/javascript'>window.location='index.php'</script>";
      } 
    }


?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://dexdevs.com/">DEXDEVS</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include"../includes/footer.php"; ?>



