<!DOCTYPE html>
<?php include"../includes/header.php" ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Advanced form elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
 
  <div class="content-wrapper">
 
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
           
            <div class="col-md-6">
              <label>Select Group</label>
                    <select name="group_id" class="form-control" id="groups">
                      <option selected="" disabled="">--Select Groups--</option>
                    <?php
                      include"../includes/connection.php";
                      $grouup="SELECT * FROM groups WHERE delete_status=1 AND assign_status=1";
                      $group_result=mysqli_query($con,$grouup);
                      //$re=mysqli_num_rows($group_result);
                      while ($group_row=mysqli_fetch_assoc($group_result)) {
                        ?>
                <option value="<?php echo $group_row['group_id']; ?>"><?php echo $group_row["group_info"]; ?></option>
                        <?php
                      }
                    ?>
                    </select>
              <div class="form-group">
                <label>Multiple</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;" id="std">
                  
                </select>
              </div>
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

</div>
<?php include"../includes/footer.php" ?>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    
    
    
  })
  $(document).ready(function(){
    var id=0;
    $('#groups').change(function(){
      var id = $('#groups').val();
      //alert(id);
      $.ajax({
        type:'post',
        data:{std:id},
        url: "fetch.php",

        success: function(result){
        //alert(result);
        console.log(result);
        var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
        var len =jsonResult[0].length;
        //alert(len);
            var option = "";
            $('#std').empty();
            $('#std').append("<option disabled>"+"Select Student.."+"</option>");
            for(var i=0; i<len; i++)
            {
            var stdId = jsonResult[0][i];
            var stdName = jsonResult[1][i];
            option += "<option value="+ stdId +">"+stdName+"</option>";
            }
            $("#std").append(option); 
        }       
    });
    })
  });
</script>
</script>
</body>
</html>
