<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Add New Student</h3>
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">

      <!-- row 1 start here -->
      <div class="row">
        <h4 style="color:#3366FF; margin-left: 30px">Student Personal Information <span style="color: red;font-size: 20px">*</span></font></h4>
        <div class="col-md-4 form-group">
          <label>Student Name</label>
          <input type="text" name="std_name" class="form-control" required="required">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Father Name</label>
          <input type="text" name="std_father_name" class="form-control">
        </div>
        <div class="col-md-4 form-group">
          <label>student Contact</label>
          <input type="text" name="std_contact_no" class="form-control">
        </div>
        
       
      </div>
      <!-- row 1 close here -->

      <!-- row 2 start here -->
      <div class="row">

        <div class="col-md-4 form-group">
          <label>Student father Contact</label>
          <input type="text" name="std_father_contact_no" class="form-control">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Email</label>
          <input type="email" name="std_email" class="form-control">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Gender</label>
          <select name="std_gender" class="form-control">
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
          <input type="text" name="std_address" class="form-control">
        </div>

        <div class="col-md-4 form-group">
          <label>Student District</label>
          <input type="text" name="std_district" class="form-control">

        </div>
        <div class="col-md-4 form-group">
          <label>Student Tehseel</label>
          <input type="text" name="std_tehseel" class="form-control">
        </div>
        
      </div>
      <!-- row 3 close here -->

      <!-- row 4 start here -->
      <div class="row">

        

        <div class="col-md-4 form-group">
          <label>student Photo</label>
          <input type="file" name="std_picture" class="form-control">
        </div>

        <div class="col-md-4 form-group">
          <label>Student Religion</label>
          <input type="text" name="std_religion" class="form-control">
        </div>
        
      </div>
      <div class="row">
        <h4 style="color:#3366FF; margin-left: 30px">Student Fee Details <span style="color: red;font-size: 20px">*</span></font></h4>
        <div class="col-md-4 form-group">
          <label> Sttudent Registeration fee</label>
          <input type="text" class="form-control" name="std_registeration_fee" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required>
        </div>
        <div class="col-md-4 form-group">
          <label>Subject </label>
          
          <select name="subject_id[]" class="form-control" id="subject" >
            <option>--Select Subject--</option>
            <?php 
              $subjects="SELECT * FROM subjects WHERE delete_status=1";
              $subject_result=mysqli_query($con,$subjects);
              while ($subjectdata=mysqli_fetch_assoc($subject_result)) {
                ?>
                <option  value="<?php echo $subjectdata['subject_id'] ?>"><?php echo $subjectdata['subject_name']; ?></option>
                 <!-- <input type="checkbox" name="subject_id" id="subjects" value="<?php echo $subjectdata['subject_id'] ?>"> -->
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
      </div>
      
        
    
      <!-- row 4 close here -->
     
      <br>
      
     
     <div class="row">
       <div class="col-md-12">
         <?php $connect = new PDO("mysql:host=localhost;dbname=ams", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM subjects WHERE delete_status=1 ORDER BY subject_name ASC ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["subject_id"].'">'.$row["subject_name"].'</option>';
 }
 return $output;
}

?>

   <div id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
      
       <th>Add Subject</th>

       <th><button type="button" name="add" class="btn btn-success btn-sm add" title="Want to read another subject"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     
    </div>
  </div>








<?php
//insert.php;

if(isset($_POST["subject_id"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=ams", "root", "");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["subject_id"]); $count++)
 {  
  $query = "INSERT INTO std_fee_details 
  (subject_id) 
  VALUES (:subject_id)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    
    ':subject_id'  => $_POST["subject_id"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>
       </div>
     </div>
     <div class="row">
        <div class="col-md-4 form-group">
          <label>Discount Monthly Fee</label>
          <input type="radio" id="percentage" checked="" name="discount">Percentage
          <input type="radio" id="amount" name="discount">Amount
          <input type="text" class="form-control" name="discount_monthly_fee" id="discount_fee">
        </div>
        <div class="col-md-4 form-group">
          <label> Net Total</label>
          <input type="text" name="net_total" class="form-control" id="net_total">
          input
        </div>
      </div>

      <!-- row 5 start here -->
      <div class="row">

        <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-xs" name="submit"><i class="glyphicon glyphicon-save"></i> Save
          </button>&nbsp;
          <a href="index.php" title="Go to main page" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i>  Cancel</a>
        </div>
      
      </div>
      <!-- row 5 close here -->
    </form>
    </div>

<?php
  if(isset($_POST["submit"]))
  {
    $std_name                  = $_POST["std_name"];
    $std_father_name           = $_POST["std_father_name"];
    $std_contact_no            = $_POST["std_contact_no"];
    $std_email                 = $_POST["std_email"];
    $std_gender                = $_POST["std_gender"];
    $std_tehseel               =$_POST["std_tehseel"];  
    $std_father_name           =$_POST["std_father_name"];
    $std_father_contact_no     =$_POST["std_father_contact_no"];
    $std_district              =$_POST["std_district"];
    $std_religion              =$_POST["std_religion"];
    $std_address               = $_POST["std_address"];
    $filename                  = $_FILES["std_picture"]['name'];
    $tempname                  = $_FILES["std_picture"]['tmp_name'];
    $ext                       = pathinfo($filename, PATHINFO_EXTENSION);
    $size                      = $_FILES["std_picture"]["size"]; 
    $folder                    ="uploads/".$filename;
      
    move_uploaded_file($tempname, $folder);

    $studentinsert = "INSERT INTO student_personal_information(std_name,std_father_name,std_contact_no,std_email,std_father_contact_no,std_gender,std_address,std_district,std_tehseel,std_religion,std_picture)VALUES('$std_name','$std_father_name','$std_contact_no','$std_email','$std_father_contact_no','$std_gender','$std_address','$std_district','$std_tehseel','$std_religion','$folder')";


    $studentresult   = mysqli_query($con, $studentinsert);
    if($studentresult)
      {
       $last_id = mysqli_insert_id($con);
        
      } 
      else{
        echo "Not inserted...";
      }
    }


?>
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

<script type="text/javascript">

   </script>

<script type="text/javascript">
  function getProductsPerPurchasePrice()
    {
      originalPrice = parseInt(document.getElementById("").value);
        
      //discountType  = parseInt(document.getElementById("discountType").value);
        
          if(document.getElementById('percentage').checked)
              {
            discount = parseInt(document.getElementById("discount").value);
            
            discountReceived = parseInt((originalPrice*discount)/100);
            
            purchasePrice = originalPrice-discountReceived;
              }
            else if(document.getElementById('amount').checked)
            {
            discount = parseInt(document.getElementById("discount").value);
                  
            purchasePrice = originalPrice - discount;
              discountReceived = discount;
            } 
        else{
           purchasePrice = originalPrice;
        }
        //alert(purchasePrice);     
    }
    function readOnlyPurchasePrice()
    {
      let purchaseValue = document.getElementById('purchase_price');
        purchaseValue.value=purchasePrice;  
    }
</script>
<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';

  
  html += '<td><select name="subject_id[]" class="form-control" id="subjectss[]"><option value="">Select subject</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><input type="text" name="std_monthly_fee" class="form-control" id="monthlyFeee" required"></td>';
  html += '<td><button type="button" nmae="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  
  
  
  $('.subject_id').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert1.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});

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
        
        //alert(sum);
        }         
    });
  });
});


  $(document).ready(function(){
    var getFee = 0;
    $('#subjectss').click(function(){
     var subject_Id = $('#subjectss').val();
     getFee = parseInt($('#monthlyFee').val());
     alert(getFee);
  
   $.ajax({
        type:'post',
        data:{subject_Id:subject_Id},
        url: "fetch-fee.php",

        success: function(result){
        data=$.parseJSON(result);
        var fee = data["subject_fee"];
        //alert(getFee);
        $('#monthlyFee').val(fee);
        //alert(sum);
        }         
    });
  });
});
</script>


<?php
//insert.php;

if(isset($_POST["subject_id"]))
{
 
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["subject_id"]); $count++)
 {  
  $query = "INSERT INTO std_fee_details 
  (subject_id) 
  VALUES (:subject_id)
  ";
  $statement = $con->prepare($query);
  $statement->execute(
   array(
    
    ':subject_id'  => $_POST["subject_id"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>





