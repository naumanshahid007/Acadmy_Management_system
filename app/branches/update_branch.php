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
    $id = $_GET["branch_id"];
      $query  = "SELECT * FROM branches WHERE branch_id = $id ";
      $res    = mysqli_query($con,$query);
      while ($row = mysqli_fetch_array($res)) { ?>
       
    
    <form method="POST" enctype="multipart/form-data" style="background-color: white;">
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
          <input type="text" name="branch_name" value="<?php echo $row["branch_name"]; ?>" class="form-control" placeholder="Enter Name Of Branch" required="">
        </div>
        <div class="col-md-4">
          <label>Branch Code</label>
          <input type="text" name="branch_code" value="<?php echo $row["branch_code"]; ?>" class="form-control" placeholder="Enter Code Of Branch" required="">
        </div>
      </div>
     <div class="row">
        <div class="col-md-4">
          <label>Branch Location</label>
          <input type="text" name="branch_location" value="<?php echo $row["branch_location"]; ?>" class="form-control" placeholder="Enter branch location" required="">
          
        </div>
        <div class="col-md-4">
          <label>Branch Contact No</label>
          <input type="text" name="branch_contact_no" required="" value="<?php echo $row["branch_contact_no"]; ?>" class="form-control" placeholder="Enter branch contact No">
        </div>
        <div class="col-md-4">
          <label>Branch Email</label>
          <input type="email" name="branch_email" required="" value="<?php echo $row["branch_email"]; ?>" class="form-control" placeholder="Enter Email Of branch">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="">Branch Head Name</label>
          <input type="text" name="branch_head_name" required="" value="<?php echo $row["branch_head_name"]; ?>" class="form-control" placeholder="Enter branch head name">
          
        </div>
        <div class="col-md-4">
          <label>Branch Head Contact No</label>
          <input type="text" name="branch_head_contact_no" required="" value="<?php echo $row["branch_head_contact_no"]; ?>" class="form-control" placeholder="Enter head Contact No">
        </div>
        <div class="col-md-4">
          <label>Branch Head Email</label>
          <input type="email" name="branch_head_email"required="" value="<?php echo $row["branch_head_email"]; ?>" class="form-control" placeholder="Enter branch head email">
        </div>
      </div>
      <?php  }
    ?><br>
      <div class="row">
        <div class="col-md-1 ">
          <a href="index.php" class="btn btn-danger">Cancle</a>
      </div>
      <div class="col-md-1">
          <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
    </div>
    </form>
<?php
  if(isset($_POST["update"]))
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

   $query_update = "  UPDATE `branches` SET `institute_id`='$institute_name',`branch_name`='$branch_name',`branch_code`='$branch_code',`branch_location`='$branch_location',`branch_contact_no`='$branch_contact_no',`branch_email`='$branch_email',`branch_head_name`='$branch_head_name',`branch_head_contact_no`='$branch_head_contact_no',`branch_head_email`='$branch_head_email' WHERE branch_id = '$id' ";
   




    $result   = mysqli_query($con,$query_update);
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