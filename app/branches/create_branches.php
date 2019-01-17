<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h2>Create new Branch</h2>
      <hr>
    </section>
    
    <!-- Main content -->
    <br><BR>
    <div class="container-fluid">
      <form method="POST" style="background-color: white;" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
          <label>Branch Name</label>
          <input type="text" name="branch_name" class="form-control" placeholder="Enter Name Of Branch">
        </div>
        <div class="col-md-4">
          <label>Branch Code</label>
          <input type="text" name="branch_code" class="form-control" placeholder="Enter Code Of Branch">
        </div>
      </div>
     <div class="row">
        <div class="col-md-4">
          <label>Branch Location</label>
          <input type="text" name="branch_location" class="form-control" placeholder="Enter branch location">
          
        </div>
        <div class="col-md-4">
          <label>Branch Contact No</label>
          <input type="text" name="branch_contact_no" class="form-control" placeholder="Enter branch contact No">
        </div>
        <div class="col-md-4">
          <label>Branch Email</label>
          <input type="email" name="branch_email" class="form-control" placeholder="Enter Email Of branch">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="">Branch Head Name</label>
          <input type="text" name="branch_head_name" class="form-control" placeholder="Enter branch head name">
          
        </div>
        <div class="col-md-4">
          <label>Branch Head Contact No</label>
          <input type="text" name="branch_head_contact_no" class="form-control" placeholder="Enter head Contact No">
        </div>
        <div class="col-md-4">
          <label>Branch Head Email</label>
          <input type="email" name="branch_head_email" class="form-control" placeholder="Enter branch head email">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-1"></div>
        <button type="submit" class="btn btn-info" name="submit"><i  class="fa fa-plus-square"></i> Add Group</button>
        <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
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

    $query_insert = " INSERT INTO `branches`(`institute_id`, `branch_name`, `branch_code`, `branch_location`, `branch_contact_no`, `branch_email`, `branch_head_name`, `branch_head_contact_no`, `branch_head_email`) VALUES ('$institute_name','$branch_name','$branch_code','$branch_location','$branch_contact_no','$branch_email','$branch_head_name','$branch_head_contact_no','$branch_head_email') ";

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

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include"../includes/footer.php"; ?>



