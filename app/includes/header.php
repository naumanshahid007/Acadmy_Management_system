<?php 

      include("../includes/connection.php");
      include("../includes/session.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="../../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="../../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="../../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Academy </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="../../#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
                  <?php 
                  $query_show = "SELECT * FROM manage_admin WHERE delete_status = '1' AND admin_id='$user' ";
                $result     = mysqli_query($con,$query_show);
                 $row = mysqli_fetch_array($result);  ?>
                

          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="../../#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../admin/<?php echo $row['picture']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $row["username"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                
                <img src="../admin/<?php echo $row['picture']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $row["username"]; ?>
                  <small>Member since 2016</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
               <!--  <div class="row">
                   <div class="col-xs-4 text-center">
                    <a href="../../#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="../../#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="../../#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="../../#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="text-center">
                  <a href="../index/logout.php" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Signout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="../../#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../admin/<?php echo $row['picture'];  ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row["username"]; ?></p>
          <a href="../../#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="text-align: center;">MAIN NAVIGATION</li>
        <li>
          <a href="../index/index.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a> 
        </li>
     
        <li class="treeview">
          <a href="../../#">
            <i class="fa fa-laptop"></i>
            <span>System Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../institutes/index.php"><i class="fa fa-institution"></i> Institute</a></li>
            <li><a href="../branches/index.php"><i class="fa fa-btc"></i> Branch</a></li>
            <li><a href="../class/index.php"><i class="fa fa-copyright"></i> Classes</a></li>
            <li><a href="../Subject/"><i class="fa fa-skype"></i> Subjects</a></li>
            <li><a href="../groups/index.php"><i class="fa fa-group"></i> Groups</a></li>
            
           
          </ul>
        </li>
        <li class="treeview">
          <a href="../../#">
            <i class="fa fa-laptop"></i>
            <span>Teacher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../teachers_personal/index.php"><i class="fa fa-pied-piper-pp"></i> Teacher Personal Info</a></li>
            <li><a href="../teacher_assign/index.php"><i class="fa fa-at"></i>Teacher Assign</a></li>
            
          </ul>
        </li>
        <li >
          <a href="../student_personal/">
            <i class="fa fa-users"></i>
            <span>Student Registration</span>
            <span class="pull-right-container">
              
            </span>
          </a>
       
        </li>
        <li class="treeview">
          <a href="../../#">
            <i class="fa fa-users"></i>
            <span>Student Enrollment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../pages/UI/general.html"><i class="fa fa-pied-piper-pp"></i> Student Enrollment Head</a></li>
            <li><a href="../../pages/UI/icons.html"><i class="fa fa-sign-in"></i> Student Enrollment Details</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="../../#">
            <i class="fa fa-money"></i>
            <span>Fee</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../pages/UI/general.html"><i class="fa fa-money"></i> Fee Vouchar </a></li>
            
            
          </ul>
        </li>
        
        <li><a href="../admin/manage_admin.php"><i class="fa fa-user"></i> <span>Manage Admin</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>