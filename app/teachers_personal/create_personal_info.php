<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Teacher</h3>
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">

      <!-- row 1 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Name</label>
          <input type="text" name="teacher_name" class="form-control" required="required" placeholder="Teacher Name">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Father Name</label>
          <input type="text" name="teacher_father_name" class="form-control" placeholder="Teacher Father Name">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher CNIC</label>
          <input type="cnic" name="teacher_cnic" class="form-control" data-inputmask='"mask": "99999-9999999-9"' data-mask required="" placeholder="Teacher CNIC no ">
        </div>
       
      </div>
      <!-- row 1 close here -->

      <!-- row 2 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Contact</label>
          <input type="text" name="teacher_contact_no" class="form-control" data-inputmask='"mask": "+99(999)-9999999"' data-mask required="" placeholder="Teacher Contact No">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Email</label>
          <input type="email" name="teacher_email" class="form-control" placeholder="Teacher email Adddress" required="">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Gender</label>
          <select name="teacher_gender" class="form-control">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

      </div>
      <!-- row 2 close here -->

      <!-- row 3 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Martial Status</label>
          <select name="teacher_marital_status" class="form-control">
            <option value="Married">Married</option>
            <option value="Single">Single</option>
          </select>
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Qualification</label>
          <input type="text" name="teacher_qualification" class="form-control" placeholder="Qualification of teacher">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Joining Date</label>
          <input type="date" name="teacher_joining_date" class="form-control">
        </div>
        
      </div>
      <!-- row 3 close here -->

      <!-- row 4 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Salary</label>
          <input type="text" name="teacher_salary" class="form-control" placeholder="Teacher Salary">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Photo</label>
          <input type="file" name="teacher_picture" class="form-control">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Permanent Address</label>
          <textarea name="teacher_permanent_address" class="form-control" rows="1" placeholder="Teacher Permanent Address">
          </textarea>
        </div>
        
      </div>
      <!-- row 4 close here -->
     
      <br>

      <!-- row 5 start here -->
      <div class="row">

        <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-xs" name="submit"><i class="glyphicon glyphicon-save"></i> Save
          </button>&nbsp;
          <a href="index.php" title="Go to main page" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i>  Cancel</a>
        </div>
      
      </div>
      <!-- row 5 close here -->
    </form>
    </div>







<?php
  if(isset($_POST["submit"]))
  {
    $teacher_name               = $_POST["teacher_name"];
    $teacher_father_name        = $_POST["teacher_father_name"];
    $teacher_cnic               = $_POST["teacher_cnic"];
    $teacher_contact_no            = $_POST["teacher_contact_no"];
    $teacher_email              = $_POST["teacher_email"];
    $teacher_gender             = $_POST["teacher_gender"];
    $teacher_marital_status     = $_POST["teacher_marital_status"];
    $teacher_qualification      = $_POST["teacher_qualification"];
    $teacher_joining_date       = $_POST["teacher_joining_date"];
    $teacher_salary             = $_POST["teacher_salary"];
    $teacher_permanent_address  = $_POST["teacher_permanent_address"];
    $filename                   = $_FILES["teacher_picture"]['name'];
    $tempname                   = $_FILES["teacher_picture"]['tmp_name'];
    $ext                        = pathinfo($filename, PATHINFO_EXTENSION);
    $size                       = $_FILES["teacher_picture"]["size"]; 
    $folder                     ="uploads/".$filename;
      
    move_uploaded_file($tempname, $folder);

    $teacherinsert = "INSERT INTO `teacher_personal_info`(`teacher_name`, `teacher_father_name`, `teacher_cnic`, `teacher_email`, `teacher_contact_no`, `teacher_gender`, `teacher_permanent_address`, `teacher_qualification`, `teacher_marital_status`, `teacher_joining_date`, `teacher_salary`, `teacher_picture`) VALUES ('$teacher_name','$teacher_father_name','$teacher_cnic','$teacher_email','$teacher_contact_no','$teacher_gender','$teacher_permanent_address','$teacher_qualification','$teacher_marital_status','$teacher_joining_date','$teacher_salary', '$folder')";


    $teacherresult   = mysqli_query($con, $teacherinsert);
    if($teacherresult)
      {
        echo "<script type='text/javascript'>window.location='index.php'</script>";
      } 
      else{
        echo "Not inserted...";
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
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>


