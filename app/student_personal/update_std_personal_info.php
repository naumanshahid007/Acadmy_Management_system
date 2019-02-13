<?php include("../includes/header.php"); 
?>


<?php 
$stdId=$_GET["std_id"];
$fetch_result="SELECT * FROM student_personal_information WHERE std_id= $stdId";
$data=mysqli_query($con,$fetch_result);
$studentdata=mysqli_fetch_assoc($data);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update student Personal Information</h3>
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">

      <!-- row 1 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Student Name</label>
          <input type="text" name="std_name" class="form-control" required="required" value="<?php echo $studentdata['std_name']; ?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Father Name</label>
          <input type="text" name="std_father_name" class="form-control" value="<?php echo $studentdata['std_father_name']; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label>student Contact</label>
          <input type="text" name="std_contact_no" class="form-control" value="<?php echo $studentdata['std_contact_no']; ?>">
        </div>
        
       
      </div>
      <!-- row 1 close here -->

      <!-- row 2 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Student father Contact</label>
          <input type="text" name="std_father_contact_no" class="form-control" value="<?php echo $studentdata['std_father_contact_no']; ?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Email</label>
          <input type="email" name="std_email" class="form-control" value="<?php echo $studentdata['std_email']; ?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Gender</label>
         
          <select name="std_gender" class="form-control">
          <option value=" <?php echo $studentdata['std_gender']; ?>"> <?php echo $studentdata['std_gender']; ?></option> 
            <?php if($studentdata['std_gender']=="Male")
             {?>
            <option class="Female">Female</option>
          <?php }else{ ?>
            <option value="Male">Male</option>
          <?php } ?>
          </select>
        </div>

      </div>
      <!-- row 2 close here -->

      <!-- row 3 start here -->
      <div class="row">

        
        <div class="col-md-4 form-group">
          <label>Address</label>
          <input type="text" name="std_address" class="form-control" value="<?php echo $studentdata['std_address']; ?>">
        </div>

        <div class="col-md-4 form-group">
          <label>Student District</label>
          <input type="text" name="std_district" class="form-control" value="<?php echo $studentdata['std_district']; ?>">

        </div>
        <div class="col-md-4 form-group">
          <label>Student Tehseel</label>
          <input type="text" name="std_tehseel" class="form-control" value="<?php echo $studentdata['std_tehseel']; ?>">
        </div>
        
      </div>
      <!-- row 3 close here -->

      <!-- row 4 start here -->
      <div class="row">

        

        <div class="col-md-4 form-group">
          <label>student Photo</label>
          <input type="file" name="std_picture" class="form-control" ">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Religion</label>
          <input type="text" name="std_religion" class="form-control" value="<?php echo $studentdata['std_religion']; ?>">
        </div>
        
      </div>
      <!-- row 4 close here -->
     
      <br>

      <!-- row 5 start here -->
      <div class="row">

        <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-xs" name="submit"><i class="glyphicon glyphicon-save"></i> Save
          </button>&nbsp;
          <a href="index.php" title="Go to main page" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i>  Cancel</a>
        </div>
      
      </div>
      <!-- row 5 close here -->
    </form>
    </div>







<?php
  if(isset($_POST["submit"]))
  {
    $std_name                  = $_POST["std_name"];
    $std_father_name           = $_POST["std_father_name"];
    $std_contact_no            = $_POST["std_contact_no"];
    $std_email                 = $_POST["std_email"];
    $std_gender                = $_POST["std_gender"];
    $std_tehseel               =$_POST["std_tehseel"];  
    $std_father_name           =$_POST["std_father_name"];
    $std_father_contact_no     =$_POST["std_father_contact_no"];
    $std_district              =$_POST["std_district"];
    $std_religion              =$_POST["std_religion"];
    $std_address               = $_POST["std_address"];
    $filename                  = $_FILES["std_picture"]['name'];
    $tempname                  = $_FILES["std_picture"]['tmp_name'];
    $ext                       = pathinfo($filename, PATHINFO_EXTENSION);
    $size                      = $_FILES["std_picture"]["size"]; 
    $folder                    ="uploads/".$filename;
    if ($filename) {
       move_uploaded_file($tempname, $folder);

    $studentinsert = "UPDATE student_personal_information SET std_name='$std_name',std_father_name = '$std_father_name',std_contact_no = '$std_contact_no',std_email = '$std_email',std_father_contact_no = '$std_father_contact_no',  std_address ='$std_address', std_district = '$std_district',std_tehseel = '$std_tehseel',std_religion = '$std_religion',std_picture ='$folder',std_gender='$std_gender' WHERE std_id='$stdId'";


    $studentresult   = mysqli_query($con, $studentinsert);
    if($studentresult)
      {
        echo "<script type='text/javascript'>window.location='index.php'</script>";
      } 
      else{
        echo "Not inserted...";
      }
    }
    else
    {


    $studentinsert = "UPDATE student_personal_information SET std_name='$std_name',std_father_name = '$std_father_name',std_contact_no = '$std_contact_no',std_email = '$std_email',std_father_contact_no = '$std_father_contact_no',  std_address ='$std_address', std_district = '$std_district',std_tehseel = '$std_tehseel',std_religion = '$std_religion',std_gender='$std_gender' WHERE std_id='$stdId'";
    

    $studentresult   = mysqli_query($con, $studentinsert);
    if($studentresult)
      {
        echo "<script type='text/javascript'>window.location='index.php'</script>";
      } 
      else{
        echo "Not inserted...";
      }
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

  <!-- Control Sidebarif
   -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include"../includes/footer.php"; ?>



