<?php include("../includes/header.php"); 
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Teachers Personal Details</h3>

    <!-- Main content -->
<div class="box-body well"  style="border-top:1px solid #3c8dbc;">
  <a href="create_personal_info.php" class="btn btn-success btn-xs" style="font-size: 15px; border-radius: 10px;"><i class="glyphicon glyphicon-plus-sign"></i> Create Teachers</a><hr>
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Teacher Name</th>
                  <th>Teacher Contact No</th>
                  <th>Teacher Gender</th>
                  <th>Teacher Photo</th>
                  <!-- <th>Teacher Father Name</th>
                  <th>Teacher CNIC</th>
                  <th>Teacher Email</th>
                  <th>Teacher Qualification</th>
                  <th>Teacher Martial Status</th>
                  <th>Teacher Permanent Address</th> -->
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
                
                // Query to dispaly all tearchers from `teacher personal info` table
                $teachers = "SELECT * FROM teacher_personal_info WHERE delete_status = 1";
                $teachersresult     = mysqli_query($con,$teachers);
                while ($showteachers = mysqli_fetch_assoc($teachersresult)) {  
                ?>
                  <tr>

                  <td><?php echo $showteachers['teacher_name']; ?></td>
                  <td><?php echo $showteachers['teacher_contact_no']; ?></td>
                  <td><?php echo $showteachers['teacher_gender']; ?></td>
                  <td><a href="<?php  echo $showteachers['teacher_picture'];?>"><img src="<?php  echo $showteachers['teacher_picture'];?>" class="img-circle" width="50px" height="50px"></a></td> 
                  <td>
                    <a href="view_teacher_personal_info.php?teacher_id=<?php echo $showteachers['teacher_id'];?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View |</a>
                    <a href="update_teacher_personal_info.php?teacher_id=<?php echo $showteachers['teacher_id'];?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit |</a>
                    <a href="delete_teacher_personal_info.php?teacher_id=<?php echo $showteachers['teacher_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this teacher');"><i class="glyphicon glyphicon-trash"></i> Delete |</a>
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