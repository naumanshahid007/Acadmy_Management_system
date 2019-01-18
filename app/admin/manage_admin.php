<?php include("../includes/header.php"); 
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Admin Details</h3>
    
    <!-- Main content -->
    
    <div class="box-body well" style="border-top:1px solid #3c8dbc;">
      <a href="create_admin.php" class="btn btn-success" style="font-size: 15px; border-radius: 10px;"><i class="glyphicon glyphicon-plus-sign"></i> Create Admin</a><br><hr>
    <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Profile</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
                $query_show = "SELECT * FROM `manage_admin` WHERE delete_status = 1 ";
                $result     = mysqli_query($con,$query_show);
                while ($row = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?php error_reporting(0); echo $row['username'] ;?></td>
                    <td><?php error_reporting(0); echo $row['email'] ;?></td>
                    <td><?php error_reporting(0); echo $row['contact'] ;?></td>
                    <td> <a href="<?php  echo $row['picture'];?>"><img src="<?php  echo $row['picture'];?>" class="img-circle" width="50px" height="50px"></a></td>
                    <td>
                      <a href="update_admin.php?admin_id=<?php echo $row['admin_id'];?>" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>

                      <a href="deleteadmin.php?admin_id=<?php echo $row['admin_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this admin');"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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