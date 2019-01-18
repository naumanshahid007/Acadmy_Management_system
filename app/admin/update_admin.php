<?php include("../includes/header.php"); 
      
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Main content -->

    <?php
    $id = $_GET["admin_id"];
      $query  = "SELECT * FROM manage_admin WHERE admin_id = $id ";
      $res    = mysqli_query($con,$query);
      while ($row = mysqli_fetch_array($res)) { ?>
       
    <div class="container-fluid">
       <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Admin</h3><br>
    <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
      <div class="row">
        <div class="col-md-4 form-group">
          <label>User Name</label>
          <input type="text" class="form-control" value="<?php  echo $row['username'] ;?>" name="username" required="">
        </div>
        <div class="col-md-4 form-group">
          <label>Password</label>
          <input type="Password" class="form-control" value="<?php  echo $row['password'] ;?>"  name="password" required="">
        </div>
        <div class="col-md-4 form-group">
          <label>Email</label>
          <input type="email" class="form-control" value="<?php  echo $row['email'] ;?>"  name="email" required="">
        </div>
      </div>
    <div class="row">
        <div class="col-md-4 form-group">
          <label>Contact</label>
          <input type="text" class="form-control" value="<?php  echo $row['contact'] ;?>"  name="contact" data-inputmask='"mask": "+99(999)-9999999"' data-mask required="">
        </div>
        <div class="col-md-4 form-group">
          <label>User Profile</label>
          <input type="file" class="form-control"  name="profile" required="">
        </div>
      </div>

      <?php  }
    ?><br>
      <div class="row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary" name="update">
            <i class="glyphicon glyphicon-ok"></i> Update</button> &nbsp;
          <a href="manage_admin.php" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i>   Cancle</a>
      </div>
    </div>
    </form>
  </div>
<?php
  if(isset($_POST["update"]))
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email    = $_POST["email"];
    $contact  = $_POST["contact"];
    $filename = $_FILES["profile"]['name'];
    $tempname = $_FILES["profile"]['tmp_name'];
    $ext      = pathinfo($filename, PATHINFO_EXTENSION);
    $size     = $_FILES["profile"]["size"]; 
    $folder   ="uploads/".$filename;
    if ($filename) {
      move_uploaded_file($tempname, $folder);
    

    $query_update = " UPDATE manage_admin SET username='$username',password='$password',email='$email',picture='$folder',contact='$contact' WHERE admin_id = $id ";
    $result   = mysqli_query($con,$query_update);
    if($result)
    {
      echo "<script type='text/javascript'>window.location='manage_admin.php'</script>";
    }
 }
 else
 {
   $query_update = " UPDATE manage_admin SET username='$username',password='$password',email='$email',contact='$contact' WHERE admin_id = $id ";
    $result   = mysqli_query($con,$query_update);
    if($result)
    {
     echo "<script type='text/javascript'>window.location='manage_admin.php'</script>";
    }
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


<?php include"../includes/footer.php"; ?>
