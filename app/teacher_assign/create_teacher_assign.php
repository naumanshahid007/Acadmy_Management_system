<?php include("../includes/header.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Assign New Teacher</h3>
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">

      <!-- row 1 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Select Teacher</label>
          <?php 
  
          // Query to fetch all teachers from `teacher_personal_info` table

          $teachers = "SELECT * FROM  teacher_personal_info WHERE delete_status = 1";
          $teachersresult = mysqli_query($con,$teachers);


          ?>
          <select name="teacher_id" class="form-control">
            <?php while($teachersrow = mysqli_fetch_assoc($teachersresult)){ ?>
            <option value="<?php echo $teachersrow['teacher_id']; ?>">
              <?php echo $teachersrow['teacher_name']; ?>
            </option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-4 form-group">
          <label>Select Class</label>
          <?php 
  
          // Query to fetch all classes from `classes` table

          $classes = "SELECT * FROM  classes WHERE delete_status = 1";
          $classesresult = mysqli_query($con,$classes);


          ?>
          <select name="class_id" class="form-control">
            <?php while($classesrow = mysqli_fetch_assoc($classesresult)){ ?>
            <option value="<?php echo $classesrow['class_id']; ?>">
              <?php echo $classesrow['class_name']; ?>
            </option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-4 form-group">
          <label>Select Group</label>
          <?php 
  
          // Query to fetch all groups from `groups` table

          $groups = "SELECT * FROM  groups WHERE delete_status = 1";
          $groupsresult = mysqli_query($con,$groups);


          ?>
          <select name="group_id" class="form-control">
            <?php while($groupsrow = mysqli_fetch_assoc($groupsresult)){ ?>
            <option value="<?php echo $groupsrow['group_id']; ?>">
              <?php echo $groupsrow['group_info']; ?>
            </option>
            <?php } ?>
          </select>
        </div>
       
      </div>
      <!-- row 1 close here -->

      
     
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
    
    $teacher_id   = $_POST["teacher_id"];
    $class_id     = $_POST["class_id"];
    $group_id     = $_POST["group_id"];
    

    $teacherinsert = "INSERT INTO `assign_teacher` (`teacher_id`, `class_id`, `group_id`) VALUES ('$teacher_id','$class_id','$group_id')";


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



