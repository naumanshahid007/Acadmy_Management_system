<?php include("../includes/header.php");
  $id=$_GET["group_id"];

      // select group of slected group id
      $query  = "SELECT * FROM groups WHERE group_id = '$id' AND delete_status = 1";
      $res    = mysqli_query($con,$query);
      $row    =mysqli_fetch_assoc($res);
      $subject_id =$row["subject_id"];
      echo $subject_id;
      $subject=mysqli_query($con,"SELECT subject_name FROM subjects WHERE subject_id = '$subject_id' AND delete_status = 1");
      $subject_array=mysqli_fetch_assoc($subject);
      $subject_name=$subject_array["subject_name"];
      //echo "<script>alert('$subject_name')</script>";
      $subjects=mysqli_query($con,"SELECT subject_id, subject_name FROM subjects WHERE subject_id != '$subject_id' AND  delete_status = 1");
 
?>
 <div class="content-wrapper">
      <div class="container-fluid">
        <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Group</h3><br>
        <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="">Subjects</label>
            <select name="subject_id" class="form-control">
              <option value="<?php echo $subject_id;  ?>"><?php echo $subject_name; ?>
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
      echo $subject_id;

      $subjectss = "SELECT subject_name FROM subjects WHERE subject_id = '$subject_id' AND delete_status = 1";
   
      $subjectresult = mysqli_query($con,$subjectss);
      $subjectrow = mysqli_fetch_assoc($subjectresult);
      $subject_name = $subjectrow['subject_name'];
      echo $subject_name;

      $groupInfo = $subject_name.' - '.$group_name.' - ' . date('h:A',strtotime($group_time));
      
      $query_update = "UPDATE groups SET group_start_date = '$group_start_date', group_end_date = '$group_end_date', group_info = '$groupInfo', group_name = '$group_name', group_type = '$group_type', group_description = '$group_description', group_status = '$group_status', group_time = '$group_time', updated_at ='$updated_at', subject_id = '$subject_id' WHERE group_id = '$id'";
        
      $result   = mysqli_query($con,$query_update);
      var_dump($result);
      if($result)
        {
          echo "<script> window.location='index.php' </script>";
        } 
      }


  ?>
      </div>
    </div>






