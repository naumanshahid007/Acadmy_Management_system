  <?php include("../includes/header.php"); 

      // get selected group id
      $id=$_GET["group_id"];

      // select group of slected group id
      $query  = "SELECT * FROM groups WHERE group_id = '$id' AND delete_status = 1";
      $res    = mysqli_query($con,$query);
      $row    =mysqli_fetch_assoc($res);
      $subject_id =$row["subject_id"];

      // select a subject related to a group
      $subject=mysqli_query($con,"SELECT subject_name FROM subjects WHERE subject_id = '$subject_id' AND delete_status = 1");
      $showsubject = mysqli_fetch_assoc($subject);

      // select all subjects
      $subjects=mysqli_query($con,"SELECT subject_id, subject_name FROM subjects WHERE subject_id != '$subject_id' AND delete_status = 1");
      // $showsubjects = mysqli_fetch_assoc($subjects);
      
  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Main content -->

      <div class="container-fluid">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Group</h3><br>
        <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="">Subjects</label>
            <select name="subject_id" class="form-control">
              <option value="<?php echo $showsubject["subject_id"]; ?>"><?php echo $showsubject["subject_name"]; ?>
              </option>
              <?php while($showsubjects = mysqli_fetch_assoc($subjects)){ ?>
              <option value="<?php echo $showsubjects["subject_id"]; ?>"><?php echo $showsubjects["subject_name"]; ?>
                
              </option>
              <?php } ?>

            </select>
          </div>
          
          <div class="col-md-4" form-group>
            <label for="">Group Name</label>
            <input type="text" name="group_name" class="form-control" placeholder="Enter Name of group" value="<?php echo $row['group_name']; ?>">
            
          </div>
          <div class="col-md-4" form-group>
            <label for="">Group Type</label>
            <select name="group_type" class="form-control">
              <option value='<?php echo $row["group_type"]; ?>'><?php echo $row["group_type"]; ?></option>
              <?php
              if ($row["group_type"]!="Morning") {?>
                 <option value="Morning">Morning</option>
              <?php } 
             else {?>
              <option value="Evening">Evening</option>
             <?php }
              ?>
            </select>
          </div>

        </div>
        <div class="row">
          
          <div class="col-md-4" form-group>
            <label for=""> Group Status</label>
            <select name="group_status" class="form-control">
                <option value="<?php echo $row["group_status"];?>"><?php echo $row["group_status"];?></option>
                <?php
              if ($row["group_status"]!="Active") {?>
                 <option value="Active">Active</option>
              <?php } 
             else {?>
              <option value="Inactive">Inactive</option>
             <?php }
              ?>
            </select>
          </div>

          <div class="col-md-4" form-group>
            <label for=""> Group Time</label>
            <input type="time" name="group_time" class="form-control" value="<?php echo $row['group_time'];?>">
          </div>
          <div class="col-md-4 form-group">
            <label>Group Start Date</label>
            <input type="date" name="group_start_date" class="form-control" value="<?php echo $row['group_start_date']; ?>">
          </div>

        </div>
        <div class="row">
          <div class="col-md-4 form-group">
            <label>Group End Date</label>
            <input type="date" name="group_end_date" class="form-control" value="<?php echo $row['group_end_date']; ?>">
          </div>

          <div class="col-md-8" form-group>
            <label for="">Group Description </label>
            <textarea name="group_description" class="form-control" placeholder=" Group Description " rows="2"required=""><?php echo $row["group_description"]; ?></textarea>
          </div>

          <div class="col-md-4">
            
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4">
          <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-ok"></i> Update</button>&nbsp;
          <a href="index.php" title="Go to main page" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancel</a>
          </div>
        </div>
      </form>
      </div>







  <?php
    if(isset($_POST["submit"]))
    {
      $group_name         = $_POST["group_name"];
      $group_type         = $_POST["group_type"];
      $group_status       = $_POST["group_status"];
      $group_time         = $_POST["group_time"];
      $subject_id         = $_POST["subject_id"];
      $group_description  = $_POST["group_description"];
      $group_start_date   = $_POST["group_start_date"];
      $group_end_date     = $_POST["group_end_date"];
      $updated_at         = date("d/m/Y");


      $subjectss = "SELECT subject_name FROM subjects WHERE subject_id = '$subject_id' AND delete_status = 1";
      $subjectresult = mysqli_query($con,$subjectss);
      $subjectrow = mysqli_fetch_assoc($subjectresult);
      $subject_name = $subjectrow['subject_name'];

      $groupInfo = $subject_name.' - '.$group_name.' - ' . date('h:A',strtotime($group_time));
      
      $query_update = "UPDATE groups SET group_start_date = '$group_start_date', group_end_date = '$group_end_date', group_info = '$groupInfo', group_name = '$group_name', group_type = '$group_type', group_description = '$group_description', group_status = '$group_status', group_time = '$group_time', updated_at ='$updated_at', subject_id = '$subject_id' WHERE group_id = '$id'";
      $result   = mysqli_query($con,$query_update);

      if($result)
        {
          echo "<script type='text/javascript'>window.location='index.php'</script>";
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



