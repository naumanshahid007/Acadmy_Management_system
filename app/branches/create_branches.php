<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Branch</h3>
      <form method="POST" enctype="multipart/form-data"  class="well" style="border-top:1px solid #00a65a;">
      <div class="row">
        <div class="col-md-4 form-group">
          <label>Institute Name</label>
          <select class="form-control" name="institute_name">
            <?php
              $query_institute = " SELECT * FROM institutes WHERE delete_status = 1 ";
              $result = mysqli_query($con,$query_institute);
              while($opt = mysqli_fetch_array($result))
              {?>
                  <option value="<?php echo $opt["institute_id"]; ?>"><?php echo $opt["institute_name"]; ?></option>
            <?php  }
            ?>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Name</label>
          <input type="text" name="branch_name" class="form-control" placeholder="Enter Name Of Branch" required="">
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Code</label>
          <input type="text" name="branch_code" class="form-control" placeholder="Enter Code Of Branch" required="">
        </div>
      </div>
     <div class="row">
        <div class="col-md-4 form-group">
          <label>Branch Location</label>
          <input type="text" name="branch_location" class="form-control" placeholder="Enter branch location" required="">
          
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Contact No</label>
          <input type="text" name="branch_contact_no" class="form-control" placeholder="Enter branch contact No" required="">
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Email</label>
          <input type="email" name="branch_email" class="form-control" placeholder="Enter Email Of branch" required="">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label for="">Branch Head Name</label>
          <input type="text" name="branch_head_name" class="form-control" placeholder="Enter branch head name" required="">
          
        </div>
        <div class="col-md-4" form-group>
          <label>Branch Head Contact No</label>
          <input type="text" name="branch_head_contact_no" class="form-control" placeholder="Enter head Contact No" required="">
        </div>
        <div class="col-md-4" form-group>
          <label>Branch Head Email</label>
          <input type="email" name="branch_head_email" class="form-control" placeholder="Enter branch head email" required="">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
        <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
        </div>
      </div>
    </form>
    </div>

<?php
  if(isset($_POST["submit"]))
  {
    $institute_name        = $_POST["institute_name"];
    $branch_name           = $_POST["branch_name"];
    $branch_code           = $_POST["branch_code"];
    $branch_location       = $_POST["branch_location"];
    $branch_contact_no     = $_POST["branch_contact_no"];
    $branch_email          = $_POST["branch_email"];
    $branch_head_name      = $_POST["branch_head_name"];
    $branch_head_contact_no = $_POST["branch_head_contact_no"];
    $branch_head_email     = $_POST["branch_head_email"];

    $query_insert = " INSERT INTO `branches`(`institute_id`, `branch_name`, `branch_code`, `branch_location`, `branch_contact_no`, `branch_email`, `branch_head_name`, `branch_head_contact_no`, `branch_head_email`) VALUES ('$institute_name','$branch_name','$branch_code','$branch_location','$branch_contact_no','$branch_email','$branch_head_name','$branch_head_contact_no','$branch_head_email')";

    $result2   = mysqli_query($con,$query_insert);
    if($result2)
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

<?php include"../includes/footer.php"; ?>



