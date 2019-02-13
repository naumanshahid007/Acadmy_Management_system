    <?php include("../includes/header.php"); 
    ?>
    <?php 

    // get `std_id` from teacher personal `index.php`

    $stdId = $_GET['std_id'];

    // fetch data of a specific teacher againts selected `std_id` that is `teacherId`

    $student        = "SELECT * FROM student_personal_information
                      WHERE std_id = '$stdId' 
                      AND delete_status = 1";
    $studentresult  = mysqli_query($con,$student);
    $showstudent    = mysqli_fetch_assoc($studentresult);


     ?>
     

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        
        <div class="container-fluid">
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

        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-warning">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo $showstudent['std_picture']; ?>" alt="User profile picture">

                  <h3 class="profile-username text-center"><?php echo $showstudent['std_name']; ?></h3>

                  <!-- <p class="text-muted text-center"><?php echo $showstudent['std_qualification']; ?></p> -->

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Father Name</b> <a class="pull-right"><?php echo $showstudent['std_father_name']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Contact</b> <a class="pull-right"><?php echo $showstudent['std_contact_no']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Gender</b> <a class="pull-right"><?php echo $showstudent['std_gender']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Father Contact no</b><a class="pull-right"><?php echo $showstudent['std_father_contact_no']; ?></a> 
                      <!-- <b>CNIC</b> <a class="pull-right"><?php echo $showstudent['std_cnic']; ?></a> -->
                    </li>
                  </ul>

                  <!-- <a href="#" class="btn btn-warning btn-block"><b>Follow</b></a> -->
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

            </div>
            
            <div class="col-md-9">
              <!-- About Me Box -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-info-circle"> About Student</i></h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">

                     
                      
                      <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                      <p class="text-muted"><?php echo $showstudent['std_address']; ?></p>

                      <hr>
                      <strong><i class="fa fa-map-marker margin-r-5"></i> District</strong>

                      <p class="text-muted"><?php echo $showstudent['std_district']; ?></p>

                      <hr>

                      <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                      <p class="text-muted"><?php echo $showstudent['std_email']; ?></p>

                      <hr>

                    </div>

                    <div class="col-md-6">

                      <strong><i class="fa fa-heart margin-r-5"></i> Religion</strong>

                      <p class="text-muted"><?php echo $showstudent['std_religion']; ?></p>

                      <hr>
                      <strong><i class="fa fa-user-plus margin-r-5"></i> Tehseel</strong>

                      <p class="text-muted"><?php echo $showstudent['std_tehseel']; ?></p>

                      <hr>
                      
                    </div>
                  </div>

                  <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p> -->

                  <!-- <hr> -->

                  <!-- <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
              
            </div>
          

          </div>
          </section>

        </div>
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

      <!-- Control Sidebar -->
      
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <?php include"../includes/footer.php"; ?>
    <script type="text/javascript">
      function print(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
      }
  </script>



