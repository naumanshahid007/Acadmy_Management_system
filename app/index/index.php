<?php include("../includes/header.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     

    </section>

    <!-- Main content -->
    <div class="container-fluid">
       <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM student_personal_information WHERE delete_status=1";
                $res = mysqli_query($con,$sql);
                $c=mysqli_num_rows($res);
                ?>
              <h3><?php echo $c ?></h3>

              <p>Total Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-man"></i>
            </div>
            <a href="../student_personal/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql1 = "SELECT * FROM subjects WHERE delete_status=1";
                $res1 = mysqli_query($con,$sql1);
                
                $c=mysqli_num_rows($res1);
                ?>
              <h3><?php echo $c ?></h3>

              <p>Total Subjects</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="../Subject/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM teacher_personal_info WHERE delete_status=1";
                $res = mysqli_query($con,$sql);
                $c=mysqli_num_rows($res);?>
              <h3><?php echo $c ?></h3>

              <p>Total Teachers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM classes WHERE delete_status=1";
                $res = mysqli_query($con,$sql);
                $c=mysqli_num_rows($res);?>
              <h3><?php echo $c ?></h3>

              <p>Total Classes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>
        <!-- ./col -->
      
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
             <?php
                $sql = "SELECT *  FROM groups WHERE  delete_status=1";
                $res = mysqli_query($con,$sql);
                $c=mysqli_num_rows($res);?>
              <h3><?php echo $c ?></h3>
              <p>Total Groups</p>
            </div>
            <div class="icon">
              <i class="ion ion-groups"></i>
            </div>
            <a href="../groups/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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