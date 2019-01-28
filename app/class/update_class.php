<?php include("../includes/header.php"); 
  
  // get specific class id
  $id=$_GET["class_id"];

  // fetch class against specific class id
  $query  = "SELECT * FROM classes WHERE class_id = $id ";
  $res    = mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($res);

  // get specific branch id
  $branch_id = $row['branch_id'];

  // fetch branches name not against specific branch id

  $branches = "SELECT * FROM branches WHERE branch_id != $branch_id AND delete_status = 1 ";
  $allbranches = mysqli_query($con,$branches);
  $branchesname = mysqli_fetch_array($allbranches);

  //fetch branch name against specific branch id
  $branch = "SELECT * FROM branches WHERE branch_id = $branch_id AND delete_status = 1 ";
  $onebranch = mysqli_query($con,$branch);
  $branchname = mysqli_fetch_array($onebranch);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->

    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Class</h3><br>
      
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
      <div class="row">
        
        <div class="col-md-4 form-group">
          <label>Branch Name</label>
         <select name="branch_id" class="form-control">
           <option value="<?php echo $branchname["branch_id"]; ?>"><?php echo $branchname["branch_name"]; ?></option>
           
           <option value="<?php echo $branchesname["branch_id"]; ?>"><?php echo $branchesname['branch_name']; ?>
         </select>
        </div>
        <div class="col-md-4 form-group">
          <label for="">class Name</label>
          <input type="text" name="class_name" class="form-control" placeholder="Enter Name of class" value="<?php echo$row['class_name']; ?>" required="" >
        </div>
        <div class="col-md-4 form-group">
          <label for="">class Description </label>
          <textarea name="class_description" required="" class="form-control" placeholder=" class Description " rows="5"> <?php echo $row["class_description"]; ?></textarea>
        </div>
      
        
      </div>
      <br>
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-ok"></i> Update</button>&nbsp;
        <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </div>
      </div>
    </form>
    </div>

<?php
  if(isset($_POST["submit"])){
    $branch_id = $_POST["branch_id"];
    $class_name = $_POST["class_name"];
    $class_description    = $_POST["class_description"];

    $query_update = "UPDATE classes SET branch_id = '$branch_id', class_name = '$class_name', class_description = '$class_description', updated_by ='$user' WHERE class_id = '$id'";
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



