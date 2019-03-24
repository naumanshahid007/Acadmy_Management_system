<?php include("../includes/header.php"); 
?>
<link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

<style type="text/css" media="screen">
  
  #delte:hover{
    color: red;
  }
  #view:hover{
    color: darkorange;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Students Enrollment Details</h3>

    <!-- Main content -->
<div class="box-body well"  style="border-top:1px solid #3c8dbc;">
  <button class="btn btn-success btn-xs" style="font-size: 15px; border-radius: 10px;"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus-sign"></i>Enroll stdudent</button><hr>
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr #</th>
                    <th>Group Info</th>
                    <th>Teacher Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               <?php
                
                // Query to dispaly all tearchers from `std personal info` table

                $students = "SELECT * FROM std_enrollment_head WHERE delete_status = 1";
                $studentresult     = mysqli_query($con,$students);
                $srNo = 1;
                while ($showstds = mysqli_fetch_assoc($studentresult)) {  
                  $group_id=$showstds["group_id"];
                  $sql=mysqli_query($con,"SELECT teacher_id FROM assign_teacher WHERE group_id='$group_id'");
                  $group_sql=mysqli_fetch_assoc($sql);
                  $subject=$group_sql['teacher_id'];


                   $subject_sql=mysqli_query($con,"SELECT teacher_name FROM teacher_personal_info WHERE teacher_id='$subject'");
                   $subject_sql=mysqli_fetch_assoc($subject_sql);

                ?>
                  <tr>
                  <td><?php echo $srNo; ?></td>
                  <td><?php echo $showstds['group_info']; ?></td>
                   <td><?php echo $subject_sql["teacher_name"]; ?></td> 
                  
                  
                  <td>
                    <a href="view_enrollment_head.php?head_id=<?php echo $showstds['std_enrollment_head_id'];?>" title="view"><i class="glyphicon glyphicon-eye-open" id="view"></i></a>
                    
                    <a href="delete_entollment_head.php?head_id=<?php echo $showstds['std_enrollment_head_id'];?>" onclick="return confirm('Are you sure to delete this student');" title="Delete"><i class="glyphicon glyphicon-trash" id="delte"></i></a>
                  </td>

                  </tr>
                  <?php 
                  $srNo++;
                }
               ?>
                </tbody>
              </table>
              
              </div>
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

<div class="modal fade" id="myModal" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Student Enrollment</h4>
              </div>
              <form method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <label>Select Group</label>
                    <select name="group_id" class="form-control" id="groups">
                      <option selected="" disabled="">--Select Groups--</option>
                    <?php
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
                  </div>
              <div class="col-md-6">
                <label>Select Student</label>
                  <select id="std" name="std_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Student"
                        style="width: 100%;" id="std">
                    <option></option>
                  </select>
              </div>
                  
                  
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <?php 

       
  if (isset($_POST["submit"])) {
    $group_id=$_POST["group_id"];
    $std_id=$_POST["std_id"];
    //echo $group_id;
    $sql=mysqli_query($con,"SELECT group_info,subject_id FROM groups WHERE group_id='$group_id'");
    $row=mysqli_fetch_assoc($sql);
    $group_info =$row["group_info"];
    $subject_id=$row["subject_id"];
    $sql1="INSERT INTO std_enrollment_head(group_id,group_info,subject_id,created_by) VALUES('$group_id','$group_info','$subject_id','$user')";
   
    $insert_head_query=mysqli_query($con,$sql1);
    if ($insert_head_query) {
      $last_id = mysqli_insert_id($con);
      echo $last_id;
      foreach ($std_id as $std) {
          $sql2=mysqli_query($con,"SELECT std_name FROM student_personal_information WHERE std_id='$std'");
          $sql1result=mysqli_fetch_assoc($sql2);
          $std_name=$sql1result["std_name"];
        $sql_detail="INSERT INTO std_enrollment_details(std_enrollment_head_id,std_id,std_name,created_by) VALUES ('$last_id','$std','$std_name','$user')";
        $sql_detail_result=mysqli_query($con,$sql_detail);
        if ($sql_detail_result) {
          $sql_group="UPDATE std_fee_details SET enroll_status=1 WHERE std_id='$std' AND subject_id=$subject_id";
        $group_result=mysqli_query($con,$sql_group);
        
        if ($group_result) {
          //echo "data is inserted";
            echo "<script type='text/javascript'>window.location='index.php'</script>";
        }
       
 
          //echo "<script>window.location='index.php'</script>";
        }
      }
    
    }
  }

?>

        
<?php include"../includes/footer.php"; ?>
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
            $('#std').append("<option disabled>"+""+"</option>");
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




