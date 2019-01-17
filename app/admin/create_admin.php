<<<<<<< HEAD
  <?php include("../includes/header.php"); 
  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: white;">
      <!-- Main content -->
      <div class="container">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Admin</h3><br>
        <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">
        <div class="row" >
          <div class="col-md-4 form-group">
            <label>User Name</label>
            <input type="text" class="form-control" name="username" placeholder="User Name">
            <?php 
              if (isset($err_user)) {
               echo $err_user;
              }

            ?>
            
          </div>
          <div class="col-md-4 form-group">
            <label>Password</label>
            <input type="Password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="col-md-4 form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email Address">
            <?php 
              if (isset($err_email)) {
               echo $err_email;
              }

            ?>
          </div>
=======
<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h2>Create new Admin</h2>
      <hr>
    </section>
    
    <!-- Main content -->
    <br><BR>
    <div class="container-fluid">
      <form method="POST" style="background-color: white;" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <label>User Name</label>
          <input type="text" class="form-control" name="username" placeholder="User Name" required="">
          <?php 
            if (isset($err_user)) {
             echo $err_user;
            }

          ?>
          
        </div>
        <div class="col-md-4">
          <label>Password</label>
          <input required="" type="Password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="col-md-4">
          <label>Email</label>
          <input type="email" required="" class="form-control" name="email" placeholder="Email Address">
          <?php 
            if (isset($err_email)) {
             echo $err_email;
            }

          ?>




        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label>Contact</label>
          <input type="text" class="form-control" name="contact" data-inputmask='"mask": "+99(999)-9999999"' data-mask placeholder="Phone No" required="">
        </div>
        <div class="col-md-4">
          <label>User Profile</label>
          <input type="file" class="form-control" name="profile" required="">
          <?php 
            if (isset($err_pic)) {
              echo $err_pic;
            }
          ?>
>>>>>>> 32d7723ea6a5df8903d566d9f7744de7a4d6bddb
        </div>
        <div class="row">
          <div class="col-md-4 form-group">
            <label>Contact</label>
            <input type="text" class="form-control" name="contact" data-inputmask='"mask": "+99(999)-9999999"' data-mask placeholder="Phone No">
          </div>
          <div class="col-md-4 form-group">
            <label>User Profile</label>
            <input type="file" class="form-control" name="profile">
            <?php 
              if (isset($err_pic)) {
                echo $err_pic;
              }
            ?>
          </div>
          <div class="col-md-4 form-group">
            
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4" style="padding-left: 15px;">
            <button type="submit" class="btn btn-primary" name="save"> <i class="glyphicon glyphicon-save"></i> Save</button> &nbsp;
            <a href="manage_admin.php" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancle</a>
          </div>
        </div>
      </form>
      </div>


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



  <!-- Page script -->
  <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
