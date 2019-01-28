<?php include("../includes/header.php"); 
      
?>
<?php 

    // get `teacher_id` from teacher personal `index.php`

    $teacherId = $_GET['teacher_id'];

    // fetch data of a specific teacher againts selected `teacher_id` that is `teacherId`

    $teacher        = "SELECT * FROM teacher_personal_info
                      WHERE teacher_id = '$teacherId' 
                      AND delete_status = 1";
    $teacherresult  = mysqli_query($con,$teacher);
    $showteacher    = mysqli_fetch_assoc($teacherresult);


     ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Main content -->       
    <div class="container-fluid">
       <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Teacher Personal Information</h3><br>
    <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
     <!-- row 1 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Name</label>
          <input type="text" name="teacher_name" class="form-control" required="required" value="<?php echo $showteacher['teacher_name'];?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Father Name</label>
          <input type="text" name="teacher_father_name" class="form-control" value="<?php echo $showteacher['teacher_father_name'];?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher CNIC</label>
          <input type="cnic" name="teacher_cnic" class="form-control" value="<?php echo $showteacher['teacher_cnic'];?>">
        </div>
       
      </div>
      <!-- row 1 close here -->

      <!-- row 2 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Contact</label>
          <input type="text" name="teacher_contact_no" class="form-control" value="<?php echo $showteacher['teacher_contact_no'];?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Email</label>
          <input type="email" name="teacher_email" class="form-control" value="<?php echo $showteacher['teacher_email'];?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Gender</label>
          <select name="teacher_gender" class="form-control">

            <option value="<?php echo $showteacher['teacher_gender']; ?>"><?php echo $showteacher['teacher_gender']; ?></option>
            <?php if($showteacher['teacher_gender'] != "Male") { ?>
            <option value="Male">Male</option>
            <?php } else { ?>
            <option value="Female">Female</option>
          <?php } ?>

          </select>
        </div>

      </div>
      <!-- row 2 close here -->

      <!-- row 3 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Martial Status</label>
          <select name="teacher_marital_status" class="form-control">
            <option value="<?php echo $showteacher['teacher_marital_status']; ?>"><?php echo $showteacher['teacher_marital_status']; ?></option>
             <?php if($showteacher['teacher_marital_status'] != "Married") { ?>
            <option value="Married">Married</option>
            <?php } else { ?>
            <option value="Single">Singel</option>
          <?php } ?>
          </select>
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Qualification</label>
          <input type="text" name="teacher_qualification" class="form-control" value="<?php echo $showteacher['teacher_qualification']; ?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Joining Date</label>
          <input type="date" name="teacher_joining_date" class="form-control" value="<?php echo $showteacher['teacher_joining_date'];?>">
        </div>
        
      </div>
      <!-- row 3 close here -->

      <!-- row 4 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Teacher Salary</label>
          <input type="text" name="teacher_salary" class="form-control" value="<?php echo $showteacher['teacher_salary'];?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Photo</label>
          <input type="file" name="teacher_picture" class="form-control">
        </div>

        <div class="col-md-4 form-group">
          <label>Teacher Permanent Address</label>
          <textarea name="teacher_permanent_address" class="form-control" rows="3" ><?php echo $showteacher['teacher_permanent_address'];?>
          </textarea>
        </div>
        
      </div>
      <!-- row 4 close here -->
     
      <br>
      <br>

      <!-- row 5 start here -->
      <div class="row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-xs" name="update">
            <i class="glyphicon glyphicon-ok"></i> Update</button> &nbsp;
          <a href="index.php" class="btn btn-danger btn-xs"> <i class="glyphicon glyphicon-remove"></i>   Cancle</a>
        </div>
      </div>
    <!-- row 5 start here -->

    </form>
  </div>
<?php
  if(isset($_POST["update"]))
  {
    $teacher_name               = $_POST["teacher_name"];
    $teacher_father_name        = $_POST["teacher_father_name"];
    $teacher_cnic               = $_POST["teacher_cnic"];
    $teacher_contact_no         = $_POST["teacher_contact_no"];
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
      
    if($filename){
    move_uploaded_file($tempname, $folder);
    

    $teacherupdate = " UPDATE teacher_personal_info SET teacher_name='$teacher_name',teacher_father_name='$teacher_father_name',teacher_cnic='$teacher_cnic',teacher_contact_no='$teacher_contact_no',teacher_email='$teacher_email', teacher_gender = '$teacher_gender', teacher_marital_status = '$teacher_marital_status', teacher_qualification = '$teacher_qualification', teacher_joining_date = '$teacher_joining_date', teacher_salary = '$teacher_salary', teacher_permanent_address = '$teacher_permanent_address', teacher_picture = '$folder' WHERE teacher_id = '$teacherId' ";
    $teacherresult   = mysqli_query($con,$teacherupdate);
    if($teacherresult)
    {
      echo "<script type='text/javascript'>window.location='index.php'</script>";
    }
 }
 else
 {
   $teacherupdate = " UPDATE teacher_personal_info SET teacher_name='$teacher_name',teacher_father_name='$teacher_father_name',teacher_cnic='$teacher_cnic',teacher_contact_no ='$teacher_contact_no',teacher_email='$teacher_email', teacher_gender = '$teacher_gender', teacher_marital_status = '$teacher_marital_status', teacher_qualification = '$teacher_qualification', teacher_joining_date = '$teacher_joining_date', teacher_salary = '$teacher_salary', teacher_permanent_address = '$teacher_permanent_address' WHERE teacher_id = '$teacherId'";
    $teacherresult   = mysqli_query($con,$teacherupdate);
    if($teacherresult)
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


<?php include"../includes/footer.php"; ?>
