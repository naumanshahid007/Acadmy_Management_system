<?php include("../includes/header.php"); 
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
       <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Subjects Details</h3>
    <!-- Main content -->
<div class="box-body well" style="border-top:1px solid #3c8dbc;">
    
      <a href="create_subject.php" class="btn btn-success" style="font-size: 15px; border-radius: 10px;"><i class="glyphicon glyphicon-plus-sign"></i> Create Subject</a><hr>
    
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject Name</th>
                  
                  <th>Subject Description</th>
                  <th>Subject Fee</th>
                  <th>Class</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
               //Query to show subject 
                $query_show = "SELECT * FROM subjects WHERE delete_status = 1 ";
                $result     = mysqli_query($con,$query_show);
                while ($row = mysqli_fetch_array($result)) {
                  $classID = $row['class_id']; 
                  //Query
                  $class = "SELECT class_name FROM classes WHERE class_id = $classID";
                  $classResult     = mysqli_query($con,$class);
                  $classes = mysqli_fetch_array($classResult); ?>
                  <tr>
                    <td><?php error_reporting(0); echo $row['subject_name'] ;?></td>
                    <td><?php error_reporting(0); echo $row['subject_description'] ;?></td>
                    <td><?php error_reporting(0); echo $row['subject_fee'] ;?></td>
                    <td><?php error_reporting(0); echo $classes['class_name'];?></td>
                    <td><a href="update_subject.php?subject_id=<?php echo $row['subject_id'];?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                      <a href="delete_subject.php?subject_id=<?php echo $row['subject_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this this');"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
                  </tr>
                  <?php
                  
                  // class while loop close...
                }
                // subject while loop close...
               ?>
                </tbody>
                <!-- <tfoot>
                <tr>
                 <th>Class Name</th>
                 
                  <th>Class Description</th>
                  
                  <th>Action</th>
                </tr>
                </tfoot> -->
              </table>
              </div>
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