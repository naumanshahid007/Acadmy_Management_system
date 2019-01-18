  <?php include("../includes/header.php"); 
  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: white;">    
      <!-- Main content -->
      
      <div class="container-fluid">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Institute</h3><br>
        <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="">Institute Name</label>
            <input type="text" required="" name="institute_name" class="form-control" placeholder="Enter Name of institute">
            
          </div>
          <div class="col-md-4 form-group">
            <label>Institutes Description</label>
            <input type="text" required="" name="institute_description" class="form-control" placeholder="Enter Description Of Institute">
          </div>
          <div class="col-md-4 form-group">
            <label>Institutes Location</label>
            <input type="text" required="" name="institute_location" class="form-control" placeholder="Enter Location Of Institute">
          </div>
        </div>
       <div class="row">
          <div class="col-md-4 form-group">
            <label for="">Institute Picture</label>
            <input type="file" name="profile" class="form-control" placeholder="Enter Npicture of institute" required="">
            
          </div>
          <div class="col-md-4 form-group">
            <label>Institutes Account No</label>
            <input type="text" name="institute_account_no" class="form-control" placeholder="Enter Description Of Institute">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4">
            <button type="submit" class="btn btn-info" name="submit">  <i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
          <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
          </div>
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

  <?php include"../includes/footer.php"; ?>



