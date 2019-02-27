<?php include("../includes/header.php"); 
      
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <?php
    $id = $_GET["branch_id"];
      $query  = "SELECT * FROM branches WHERE branch_id = $id ";
      $res    = mysqli_query($con,$query);
      while ($row = mysqli_fetch_array($res)) { ?>
       
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00c0ef; color: white; text-align: center;">Update Branch</h3><br>
    <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00c0ef;">
      <div class="row">
        <div class="col-md-4 form-group">
          <label>Institute Name</label>
          <select class="form-control" name="institute_name">
            <?php
              $query_institute = " SELECT * FROM institutes WHERE delete_status = 1 ";
              $result = mysqli_query($con,$query_institute);
              while($opt = mysqli_fetch_array($result))
              {?>
                  <option value="<?php echo $opt["institute_id"]; ?>"><?php echo $opt["institute_name"]; ?></option>
            <?php  }
            ?>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Name</label>
          <input type="text" name="branch_name" value="<?php echo $row["branch_name"]; ?>" class="form-control" placeholder="Enter Name Of Branch" required="">
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Code</label>
          <input type="text" name="branch_code" value="<?php echo $row["branch_code"]; ?>" class="form-control" placeholder="Enter Code Of Branch" required="">
        </div>
      </div>
     <div class="row">
        <div class="col-md-4 form-group">
          <label>Branch Location</label>
          <input type="text" name="branch_location" value="<?php echo $row["branch_location"]; ?>" class="form-control" placeholder="Enter branch location" required="">
          
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Contact No</label>
          <input type="text" name="branch_contact_no" required="" value="<?php echo $row["branch_contact_no"]; ?>" class="form-control" placeholder="Enter branch contact No" data-inputmask='"mask": "+99(999)-9999999"' data-mask required="">
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Email</label>
          <input type="email" name="branch_email" required="" value="<?php echo $row["branch_email"]; ?>" class="form-control" placeholder="Enter Email Of branch">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label for="">Branch Head Name</label>
          <input type="text" name="branch_head_name" required="" value="<?php echo $row["branch_head_name"]; ?>" class="form-control" placeholder="Enter branch head name">
          
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Head Contact No</label>
          <input type="text" name="branch_head_contact_no" required="" value="<?php echo $row["branch_head_contact_no"]; ?>" class="form-control" placeholder="Enter head Contact No" data-inputmask='"mask": "+99(999)-9999999"' data-mask required="">
        </div>
        <div class="col-md-4 form-group">
          <label>Branch Head Email</label>
          <input type="email" name="branch_head_email"required="" value="<?php echo $row["branch_head_email"]; ?>" class="form-control" placeholder="Enter branch head email">
        </div>
      </div>
      <?php  }
    ?><br>
      <div class="row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary" name="update"><i class="glyphicon glyphicon-ok"></i> Update</button>&nbsp;
          <a href="index.php" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancle</a>
      </div>
    </div>
    </form>
  </div>
   </div>
<?php
  if(isset($_POST["update"]))
  {
    $institute_name        = $_POST["institute_name"];
    $branch_name           = $_POST["branch_name"];
    $branch_code           = $_POST["branch_code"];
    $branch_location       = $_POST["branch_location"];
    $branch_contact_no     = $_POST["branch_contact_no"];
    $branch_email          = $_POST["branch_email"];
    $branch_head_name      = $_POST["branch_head_name"];
    $branch_head_contact_no = $_POST["branch_head_contact_no"];
    $branch_head_email     = $_POST["branch_head_email"];

   $query_update = "  UPDATE `branches` SET `institute_id`='$institute_name',`branch_name`='$branch_name',`branch_code`='$branch_code',`branch_location`='$branch_location',`branch_contact_no`='$branch_contact_no',`branch_email`='$branch_email',`branch_head_name`='$branch_head_name',`branch_head_contact_no`='$branch_head_contact_no',`branch_head_email`='$branch_head_email' WHERE branch_id = '$id' ";
   




    $result   = mysqli_query($con,$query_update);
    if($result)
    {
     echo "<script type='text/javascript'>window.location='index.php'</script>";
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
  <?php include"../includes/footer.php"; ?>
  <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

  