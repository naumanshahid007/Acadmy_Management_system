<?php include("../includes/header.php"); 
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Classes Details</h3>

    <!-- Main content -->
<div class="box-body well" style="border-top:1px solid #3c8dbc;">
      <a href="create_class.php" class="btn btn-success btn-xs" style="font-size: 15px; border-radius: 10px;"><i class="glyphicon glyphicon-plus-sign"></i> Create class</a><hr> 
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Branch Name</th>
                  <th>Class Name</th>
                  <th>Class Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
                $query_show = "SELECT * FROM classes WHERE delete_status = 1";
                $result     = mysqli_query($con,$query_show);
                
                while ($row = mysqli_fetch_assoc($result)) { 
                $branch_id = $row['branch_id'];
                $branches = "SELECT * FROM branches WHERE branch_id = {$branch_id} AND delete_status = 1";
                $showbranches = mysqli_query($con,$branches);
                $branchname = mysqli_fetch_assoc($showbranches);

                  ?>
                  <tr>
                    <td><?php echo $branchname['branch_name']; ?></td>
                    <td><?php error_reporting(0); echo $row['class_name'] ;?></td>
                    
                    <td><?php error_reporting(0); echo $row['class_description'] ;?></td>
                   
                    <td><a href="update_class.php?class_id=<?php echo $row['class_id'];?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                      <a href="delete_class.php?class_id=<?php echo $row['class_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this this');"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
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