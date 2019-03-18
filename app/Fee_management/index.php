<?php include("../includes/header.php"); 
?>
<link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

<style type="text/css" media="screen">
  
  #delte:hover{
    color: orange;
  }
  #view:hover{
    color: blue;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
    <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color: #3c8dbc; color: white; text-align: center;">Manage Fee Details</h3>

    <!-- Main content -->
    <div class="box-body well"  style="border-top:1px solid #3c8dbc;">

      <div class="row">
    	<div class="col-md-3"></div>
    	<div class="col-md-6">
    		<form  method="post" class="form-inline">
    		
          <input type="text" name="std_id" class="form-control" placeholder="Enter the Registeration No" required>
          <input type="text" name="month" class="form-control" placeholder="Enter month No" required>
    			
    			<button type="submit" class="btn btn-info btn-sm" name="submit"><i class="fa fa-save"></i> Submit</button>
    		</form>
    	</div>
      
        
      
    </div>
    <div class="row">
      <div class="col-md-3">
      <?php 
        if (isset($_POST["submit"])) {
          $std_id= $_POST["std_id"];
          $month=$_POST["month"];
          $sql1=mysqli_query($con,"SELECT remaining_amount FROM fee_transaction_head WHERE std_id='$std_id' AND delete_status=1");
          $record1=mysqli_num_rows($sql1);
          while ($row_fetch=mysqli_fetch_assoc($sql1)) {
            $remain= $row_fetch["remaining_amount"];
          } 
          if (isset($remain)) {
           
          }else{
            $remain=0;
          }

          $sql=mysqli_query($con,"SELECT std_name FROM student_personal_information WHERE std_id='$std_id' AND delete_status=1");
          $record=mysqli_num_rows($sql);
          $row=mysqli_fetch_assoc($sql);
          $total=0;
          $sql1result=mysqli_query($con,"SELECT net_total,month_duration FROM std_fee_details WHERE std_id = $std_id AND (delete_status=1 OR delete_status=2)");
          while($row1=mysqli_fetch_assoc($sql1result)){
            $duration=$row1["month_duration"];
            if ($month<=$duration) {
              $total= $total+$row1['net_total'];
            }
           
          
              
              
          }
   
     ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 ">
        <h3 style="background-color: #3c8dbc; color: white; text-align: center;padding: 15px"><?php if ($row["std_name"]) {
          echo $row["std_name"];
        }
        else {
          echo "Vouchar $std_id Does not exist";
        }?></h3>
      </div>
      
    </div>
    <?php  
      if ($record==1) {?>
        <div class="row">
      <div class="col-md-1">
        
      </div>
      <div class="col-md-5">
        <h5 class="well well-sm" style="font-weight: bolder; background-color: black; color: white; text-align: center;padding: 15px">Vouchar No: <?php echo $std_id; ?></h5>
        <table class="table table-active" style="width: 100%">
        
          <thead>
            <tr>
              <th>Fee</th>
              <th colspan="2" class="text-center">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th></th>
              <th title="Total amount of this month">Total Amount</th>
              <th title="Remaining amount of the last month">Remaining</th>
              <th>Collected Amount</th>
            </tr>
            <tr>
             <td> Totution</td>
             <td><input type="text" readonly name="total_amount" class="form-control" value="<?php echo $total?>" style="width: 100px"></td>
             <td><input type="text" readonly="" class="form-control" value="<?php echo $remain; ?>" id="remaining"></td>
             <td><input type="text"  name="paid_amount" id="collect" class="form-control"  style="width: 100px" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"></td>

            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-5">
        <h5 class="well well-sm" style="font-weight: bolder; background-color: black; color: white; text-align: center;padding: 15px">Payment</h5>
        <div class="row">
          <div class="col-md-2">
            
          </div>
          <div class="col-md-8">
            <table class="table">
              <form method="post">
                <input type="hidden" name="std_id" value="<?php echo $std_id ?>">
                 <input type="hidden" name="std_name" value="<?php echo $row['std_name'] ?>">
                 <input type="hidden" name="month" value="<?php echo $month; ?>">
              <tr>
                <td><b>Net total</b></td>
                <td><input type="text" name="total_amount" value="<?php echo $total+$remain; ?>"     readonly class="form-control" id="net_total"></td>
              </tr>
              
              <tr>
                 <td><b>Paid Amount</b></td>
                <td><input type="text" name="paid_amount" readonly id="paid_amount" class="form-control" onfocus="checkamount()"></td>
              </tr>
              <tr>
                <td><b>Remaining</b></td>
                <td><input type="text" name="remain_amount" readonly id="remain" class="form-control" ></td>
              </tr>
              <tr>
                <td colspan="2"><button type="submit" class="btn btn-success btn-block" name="save"><i class="fa fa-sign-in"></i> Collect</button></td>
              </tr>
              </form>
            </table>
          </div>
        </div>
       <?php }  } ?> 
      </div>
    
    </div>
        <!-- PHP TO collect Vouchar -->
        <?php 
          if (isset($_POST["save"])) {
            $std_id=$_POST["std_id"];
            $std_name=$_POST["std_name"];
            $total_amount=$_POST["total_amount"];
            $paid_amount=$_POST["paid_amount"];
            $remain_amount=$_POST["remain_amount"];
            $month=$_POST["month"];
            $sql_insert=mysqli_query($con,"INSERT INTO fee_transaction_head (std_id,std_name,total_amount,paid_amount,remaining_amount,month) VALUES('$std_id','$std_name','$total_amount','$paid_amount','$remain_amount','$month')");
            if ($sql_insert) {
              echo "<div class='alert alert-success'>
                Vouchar is collected
              </div>";
            }
          }
        ?>
              
      </div>
  </div>
    <!-- /.content -->
  </div>

  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
    <strong>Copyright &copy; 2014-2016 <a href="http://dexdevs.com/">DEXDEVS</a>.</strong> All rights
    reserved.
  </footer>

</div>      
<?php include"../includes/footer.php"; ?>
<script type="text/javascript">
  function checkamount(){
    var total_amount=$('#net_total').val();
    var collect=$('#collect').val();
    var paid_amount=remain=0;
    remain_amount=total_amount-collect;
    
    
    $('#paid_amount').val(collect);
    $('#remain').val(remain_amount);


  }
</script>
