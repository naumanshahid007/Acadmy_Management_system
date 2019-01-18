<?php include("../includes/header.php"); 
      
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    
    <?php
    $id = $_GET["institute_id"];
      $query  = "SELECT * FROM institutes WHERE institute_id = $id ";
      $res    = mysqli_query($con,$query);
      while ($row = mysqli_fetch_array($res)) { ?>
       
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Institute</h3><br>
    <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
      <div class="row">
        <div class="col-md-4 form-group">
          <label>Institutes Name</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_name'] ;?>" name="institute_name">
        </div>
        <div class="col-md-4 form-group">
          <label>institute Description</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_description'] ;?>"  name="institute_description">
        </div>
        <div class="col-md-4 form-group">
          <label>institute Location</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_location'] ;?>"  name="institute_location">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label>Institute Account No</label>
          <input required="" type="text" class="form-control" value="<?php  echo $row['institute_account_no'] ;?>"  name="institute_account_no">
        </div>
        <div class="col-md-4 form-group">
          <label>Institutes Profile</label>
          <input required="" type="file" class="form-control"  name="profile">
        </div>
      </div>
      <?php  }
    ?><br>
      <div class="row">
        <div class="col-md-4 ">
          <button type="submit" class="btn btn-primary" name="update"><i class="glyphicon glyphicon-ok"></i> Update</button> &nbsp;
          <a href="index.php" class="btn btn-danger"><i class="glyphicon glyphicon-remove" ></i> Cancle</a>
      </div>
    </div>
    </form>
  </div>
  </div>
<?php
  if(isset($_POST["update"]))
  {
    $institute_name  = $_POST["institute_name"];
    $institute_description = $_POST["institute_description"];
    $institute_location    = $_POST["institute_location"];
    $institute_account_no  = $_POST["institute_account_no"];
    $filename = $_FILES["profile"]['name'];
    $tempname = $_FILES["profile"]['tmp_name'];
    $ext      = pathinfo($filename, PATHINFO_EXTENSION);
    $size     = $_FILES["profile"]["size"]; 
    $folder   ="uploads/".$filename;
    if ($filename) {
      move_uploaded_file($tempname, $folder);
    

    $query_update = " UPDATE institutes SET institute_name='$institute_name',institute_description='$institute_description',institute_location='$institute_location',institute_picture='$folder',institute_account_no='$institute_account_no' WHERE institute_id = $id ";
    $result   = mysqli_query($con,$query_update);
    if($result)
    {
      echo "<script type='text/javascript'>window.location='index.php'</script>";
    }
 }
 else
 {
   $query_update = " UPDATE institutes SET institute_name='$institute_name',institute_description='$institute_description',institute_location='$institute_location',institute_account_no='$institute_account_no' WHERE institute_id = $id ";
    $result   = mysqli_query($con,$query_update);
    if($result)
    {
     echo "<script type='text/javascript'>window.location='index.php'</script>";
    }
 }
  }

?>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://dexdevs.com/">DEXDEVS</a>.</strong> All rights
    reserved.
  </footer>

 