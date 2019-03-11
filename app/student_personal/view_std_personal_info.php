<?php include"../includes/header.php"; ?>
<?php 
  $id=$_GET["std_id"];
  $std_per="SELECT * FROM student_personal_information WHERE std_id='$id'";
  $result=mysqli_query($con,$std_per);
  $std=mysqli_fetch_assoc($result);

?>
<style type="text/css" media="screen">
  .btn-file {
   
</style>

<div class="content-wrapper">
    
    <section class="content-header">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#f39c12; color: white; text-align: center;">Student Detail View</h3>
          <section class="content-header">
          <ol style="float: right;">
                <li class="btn btn-warning btn-xs" style="padding:5px;"  ><i class="fa fa-print"></i> Print</li>
                <li class="btn btn-success btn-xs" style="padding:5px;"><a href="../index/index.php" style="color: white;"><i class="fa fa-home"></i> Home</a></li>
                <li class="btn btn-danger btn-xs" style="padding:5px;"><a href="index.php" style="color: white;"><i class="fa fa-backward"></i> Back</a></li>
              </ol>
          <h1>
            <i class="fa fa-info-circle"> Student Profile</i>
          </h1>
         
        </section>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php 
                 if ($std['std_picture']) {
                      $image= $std['std_picture'];
                    }
                    else{
                      $image="uploads/images.png";
                    }
                    
              ?>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $image; ?>" alt="User profile picture">
                <div class="btn-xs" align="center" style="font-size: 15px; border-radius: 10px;"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-camera"></i></div>
              <h3 class="profile-username text-center"><?php echo $std["std_name"]; ?></h3>

              
              <ul class="list-group list-group-unbordered">
                
                <li class="list-group-item">
                  <b>Father Name</b> <a class="pull-right"><?php echo $std["std_father_name"]; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Contact</b> <a class="pull-right"><?php echo $std["std_contact_no"]; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Gender</b> <a class="pull-right"><?php echo $std["std_gender"]; ?></a>
                </li> 
                <li class="list-group-item">
                  <b>CNIC</b> <a class="pull-right"><?php echo $std["std_cnic"]; ?></a>
                </li>
              </ul>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <?php
 $sql="SELECT * FROM std_fee_details WHERE std_id='$id' AND delete_status=1";
                      
                      $subject=mysqli_query($con,$sql);
                     // var_dump($subject);
                      $subb=mysqli_num_rows($subject);
          ?>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Personal Info</a></li>
              <li><a href="#timeline" data-toggle="tab">Acadmic Info <span class="badge badge-secondary" style="background-color:#00A65A"><?php  echo $subb; ?></span></a></li>
              <li><a href="#settings" data-toggle="tab">Fee</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">

                      <strong><i class="fa fa-book margin-r-5"></i> Father contact No</strong>

                      <p class="text-muted">
                        <?php echo $std['std_father_contact_no']; ?>
                      </p>

                      <hr>

                      <strong><i class="fa fa-map-marker margin-r-5"></i>Address</strong>

                      <p class="text-muted"><?php echo $std['std_address']; ?></p>

                      <hr>

                      <strong><i class="fa fa-envelope margin-r-5"></i> Email-Address</strong>

                      <p class="text-muted"><?php echo $std['std_email']; ?></p>

                      <hr>

                    </div>

                    <div class="col-md-6">

                      <strong><i class="fa fa-heart margin-r-5"></i> Relegion</strong>

                      <p class="text-muted"><?php echo $std['std_religion']; ?></p>

                      <hr>
                      <strong><i class="fa fa-location margin-r-5"></i> District</strong>

                      <p class="text-muted"><?php echo $std['std_district']; ?></p>

                      <hr>
                      <strong><i class="fa fa-money margin-r-5"></i> Tehseel</strong>

                      <p class="text-muted"><?php echo $std['std_tehseel']; ?></p>

                      <hr>

                    </div>
                  </div>

                  
                </div> 
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="row">
                 <div class="col-md-12">
                   
                    <a href="add_subject.php?std_id=<?php echo $id; ?>" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i> Add Subject</a>

                    <?php 
                    $sql="SELECT * FROM std_fee_details WHERE std_id='$id' AND delete_status=1";
                      
                      $subject=mysqli_query($con,$sql);
                     // var_dump($subject);
                      if (mysqli_num_rows($subject)<0) {
                        echo "No Subject Found";
                      }
                      else{
                        ?>
                        
                          <table class="table table-stripted">
                            <thead>
                              <tr>
                                <th>Subject Name</th>
                                <th>Remove Subject</th>
                              </tr>
                            </thead>
                            <tbody>  
                            

                          <?php while ($sub=mysqli_fetch_assoc($subject)) {
                            $idd=$sub['subject_id'];
                            $sql1="SELECT * FROM subjects WHERE subject_id='$idd'";
                      
                      $subjectss=mysqli_query($con,$sql1);
                      $results=mysqli_fetch_assoc($subjectss);
                            ?>
                            <tr>
                              <td><?php echo $results["subject_name"]; ?></td>
                              <td><a href='remove_subject.php?subject_id=<?php echo $sub['std_fee_id']; ?>&&std_id=<?php echo $id; ?>' class="btn btn-danger btn-xs" onclick="return confirm('Are you Sure to remove the subject')"><i class="fa fa-times"></i></a></td>
                            </tr>

                            <?php
                          }}?>

                        </tbody>
                     </table>

                    </div>
                </div>
               
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <div class="row">
                  <div class="col-md-8">
                    <!--  <strong ><i class="fa fa-heart margin-r-5"></i> Student Registeration Fee</strong><br>
                   
                    <p class="text-muted"><?php echo $std['std_registeration_fee']; ?></p><hr> -->
                    <?php 
                    $sql="SELECT * FROM std_fee_details WHERE std_id='$id' AND delete_status=1";
                      
                      $subject=mysqli_query($con,$sql);
                     // var_dump($subject);
                      if (mysqli_num_rows($subject)<0) {
                        echo "No Subject Found";
                      }
                      else{
                        ?>
                        
                          <table class="table table-stripted table-bordered">
                            <thead>
                              <tr style="background-color: #f2bf74;">
                                <th class="text-center">Sr # No</th>
                                <th class="text-center">Subject Name</th>
                                <th class="text-center">Subject Fee</th>
                                <th class="text-center" >Discount</th>
                                <th class="text-center" >Fee After Discount</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>  
                            

                          <?php
                            $i=1;
                            $total_fee=0;
                          while ($sub=mysqli_fetch_assoc($subject)) {
                            $idd=$sub['subject_id'];
                            $sql1="SELECT * FROM subjects WHERE subject_id='$idd'";
                      
                          $subjectss=mysqli_query($con,$sql1);
                          $results=mysqli_fetch_assoc($subjectss);
                            ?>
                            <tr>
                              <td><?php echo $i; 
                                  $i++;
                              ?></td>

                              <td><?php echo $results["subject_name"]; ?></td>
                              <td><?php echo $sub["std_monthly_fee"]; ?></td>
                              <td><?php echo $sub["discount_monthly_fee"]; ?></td>
                              <td>
                                <?php 

                                  $fee_after_discount=$sub["std_monthly_fee"]-$sub["discount_monthly_fee"];
                                  echo $fee_after_discount;
                                  $total_fee=$total_fee+$fee_after_discount;
                                ?>
                              </td>
                              <td><a href='edit_subject.php?subject_id=<?php echo $sub['std_fee_id']; ?>&&std_id=<?php echo $id; ?>' class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a></td>
                            </tr>

                            <?php
                          }}?>

                        </tbody>
                     </table>

                    
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-warning">
                    <div class="panel-heading"  style="background-color: #f2bf74;color:white"><h4><b>Total Fee</b></h4></div>
                    <div class="panel-body">
                      <h3>Your Total fee is:<br><?php echo $total_fee; ?></h3>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!-- <b>Version</b> 2.4.0 -->
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://dexdevs.com/">DEXDEVS</a>.</strong> All rights
        reserved.
      </footer>
<div class="modal fade" id="myModal" role="dialog" >
    
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Student Photo</h4>
              </div>
              <form method="post" enctype="multipart/form-data">
              <div class="row">
                
                <div class="col-md-4" style="margin-left: 20px">
                  
                  
            <label class="btn btn-primary btn-block">
                Choose file to upload <input type="file" style="display: none;" name="std_picture">
            </label>

          
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
              </form>
              <?php 
                if (isset($_POST["submit"])) {
                  $filename                  = $_FILES["std_picture"]['name'];
                  $tempname                  = $_FILES["std_picture"]['tmp_name'];
                  $ext                       = pathinfo($filename, PATHINFO_EXTENSION);
                  $size                      = $_FILES["std_picture"]["size"]; 
                  $folder                    ="uploads/".$filename;
                  move_uploaded_file($tempname,$folder);
                  $sql=mysqli_query($con,"UPDATE student_personal_information SET std_picture='$folder' WHERE std_id=$id");
                  if ($sql) {
                    echo "<script>window.location='view_std_personal_info.php?std_id=$id'</script>";
                  }
                }
              ?>
                 </div> 
                
                    
        
            </div>
          </div>

</div>


      
     <?php include "../includes/footer.php"; ?>
     