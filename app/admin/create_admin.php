<<<<<<< HEAD

=======
>>>>>>> 4a50eb5258d388d069afd40b448f2da4f7d6bab1
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
<<<<<<< HEAD
        </div>
        <div class="row">
        <div class="col-md-4 form-group">
          <label>Contact</label>
          <input type="text" class="form-control" value="<?php  echo $row['contact'] ;?>"  name="contact" data-inputmask='"mask": "+99(999)-9999999"' data-mask required="">
        </div>
        <div class="col-md-4 form-group">
          <label>User Profile</label>
          <input type="file" class="form-control"  name="profile" required="">
=======
>>>>>>> 4a50eb5258d388d069afd40b448f2da4f7d6bab1
        </div>
      </div>
      <<button type=""></button>



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
