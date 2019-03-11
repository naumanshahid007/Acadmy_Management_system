<?php include"../includes/header.php"; 
$id=$_GET["head_id"]?>
<div class="content-wrapper" style="background-color: #CCCCCC">
    <div class="container-fluid">
          
              
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Student Enrollment</h4>
              </div>
              <form method="POST">
              
                <div class="row">
                  <div class="col-md-1"></div>
              <?php 
                $sql_details="SELECT group_id FROM std_enrollment_head WHERE std_enrollment_head_id='$id' AND delete_status=1";

                  $details_result=mysqli_query($con,$sql_details);
                  
                   $row=mysqli_fetch_assoc($details_result);
                   $group_id= $row["group_id"];
                  // echo $group_id;
                   $sql="SELECT subject_id FROM groups WHERE group_id='$group_id' AND delete_status=1";
          $sql_result=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($sql_result);
          $abc=$row["subject_id"];
          //subject Id
          //echo $abc;
          $sql1="SELECT std_id FROM std_fee_details WHERE subject_id='$abc' AND delete_status=1 AND enroll_status=0 ";
            $sql_result1=mysqli_query($con,$sql1);
            //$row1=mysqli_fetch_assoc($sql_result1);
            
                    
            
            
                ?>
              <div class="col-md-10">
                <label>Select </label>
                  <select name="std[]" id="std" class="form-control" multiple>
                    <?php while ($row1=mysqli_fetch_assoc($sql_result1)) {
              $std_id=$row1["std_id"];
              $sql7="SELECT std_name,std_id FROM student_personal_information WHERE std_id='$std_id'";
                      $result7=mysqli_query($con,$sql7);
                      $students_row7=mysqli_fetch_assoc($result7);
                      
            echo"<option value='".$std_id."'>".$students_row7['std_name']. "</option>"; 
            }?>
                  </select>
                  
             
                  
                  
             
            
                
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                  </form>
                 <?php 
  if (isset($_POST["submit"])) {
    
    $std_id=$_POST["std"];
    //echo $group_id;
    
      
      foreach ($std_id as $std) {
        echo $std;
          $sql2=mysqli_query($con,"SELECT std_name FROM student_personal_information WHERE std_id='$std'");
          $sql1result=mysqli_fetch_assoc($sql2);

          $std_name=$sql1result["std_name"];
         
        $sqlinsert="INSERT INTO std_enrollment_details(std_enrollment_head_id,std_id,std_name,created_by) VALUES ('$id','$std','$std_name','$user')";

        $insert_result=mysqli_query($con,$sqlinsert);
        if ($insert_result) {
          $sql_update="UPDATE std_fee_details SET enroll_status=1 WHERE std_id=$std";
          $updateresult=mysqli_query($con,$sql_update);
          if (condition) {
            # code...
          }
        }

      }
    }
      
     
?>

                 </div>
              </div>
          
          
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>

        <script src="../../dist/js/adminlte.min.js"></script>

<script src="../../dist/js/demo.js"></script>

<script src="../../plugins/iCheck/icheck.min.js"></script>

<script src="../../dist/js/demo.js"></script>
       <script type="text/javascript">
          $(document).ready(function(){
       $('#std').multiselect({
        nonSelectedText: 'Select Students',
        //selectAll: true,
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        
        buttonWidth:'100%'
      });
    });
</script>
<?php 
  if (isset($_POST["submit"])) {
    
    $std_id=$_POST["std_id"];
    //echo $group_id;
    echo "button clicked";
      
      // foreach ($std_id as $std) {
      //     $sql2=mysqli_query($con,"SELECT std_name FROM student_personal_information WHERE std_id='$std'");
      //     $sql1result=mysqli_fetch_assoc($sql2);
      //     $std_name=$sql1result["std_name"];
      //   $sql_detail="INSERT INTO std_enrollment_details(std_enrollment_head_id,std_id,std_name,created_by) VALUES ('$id','$std','$std_name','$user')";
      //   $sql_detail_result=mysqli_query($con,$sql_detail);
      //   if ($sql_detail_result) {
      //     $sql_group="UPDATE std_fee_details SET enroll_status=1 WHERE std_id='$std'";
      //   $group_result=mysqli_query($con,$sql_group);
        
      //   if ($group_result) {
      //     //echo "data is inserted";
      //       echo "<script type='text/javascript'>window.location='view_enrollment_head.php?head_id=$id'</script>";
      //   }
       
 
      //     //echo "<script>window.location='index.php'</script>";
      //   }
      // }
    }

 