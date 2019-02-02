<?php include("../includes/header.php"); 
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Teachers Assign Details</h3>

    <!-- Main content -->
<div class="box-body well"  style="border-top:1px solid #3c8dbc;">
  <a href="create_teacher_assign.php" class="btn btn-success btn-xs" style="font-size: 15px; border-radius: 10px;"><i class="glyphicon glyphicon-plus-sign"></i> Assign New Teachers</a><hr>
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Teacher Name</th>
                  <th>Class</th>
                  <th>Group Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
                
                // Query to dispaly all tearchers from `assign_teacher` table

                $teachers = "SELECT * FROM assign_teacher WHERE delete_status = 1";
                $teachersresult     = mysqli_query($con,$teachers);

                while($showteachers = mysqli_fetch_assoc($teachersresult)) {

                $teacherID    = $showteachers['teacher_id'];
                $classID      = $showteachers['class_id'];
                $groupID      = $showteachers['group_id']; 

                // Query to display `techer name` from `teacher_personal_info` by selected `teacherID`
                $teacher_name = "SELECT teacher_name FROM teacher_personal_info WHERE teacher_id = '$teacherID' AND delete_status = 1";
                $teacherresult = mysqli_query($con,$teacher_name);
                $show = mysqli_fetch_assoc($teacherresult);

                // Query to display `class name` from `classes` by selected `classID`
                $class_name = "SELECT class_name FROM classes WHERE class_id = '$classID' AND delete_status = 1";
                $classresult = mysqli_query($con,$class_name);
                $showclass = mysqli_fetch_assoc($classresult);

                // Query to display `group info` from `groups` by selected `groupID`
                $group_name = "SELECT group_info FROM groups WHERE group_id = '$groupID' AND delete_status = 1";
                $groupresult = mysqli_query($con,$group_name);
                $showgroupinfo = mysqli_fetch_assoc($groupresult);


                ?>
                  <tr>

                  <td><?php echo $show['teacher_name']; ?></td>
                  <td><?php echo $showclass['class_name']; ?></td>
                  <td><?php echo $showgroupinfo['group_info']; ?></td>
                  <td>
                    
                    <a href="update_teacher_assign.php?teacher_assign_id=<?php echo $showteachers['assign_teacher_id'];?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit |</a>
                    <a href="delete_teacher_assign.php?teacher_assign_id=<?php echo $showteachers['assign_teacher_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete the assign teacher');"><i class="glyphicon glyphicon-trash"></i> Delete |</a>
                  </td>

                  </tr>
                  <?php
                }
               ?>
                </tbody>
              </table>
              </div>
          </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.0 -->
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