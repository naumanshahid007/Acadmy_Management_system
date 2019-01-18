<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->

    <div class="container-fluid">
       <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Class</h3>
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">
      <div class="row">
        <div class="col-md-4 form-group">
          <label for="">class Name</label>
          <input type="text" name="class_name" required="" class="form-control" placeholder="Enter Name of class">
        </div>
        <div class="col-md-4 form-group">
          
           <label for="">class Description </label>
          <textarea name="class_description" required="" class="form-control" placeholder=" class Description " rows="5"></textarea>
          
        </div>
        <div class="col-md-4">
          
        </div>
      
        
      </div>
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
        <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>  Cancel</a>
      </div>
      </div>
    </form>
    </div>

<?php
  if(isset($_POST["submit"]))
  {
    $class_name = $_POST["class_name"];
    
    $class_description    = $_POST["class_description"];
    

    $query_insert = "INSERT INTO classes(class_name,class_description,created_by) VALUES ('$class_name','$class_description','$user')";
    
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



