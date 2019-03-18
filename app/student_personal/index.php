<?php include("../includes/header.php"); 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">stds Personal Details</h3>

    <!-- Main content -->
<div class="box-body well"  style="border-top:1px solid #3c8dbc;">
  <button class="btn btn-success btn-xs" style="font-size: 15px; border-radius: 10px;"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus-sign"></i> Create stdudent</button><hr>
    <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr #</th>
                    <th>Student  Name</th>
                    <th>Student Contact No</th>
                    <th>Student Gender</th>
                    <th>Student Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               <?php
                
                // Query to dispaly all tearchers from `std personal info` table

                $students = "SELECT * FROM student_personal_information WHERE delete_status = 1";
                $studentresult     = mysqli_query($con,$students);
                $srNo = 1;
                while ($showstds = mysqli_fetch_assoc($studentresult)) {  
                ?>
                  <tr>
                  <td><?php echo $srNo; ?></td>
                  <td><?php echo $showstds['std_name']; ?></td>
                  <td><?php echo $showstds['std_contact_no']; ?></td>
                  <td><?php echo $showstds['std_gender']; ?></td>
                  <?php  
                    if ($showstds['std_picture']) {
                      $image= $showstds['std_picture'];
                    }
                    else{
                      $image="uploads/images.png";
                    }
                    
                  ?>
                  <td><a href="<?php  echo $showstds['std_picture'];?>"><img src="<?php  echo $image;?>" class="img-circle" width="50px" height="50px"></a></td> 
                  <td>
                    <a href="view_std_personal_info.php?std_id=<?php echo $showstds['std_id'];?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i> View |</a>
                    <a href="update_std_personal_info.php?std_id=<?php echo $showstds['std_id'];?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit |</a>
                    <a href="delete_std_personal_info.php?std_id=<?php echo $showstds['std_id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this student');"><i class="glyphicon glyphicon-trash"></i> Delete |</a>
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
<!-- ./wrapper -->

<!-- jQuery 3 -->

<div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog" style=" width: 1150px;margin: auto;">
      <div class="modal-content">
        <div class="modal-header" >
      <button type="s" class="close" data-dismiss="modal">&times;</button>
      <h3 class="modal-title" align="center"><i><b>Add Student</b></i></h3>
        </div>
      <div class="modal-body" >
       <form method="POST" enctype="multipart/form-data" class="well" >

      <!-- row 1 start here -->
      <div class="row">
        <h4 style="color:#3366FF; margin-left: 30px">Student Personal Information <span style="color: red;font-size: 20px">*</span></font></h4>
        <div class="col-md-4 form-group">
          <label>Student Name</label>
          <input type="text" name="std_name" class="form-control" required="required" id="std_name"  placeholder="Enter student Name ">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Father Name</label>
          <input type="text" name="std_father_name" class="form-control" id="std_father_name" placeholder="Student Father Name" required="">
        </div>
        <div class="col-md-4 form-group">
          <label>student Contact</label>
          
          <input required="" type="text" name="std_contact_no" class="form-control" id="std_contact_no" placeholder="Student Contact No" data-inputmask='"mask": "+99(999)-9999999"' data-mask>
        </div>
        
       
      </div>
      <!-- row 1 close here -->

      <!-- row 2 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Student father Contact</label>
          <input type="text" required="" name="std_father_contact_no" class="form-control" id="std_father_contact_no" placeholder="Student father Contact No"data-inputmask='"mask": "+99(999)-9999999"' data-mask>
        </div>

        <div class="col-md-4 form-group">
          <label>Student Email</label>
          <input type="email" name="std_email" class="form-control" id="std_email" placeholder="Student Email Address" required="">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Gender</label>
          <select name="std_gender" class="form-control" id="std_gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

      </div>
      <!-- row 2 close here -->

      <!-- row 3 start here -->
      <div class="row">

        
        <div class="col-md-4 form-group">
          <label>Address</label>
          <input type="text" name="std_address" class="form-control"  id="std_address" placeholder="Address of the student" required="">
        </div>

        <div class="col-md-4 form-group">
          <label>Student District</label>
          <input type="text" name="std_district" required="" class="form-control" id="std_district" placeholder="Student's district">

        </div>
        <div class="col-md-4 form-group">
          <label>Student Tehseel</label>
          <input type="text" name="std_tehseel" class="form-control" id="std_tehseel" placeholder="Tehseel of the student" required="">
        </div>
        
      </div>
      <!-- row 3 close here -->

      <!-- row 4 start here -->
      <div class="row">

        

        <div class="col-md-4 form-group">
          <label>Student CNIC</label>
          <input type="text" name="std_picture" class="form-control" id="std_picture" data-inputmask='"mask": "99999-9999999-9"' data-mask placeholder="Student CNIC No" required=""> 
        </div>

        <div class="col-md-4 form-group">
          <label>Student Religion</label>
          <input type="text" name="std_religion" class="form-control" placeholder="Religion of the Islam" id="std_religion" required="">
        </div>
        <div class="col-md-4 form-group">
          <label> Sttudent Registeration fee</label>
          <input type="text" class="form-control" name="std_registeration_fee" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required id="std_registeration_fee" required="">
        </div>
        
      </div>
      <div class="row">
        <h4 style="color:#3366FF; margin-left: 30px">Student Fee Details <span style="color: red;font-size: 20px">*</span></font></h4>
        
        <div class="col-md-4 form-group">
          <label>Subject </label>
          
          <select name="subject_id" class="form-control" id="subject" >
            <option>--Select Subject--</option>
            <?php 
              $subjects="SELECT * FROM subjects WHERE delete_status=1";
              $subject_result=mysqli_query($con,$subjects);
              while ($subjectdata=mysqli_fetch_assoc($subject_result)) {
                ?>
                <option  value="<?php echo $subjectdata['subject_id'] ?>"><?php echo $subjectdata['subject_name']; ?></option>
                 
                 <?php echo $subjectdata['subject_name']?>
                <?php
              }
            ?> 
            
          </select>
        </div>
        
        <div class="col-md-4 form-group">
          <label> Student Monthly Fee</label>
          <input type="text" class="form-control" name="std_monthly_fee" readonly required id="monthlyFee">
        </div>
        <div class="col-md-4 form-group">
          <label>Duration</label>
          <input type="text" name="duration" class="form-control" id="duration" 
         >


      </div>
    </div>
      
        
    
      <!-- row 4 close here -->
     
      <br>
      
     
    
     <div class="row">
        <div class="col-md-4 form-group">
          <label>Discount Monthly Fee</label>
          
          <input type="text" class="form-control" name="discount_monthly_fee" id="discount_fee"  value="0">
        </div>
        <div class="col-md-4 form-group">
          <label> Net Total</label>
          <input type="text" name="net_total" class="form-control" id="net_total" 
         readonly="" onfocus="net_total1()">
          
        </div>
        
      </div>

      <!-- row 5 start here -->
      <div class="row">

        <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-xs" id="submit" name="submit"><i class="glyphicon glyphicon-save" ></i> Save
          </button>&nbsp;
          <button type="button" class="btn btn-success btn-xs" onclick="insert();dismis()" id="dispaly_subject"> Display Subject
          </button>
          
          
          <button class=" btn btn-danger btn-xs" style="float: right" data-dismiss="modal" ><i class="glyphicon glyphicon-remove"></i>  Cancel</button>
        </div>
      
      </div>
      
      <div class="row">
        <div id="">
      <table  id="mydata" class="table table-striped table-bordered dt-responsive nowrap" align ="center" width="70%">
        <thead>
        <tr>
          
          
          <th> Subject Name</th>
          <th> Subject Fee</th>
          <th>Duration of Subject</th>
          <th>Discount on Subject</th>
        </tr>
      </thead>
      <tbody>
       
      </tbody>
      </table>
      <br/>
    </div>

      </div>
    
      <!-- row 5 close here -->
    </form>

      <!-- table start that print the headings and the remaining part of table are defined in the end of this page -->
      <script type="text/javascript">
        

      </script>
      <script type="text/javascript">
        let subject=new Array();
        let fee=new Array();
        let discount= new Array();
        let subject_duration= new Array();
        let fee_after = new Array();
        
        function insert()
        {
          var subject_name=document.getElementById("subject").value;
          var subject_fee=document.getElementById("monthlyFee").value;
          var discount_fee=document.getElementById("discount_fee").value;
          var duration=document.getElementById("duration").value;
          var fee_af=subject_fee-discount_fee;
          
          
          if (duration=='' || duration==null) {
            alert('Duration is required');

          }
          else{
            subject.push(subject_name);
          fee.push(subject_fee);
          discount.push(discount_fee);
          fee_after.push(fee_af);
          subject_duration.push(duration);
          
          let table = document.getElementById("mydata");
          
          //count the table row
          let rowCount = table.rows.length;
          
          //insert the new row
          let row = table.insertRow(1);
          row.insertCell(0).innerHTML= subject_name;
          row.insertCell(1).innerHTML= subject_fee ;
          row.insertCell(2).innerHTML= duration+" Month";
          row.insertCell(3).innerHTML= discount_fee;
        }
        }
        let net_total=0;
         function net_total1(){
            
            let actual_value=0;
            var subject_fee=document.getElementById("monthlyFee").value;
            var discount_fee=document.getElementById("discount_fee").value;
            actual_value=parseInt(subject_fee)-parseInt(discount_fee);
            net_total=parseInt(net_total)+parseInt(actual_value);

          $('#net_total').val(net_total);
        }
      </script>


      
      <?php include"../includes/footer.php"; ?>
 <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script> 
    <script type="text/javascript">
    $(document).ready(function(){
      
    })
  </script>
    <script type="text/javascript">
  
      $(document).ready(function(){

  var getFee = 0;
  $('#subject').change(function(){
   var subject_Id = $('#subject').val();
   $('#monthlyFee').val();

   $.ajax({
        type:'post',
        data:{subject_Id:subject_Id},
        url: "fetch-fee.php",

        success: function(result){
        data=$.parseJSON(result);
        var fee = data["subject_fee"];
        //alert(getFee);

          $('#monthlyFee').val(fee);
        
        }         
    });
  });
});
      function dismis(){
        var i="";
        $('#monthlyFee').val(i);
        $('#discount_fee').val(i);
        $('#subject').val(i);
        $('#duration').val(i);
      }
      let subjectArr=subject;
      let feeArr=fee;
      let discountArr=discount;
      let fee_after_discount=fee_after;
      let subject_duration_Arr=subject_duration;


  </script>

 
  <script>
              $(document).ready(function(){
                
                $('#submit').click(function(){
                //alert("Data is inserted");
                  var std_registeration_fee=$('#std_registeration_fee').val();;
                  var std_name=$('#std_name').val();
                  var std_father_name= $('#std_father_name').val();
                  var std_contact_no =$('#std_contact_no').val();
                  var std_father_contact_no=$('#std_father_contact_no').val();
                  var std_email=$('#std_email').val();
                  var std_gender=$('#std_gender').val();
                  var std_address=$('#std_address').val();
                  var std_district=$('#std_district').val();
                  var std_tehseel=$('#std_tehseel').val();
                  var std_picture=$('#std_picture').val();
                  var std_religion=$('#std_religion').val();

                  
                   var net_total=$('#net_total').val();
                  //alert(std_registeration_fee+"Your net total"+net_total);
                  
                  $.ajax({
                           type:'post',
                           data:{
                            std_name:std_name,
                            std_father_name:std_father_name,
                            std_contact_no:std_contact_no,
                            std_father_contact_no:std_father_contact_no,
                            std_email:std_email,
                            std_gender:std_gender,
                            std_address:std_address,
                            std_picture:std_picture,
                            std_district:std_district,
                            std_tehseel:std_tehseel,
                            std_religion:std_religion,
                            std_registeration:std_registeration_fee,
                            subjects:subjectArr,
                            fee:feeArr,
                            discounts:discountArr,
                            net_total:net_total,
                            fee_after_discount:fee_after_discount,
                            subject_duration_Arr:subject_duration_Arr
                      },
                      url: "insert_std.php",

                      success: function(result){
                      //alert(result);
                      window.location="view_std_personal_info.php?std_id="+result;
                      }
                   });
                });
             });
            </script>
  
      
  
   


  