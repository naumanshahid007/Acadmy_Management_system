<?php include("../includes/header.php"); 
$id=$_GET["class_id"];
 $query  = "SELECT * FROM classes WHERE class_id = $id ";
      $res    = mysqli_query($con,$query);
      $row=mysqli_fetch_assoc($res);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h2>Update class</h2>
      <hr>
    </section>
    
    <!-- Main content -->
    <br><BR>
    <div class="container-fluid">
      <form method="POST" style="background-color: white;" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <label for="">class Name</label>
          <input type="text" name="class_name" class="form-control" placeholder="Enter Name of class" value="<?php echo$row['class_name']; ?>">
           <label for="">class Description </label>
          <textarea name="class_description" class="form-control" placeholder=" class Description " rows="5"> <?php echo $row["class_description"]; ?></textarea>
          
        </div>
        
      
        
      </div>
      <br>
      <div class="row">
        <div class="col-md-1"></div>
        <button type="submit" class="btn btn-info" name="submit"><i  class="fa fa-save"></i> Update class</button>
        <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
      </div>
    </form>
    </div>







<?php
  if(isset($_POST["submit"]))
  {
    $class_name = $_POST["class_name"];
    
    $class_description    = $_POST["class_description"];
    

    $query_insert = "UPDATE  classes SET class_name ='$class_name',class_description = '$class_description',updated_by ='$user' WHERE class_id='$id'";
    
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


