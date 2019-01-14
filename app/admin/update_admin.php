<?php include("../includes/header.php"); 
      
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      
    </section>
    
    <!-- Main content -->
    <br><BR>
    <?php
    $id = $_GET["admin_id"];
      $query  = "SELECT * FROM manage_admin WHERE admin_id = $id ";
      $res    = mysqli_query($con,$query);
      while ($row = mysqli_fetch_array($res)) { ?>
       
    
    <form method="POST" enctype="multipart/form-data" style="background-color: white;">
      <div class="row">
        <div class="col-md-4 col-md-offset-1">
          <label>User Name</label>
          <input type="text" class="form-control" value="<?php  echo $row['username'] ;?>" name="username">
        </div>
        <div class="col-md-4">
          <label>Password</label>
          <input type="Password" class="form-control" value="<?php  echo $row['password'] ;?>"  name="password">
        </div>
      </div>
            <div class="row">
        <div class="col-md-4 col-md-offset-1">
          <label>Email</label>
          <input type="email" class="form-control" value="<?php  echo $row['email'] ;?>"  name="email">
        </div>
        <div class="col-md-4">
          <label>Contact</label>
          <input type="text" class="form-control" value="<?php  echo $row['contact'] ;?>"  name="contact">
        </div>
      </div>
            <div class="row">
        <div class="col-md-8 col-md-offset-1">
          <label>User Profile</label>
          <input type="file" class="form-control"  name="profile">
        </div>
      </div>
      <?php  }
    ?><br>
      <div class="row">
        <div class="col-md-1 col-md-offset-1">
          <a href="manage_admin.php" class="btn btn-danger">Cancle</a>
      </div>
      <div class="col-md-1">
          <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
    </div>
    </form>
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

<!-- jQuery 3 -->
<?php include"../includes/footer.php"; ?>