<?php include("../includes/header.php"); 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Students Subjects
     and Fee Details</h3>

    <!-- Main content -->
<div class="box-body well"  style="border-top:1px solid #3c8dbc;">
  <button class="btn btn-success btn-xs" style="font-size: 15px; border-radius: 10px;"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus-sign"></i> Create stdudent</button><hr>
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    
                    <th>Student  Name</th>
                    <th>Student Contact No</th>
                    <th>Student Gender</th>
                    <th>Student Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               <?php
                
                // Query to dispaly all tearchers from `std personal info` table

                $students = "SELECT * FROM student_personal_information WHERE delete_status = 1";
                $studentresult     = mysqli_query($con,$students);

                while ($showstds = mysqli_fetch_assoc($studentresult)) {  
                ?>
                  <tr>

                  <td><?php echo $showstds['std_name']; ?></td>
                  <td><?php echo $showstds['std_contact_no']; ?></td>
                  <td><?php echo $showstds['std_gender']; ?></td>
                  <td><a href="<?php  echo $showstds['std_picture'];?>"><img src="<?php  echo $showstds['std_picture'];?>" class="img-circle" width="50px" height="50px"></a></td> 
                  <td>
                    <a href="view_std_personal_info.php?std_id=<?php echo $showstds['std_id'];?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View |</a>
                    <a href="update_std_personal_info.php?std_id=<?php echo $showstds['std_id'];?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit |</a>
                    <a href="delete_std_personal_info.php?std_id=<?php echo $showstds['std_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this student');"><i class="glyphicon glyphicon-trash"></i> Delete |</a>
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