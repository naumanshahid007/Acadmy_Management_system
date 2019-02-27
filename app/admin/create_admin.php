  <?php include("../includes/header.php"); 
  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="container-fluid">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Admin</h3><br>
        <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">
        <div class="row" >
          <div class="col-md-4 form-group">
            <label>User Name</label>
            <input type="text" class="form-control" name="username" placeholder="User Name" required="">
            <?php 
              if (isset($err_user)) {
               echo $err_user;
              }

            ?>
            
          </div>
          <div class="col-md-4 form-group">
            <label>Password</label>
            <input type="Password" class="form-control" name="password" placeholder="Password" required="">
          </div>
          <div class="col-md-4 form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email Address" required="" >
            <?php 
              if (isset($err_email)) {
               echo $err_email;
              }

            ?>
          </div>

        </div>
        <div class="row">
        <div class="col-md-4 form-group">
          <label>Contact</label>
          <input type="text" class="form-control"   name="contact" data-inputmask='"mask": "+99(999)-9999999"' data-mask required="">
        </div>
        <div class="col-md-4 form-group">
          <label>User Photo</label>
          <input type="file" class="form-control"  name="profile" required="">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
        <a href="manage_admin.php" title="Go to main page" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
        </div>
      </div>



  <!-- Content Wrapper. Contains page content -->



  <?php
    if(isset($_POST["save"]))
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
      
      move_uploaded_file($tempname, $folder);
      $query_insert = "INSERT INTO manage_admin(username, password, email,picture,contact) VALUES ('$username','$password','$email','$folder','$contact')";
      $result   = mysqli_query($con,$query_insert);
      if($result)
        {
          echo "<script type='text/javascript'>window.location='manage_admin.php'</script>";
        } 
      }


  ?>

  <!-- jQuery 3 -->
  <?php include"../includes/footer.php"; ?>



  <!-- Page script -->
  <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
  
   
