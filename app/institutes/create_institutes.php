<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h2>Create new Institutes</h2>
      <hr>
    </section>
    
    <!-- Main content -->
    <br><BR>
    <div class="container-fluid">
      <form method="POST" style="background-color: white;" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <label for="">Institute Name</label>
          <input type="text" name="institute_name" class="form-control" placeholder="Enter Name of institute">
          
        </div>
        <div class="col-md-4">
          <label>Institutes Description</label>
          <input type="text" name="institute_description" class="form-control" placeholder="Enter Description Of Institute">
        </div>
        <div class="col-md-4">
          <label>Institutes Location</label>
          <input type="text" name="institute_location" class="form-control" placeholder="Enter Location Of Institute">
        </div>
      </div>
     <div class="row">
        <div class="col-md-4">
          <label for="">Institute Picture</label>
          <input type="file" name="profile" class="form-control" placeholder="Enter Npicture of institute">
          
        </div>
        <div class="col-md-4">
          <label>Institutes Account No</label>
          <input type="text" name="institute_account_no" class="form-control" placeholder="Enter Description Of Institute">
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
    $institute_description = $_POST["institute_description"];
    $institute_location    = $_POST["institute_location"];
    $institute_account_no  = $_POST["institute_account_no"];
    $filename              = $_FILES["profile"]['name'];
    $tempname              = $_FILES["profile"]['tmp_name'];
    $ext                   = pathinfo($filename, PATHINFO_EXTENSION);
    $size                  = $_FILES["profile"]["size"]; 
    $folder                ="uploads/".$filename;
    move_uploaded_file($tempname, $folder);
    $query_insert = "INSERT INTO institutes(institute_name, institute_description, institute_location, institute_picture, institute_account_no) VALUES ('$institute_name','$institute_description','$institute_location','$folder','$institute_account_no')";
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



