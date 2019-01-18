<?php include("../includes/header.php"); 

$id=$_GET["group_id"];
 $query  = "SELECT * FROM groups WHERE group_id = $id ";
      $res    = mysqli_query($con,$query);
      $row=mysqli_fetch_assoc($res);
      $class_id=$row["class_id"];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h2>Update Group</h2>
      <hr>
    </section>
    
    <!-- Main content -->
    <br><BR>
    <div class="container-fluid">
      <form method="POST" style="background-color: white;" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <label for="">Class</label>
          <?php 
            $clas=mysqli_query($con,"SELECT * FROM classes WHERE class_id=$class_id");
            $row1=mysqli_fetch_assoc($clas);
            $classes=$row1["class_id"];

          ?>
          <select name="class_id" class="form-control">
            <option value="<?php echo $row1["class_id"]; ?>"><?php echo $row1["class_name"]; ?></option>
          
          <?php 
            $sql1="SELECT * FROM classes WHERE delete_status='1'";
            $result=mysqli_query($con,$sql1);
            while ($row2=mysqli_fetch_assoc($result)) {
             if ( $classes!=$row2['class_id']) {
               ?>
                <option value=" <?php echo $row2["class_id"]; ?>"> <?php echo $row2["class_name"]; ?></option>
             <?php
             }
            }


          ?>
          </select>
        </div>
        
        <div class="col-md-4">
          <label for="">Group Name</label>
          <input type="text" name="group_name" class="form-control" placeholder="Enter Name of group" value="<?php echo $row['group_name']; ?>">
          
        </div>
        <div class="col-md-4">
          <label for="">Group Type</label>
          <select name="group_type" class="form-control">
            <option value="morning">Morning</option>
            <option value="evening">evening</option>
          </select>
        </div>

      </div>
      <div class="row">
        
        <div class="col-md-4">
          <label for="">Group Description </label>
          <textarea name="group_description" class="form-control" placeholder=" Group Description " rows="5"required=""><?php echo $row["group_description"]; ?></textarea>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-1"></div>
        <button type="submit" class="btn btn-info" name="submit"><i  class="fa fa-save"></i> Update Group</button>
        <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
      </div>
    </form>
    </div>







<?php
  if(isset($_POST["submit"]))
  {
    $group_name = $_POST["group_name"];
    $group_type = $_POST["group_type"];
    $class_id=$_POST["class_id"];
    $group_description    = $_POST["group_description"];
    $update_at=date("d/m/Y");

    $query_insert = "UPDATE  groups SET group_name='$group_name',group_type='$group_type',group_description='$group_description',updated_at='$update_at',class_id='$class_id' WHERE group_id='$id'";
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



