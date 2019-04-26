  <?php include("../includes/header.php"); 

    // get assign_teacher_id
    $assign_teacher_id = $_GET["teacher_assign_id"];

    // query to fetch `teacher-name` against selected `$assign_teacher-id` from `teacher_personal_info` table
    $teacher = "SELECT t.teacher_id ,t.teacher_name FROM teacher_personal_info as t 
    INNER JOIN assign_teacher as a ON t.teacher_id = a.teacher_id WHERE a.assign_teacher_id = $assign_teacher_id";
    $teacherresult     = mysqli_query($con,$teacher);
    $showteacher = mysqli_fetch_assoc($teacherresult);
    $teacherid = $showteacher['teacher_id'];
    $teacherName = $showteacher['teacher_name'];


    $teachers = "SELECT * FROM teacher_personal_info WHERE teacher_id !='$teacherid' AND delete_status = 1";
    $teachersresult = mysqli_query($con,$teachers);

    // query to fetch `class_name` against selected `$assign_teacher-id` from `class` table
    $class = "SELECT c.class_id , c.class_name FROM classes as c
    INNER JOIN assign_teacher as a ON c.class_id = a.class_id WHERE a.assign_teacher_id = '$assign_teacher_id'";

    $classresult     = mysqli_query($con,$class);
    $showclass = mysqli_fetch_assoc($classresult);
    $classid = $showclass['class_id'];
    $className = $showclass['class_name'];

    $classes = "SELECT * FROM classes WHERE class_id !='$classid' AND delete_status = 1";
    $classesresult = mysqli_query($con,$classes);

  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Main content -->

      <div class="container-fluid">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Assign Teacher</h3><br>
        <!-- <?php echo $teacherName  . $teacherid; ?> -->
        <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
        <!-- row 1 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Select Teacher</label>
          <select name="teacher_id" class="form-control">
            <option value="<?php echo $teacherid; ?>"><?php echo $teacherName; ?></option>

            <?php 
            while($showteach = mysqli_fetch_assoc($teachersresult)){ ?>
            <option value="<?php echo $showteach['teacher_id']; ?>"><?php echo $showteach['teacher_name']; ?></option>
            <?php }?>
          </select>
        </div>

        <div class="col-md-4 form-group">
          <label>Select Class</label>
          <select name="class_id" class="form-control">
            <option value="<?php echo $classid; ?>"><?php echo $className; ?></option>
             <?php 
            while($showclasses = mysqli_fetch_assoc($classesresult)){ ?>
            <option value="<?php echo $showclasses['class_id']; ?>"><?php echo $showclasses['class_name']; ?></option>
            <?php }?>
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
            <?php while($groupsrow = mysqli_fetch_assoc($groupsresult)){ 

               ?>
            <option value="<?php echo $groupsrow['group_id']; ?>">
              <?php echo $groupsrow['group_info']; ?>
            </option>
            <?php 
              
            } ?>
          </select>
        </div>
       
      </div>
      <!-- row 1 close here -->
        <br>
        <div class="row">
          <div class="col-md-4">
          <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-ok"></i> Update</button>&nbsp;
          <a href="index.php" title="Go to main page" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancel</a>
          </div>
        </div>
      </form>
      <?php
        if (isset($_POST["submit"])) {
          $teacher_id=$_POST["teacher_id"];
          $class_id=$_POST["class_id"];
          $group_id=$_POST["group_id"];
          
          $sql_result=mysqli_query($con,"UPDATE assign_teacher SET teacher_id=$teacher_id,class_id='$class_id',group_id=$group_id WHERE assign_teacher_id=$assign_teacher_id"); 
          if ($sql_result) {
            echo "<script> window.location='index.php'</script>";
          }
          }
      ?>
      </div>







 
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



