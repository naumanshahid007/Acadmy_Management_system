<?php include("../includes/header.php"); 
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Branch Details</h3>
    
    <!-- Main content -->
  <div class="box-body well" style="border-top:1px solid #3c8dbc;">
       <a href="create_branches.php" class="btn btn-success" style="font-size: 15px; border-radius: 10px;"><i class="glyphicon glyphicon-plus-sign"></i> Create Branch</a><br><hr>
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
             
                  <th>Branch Name</th>
                  <th>Branch Code</th>
                  <th>Branch Location</th>
                  <th>Branch Contact No</th>
                  <th>Branch Email</th>
                  <th>Branch Head Name</th>
                  <th>Br. Head Contact No</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
                $query_show = "SELECT * FROM `branches` WHERE delete_status = 1 ";
                $result     = mysqli_query($con,$query_show);
                while ($row = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?php error_reporting(0); echo $row['branch_name'] ;?></td>
                    <td><?php error_reporting(0); echo $row['branch_code'] ;?></td>
                    <td><?php error_reporting(0); echo $row['branch_location'] ;?></td>
                    <td><?php error_reporting(0); echo $row['branch_contact_no'] ;?></td>
                    <td><?php error_reporting(0); echo $row['branch_email'] ;?></td>
                    <td><?php error_reporting(0); echo $row['branch_head_name'] ;?></td>
                    <td><?php error_reporting(0); echo $row['branch_head_contact_no'] ;?></td>
                    <td>
                      <a href="update_branch.php?branch_id=<?php echo $row['branch_id'];?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>

                      <a href="delete_branch.php?branch_id=<?php echo $row['branch_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this institute');"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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