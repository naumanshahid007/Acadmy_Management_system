<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <a href="create_admin.php" class="btn btn-primary">Create Admin</a><br>
      
    </section>
    
    <!-- Main content -->
    <br><BR>
    <form method="POST" style="background-color: white;" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4 col-md-offset-1">
          <label>User Name</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="col-md-4">
          <label>Password</label>
          <input type="Password" class="form-control" name="password">
        </div>
      </div>
            <div class="row">
        <div class="col-md-4 col-md-offset-1">
          <label>Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="col-md-4">
          <label>Contact</label>
          <input type="text" class="form-control" name="contact" data-inputmask='"mask": "+99(999)-9999999"' data-mask>
        </div>
      </div>
            <div class="row">
        <div class="col-md-8 col-md-offset-1">
          <label>User Profile</label>
          <input type="file" class="form-control" name="profile">
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-1 col-md-offset-1">
          <a href="manage_admin.php" class="btn btn-danger">Cancle</a>
      </div>
      <div class="col-md-1">
          <button type="submit" class="btn btn-primary" name="save">Save</button>
      </div>
    </div>
    </form>







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
    if ($username) {
       $query_show = "SELECT * FROM manage_admin WHERE delete_status = 1 AND username='$username' ";
       $result1     = mysqli_query($con,$query_show);
       $row=mysqli_num_rows($result1);
       if ($row>0) {
          $err_user="<font style='color:red'>This username is already exist try another one<font>";
        } 
        elseif($email){

       $query_show = "SELECT * FROM manage_admin WHERE delete_status = 1 AND email='$email' ";
       $result1     = mysqli_query($con,$query_show);
       $row=mysqli_num_rows($result1);
       if ($row>0) {
          $err_email="<font style='color:red'>This email is already exist try another one<font>";
        } 
        if ($filename) {
         if (file_exists($filname)) {
           $err_pic="<font style='color:red'>This file  is already uploaded try another one<font>"; 
         }
        }
        }
    }
    else
    {
    move_uploaded_file($tempname, $folder);
    $query_insert = "INSERT INTO manage_admin(username, password, email,picture,contact) VALUES ('$username','$password','$email','$folder','$contact')";
    $result   = mysqli_query($con,$query_insert);
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
