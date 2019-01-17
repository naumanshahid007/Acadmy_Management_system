<?php include("../includes/header.php"); ?>
<?php 
    $id=$_GET['subject_id'];
    $query=mysqli_query($con,"SELECT * FROM subjects WHERE subject_id='$id'");
    $query_result=mysqli_fetch_assoc($query);
    $class_id=$query_result['class_id'];

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h2>Update Subject</h2>
      <hr>
    </section>
    <br><BR>
    <div class="container-fluid">
      <form method="POST" style="background-color: white;" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <label for=""> Subject Name</label>
          <input type="text" class="form-control" name="subject_name" required="" placeholder="Enter Subject Name" required="" autofocus="" value="<?php echo $query_result['subject_name'] ?>" >
        </div>
        <div class="col-md-4">
          <label for=""> Subject Fee</label>
          <input type="text" class="form-control" name="subject_fee" required="" placeholder="Enter subject Fee" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required value="<?php echo $query_result['subject_fee'] ?>">
        </div>
        <div class="col-md-4">
          <?php 
            $class1 = "SELECT * FROM classes WHERE class_id = $class_id";
                  $classResult= mysqli_query($con,$class1);
                  $clas = mysqli_fetch_assoc($classResult); 
                  
                ?>
                  
          
          <label for=""> Select Class</label>
          <select name="class_id" class="form-control">
            <option value="<?php echo $clas['class_id']; ?>"><?php echo $clas['class_name']; ?> </option>
            
            <option >--- Select The class---</option>
            <?php 
               
                  //Query
                  $class = "SELECT * FROM classes ";
                  $classResult     = mysqli_query($con,$class);
                  while($classes = mysqli_fetch_array($classResult)){ 
                  if ($class_id!=$classes['class_id']) {
                    ?>
                    <option value="<?php echo $classes['class_id']; ?>"><?php echo $classes['class_name']; ?> </option>
                    <?php
                  }
               
               
              }
            ?>
            
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for=""> Subject Description</label>
          <textarea name="subject_description" class="form-control" rows="5" placeholder="Enter description  of subject"><?php echo $query_result['subject_description']; ?>"</textarea>
          <br>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-info" name="submit"><i class="fa fa-save"></i> Update Subject</button>
          <a href="index.php" title="Go to back" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </div>
      </div>
    </form>
    </div>







<?php
  if(isset($_POST["submit"]))
  {
    $subject_name=mysqli_real_escape_string($con,$_POST["subject_name"]);
    $subject_fee=mysqli_real_escape_string($con,$_POST["subject_fee"]);
    $class_id=mysqli_real_escape_string($con,$_POST["class_id"]);
    $subject_description=mysqli_real_escape_string($con,$_POST["subject_description"]);
    $updated_at=date("d/m/Y");
    
    
    $query_insert = "UPDATE subjects SET subject_name='$subject_name',subject_fee='$subject_fee',class_id='$class_id',updated_at='$updated_at',updated_by='$user',subject_description='$subject_description' WHERE subject_id='$id'";
  
    $result   = mysqli_query($con,$query_insert);
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



