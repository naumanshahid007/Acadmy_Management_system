<?php include("../includes/header.php"); 
      
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
   
    <!-- Main content -->
    
    <?php
    $id = $_GET["institute_id"];
      $query  = "SELECT * FROM institutes WHERE institute_id = $id ";
      $res    = mysqli_query($con,$query);
      while ($row = mysqli_fetch_array($res)) { ?>
       
    <div class="container">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Institute</h3><br>
    <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
      <div class="row">
        <div class="col-md-4 form-group">
          <label>Institutes Name</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_name'] ;?>" name="institute_name">
        </div>
        <div class="col-md-4 form-group">
          <label>institute Description</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_description'] ;?>"  name="institute_description">
        </div>
        <div class="col-md-4 form-group">
          <label>institute Location</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_location'] ;?>"  name="institute_location">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label>Institute Account No</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_account_no'] ;?>"  name="institute_account_no">
        </div>
        <div class="col-md-4 form-group">
          <label>Institutes Profile</label>
          <input required="" type="file" class="form-control"  name="profile">
        </div>
      </div>
      <?php  }
    ?><br>
      <div class="row">
        <div class="col-md-4 ">
          <button type="submit" class="btn btn-primary" name="update"><i class="glyphicon glyphicon-ok"></i> Update</button> &nbsp;
          <a href="index.php" class="btn btn-danger"><i class="glyphicon glyphicon-remove" ></i> Cancle</a>
      </div>
    </div>
    </form>
  </div>
<?php
  if(isset($_POST["update"]))
  {
    $institute_name  = $_POST["institute_name"];
    $institute_description = $_POST["institute_description"];
    $institute_location    = $_POST["institute_location"];
    $institute_account_no  = $_POST["institute_account_no"];
    $filename = $_FILES["profile"]['name'];
    $tempname = $_FILES["profile"]['tmp_name'];
    $ext      = pathinfo($filename, PATHINFO_EXTENSION);
    $size     = $_FILES["profile"]["size"]; 
    $folder   ="uploads/".$filename;
    if ($filename) {
      move_uploaded_file($tempname, $folder);
    

    $query_update = " UPDATE institutes SET institute_name='$institute_name',institute_description='$institute_description',institute_location='$institute_location',institute_picture='$folder',institute_account_no='$institute_account_no' WHERE institute_id = $id ";
    $result   = mysqli_query($con,$query_update);
    if($result)
    {
      echo "<script type='text/javascript'>window.location='index.php'</script>";
    }
 }
 else
 {
   $query_update = " UPDATE institutes SET institute_name='$institute_name',institute_description='$institute_description',institute_location='$institute_location',institute_account_no='$institute_account_no' WHERE institute_id = $id ";
    $result   = mysqli_query($con,$query_update);
    if($result)
    {
     echo "<script type='text/javascript'>window.location='index.php'</script>";
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
</script>
</body>
</html