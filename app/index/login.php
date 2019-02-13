  <?php include"../includes/connection.php"; ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 " style="margin-top: 20px;">
        
      <?php 
            if (isset($_POST["submit"])) {
                $username=mysqli_real_escape_string($con,$_POST["username"]);
                $password=md5(mysqli_real_escape_string($con,$_POST["password"]));
                //Query 
                $sql="SELECT * FROM manage_admin WHERE username='$username' AND password='$password' AND delete_status='1'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_num_rows($result);
                $fetch=mysqli_fetch_assoc($result);
                if ($row>0) {
                  session_start();
                  $_SESSION["user_name"]=$fetch["admin_id"];
                  echo "<script type='text/javascript'>window.location='../index/index.php'</script>";
                }
                else{
                  echo'<div class="alert alert-danger alert-dismissible text-center ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Invalid User Name or Password
                </div>';
                }
            }



      ?>
        <!-- <div class="alert alert-danger alert-dismissible text-center ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      like these sweet mornings of spring which I enjoy with my whole heart.
                </div> -->
      </div>
    </div>
  <div class="login-box">

    <div class="login-logo">

      <a href=""><b>AMS</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form " method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="User name" name="username"required="">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <input type="checkbox" style="size: 10px">
              <label>
                 Remember me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-success btn-block btn-flat" name="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
     <!--  <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div> -->
      <!-- /.social-auth-links -->

      <a href="#">I forgot my password</a><br>
      <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../../plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  </body>
  </html>
