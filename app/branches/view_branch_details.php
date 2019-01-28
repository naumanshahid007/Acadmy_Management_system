	<?php include("../includes/header.php"); 
	    
	?>
	<?php
	
				// Branch id
				$branchId = $_GET["branch_id"];

				// Query for Branch information
                $query_show = "SELECT * FROM `branches` WHERE branch_id = '$branchId' AND delete_status = 1";
                $resultbranch     = mysqli_query($con,$query_show);
                $branch = mysqli_fetch_array($resultbranch);

                // Institute id
                $instituteId = $branch['institute_id'];

                // Query to display the name of institute in brnach grid view
                $query_show = "SELECT * FROM `institutes` WHERE delete_status = 1 AND institute_id = $instituteId ";
                $resultinstitute     = mysqli_query($con,$query_show);
                $institute = mysqli_fetch_array($resultinstitute);

                // Query to display the information of all classes registered in a branch
                $query_show = "SELECT * FROM classes WHERE branch_id = $branchId";
                $resultclass = mysqli_query($con,$query_show);
				$countclasses = mysqli_num_rows($resultclass);

				// query to fetch subject name from subjects table
				// $subject = "SELECT DISTINCT subject_name FROM subjects WHERE delete_status = 1";
				// $subjectresult = mysqli_query($con,$subject);

				// Query to count all groups
				$groups = "SELECT * FROM groups WHERE delete_status = 1";
				$groupsresult = mysqli_query($con,$groups);
				$showgroups = mysqli_fetch_assoc($groupsresult);
				//$subjectId = $showgroups['subject_id'];
				$countgroups = mysqli_num_rows($groupsresult);

				// // query to count the total boys groups related to a specific subject
				// $boysgroups = "SELECT g.group_name FROM groups AS g INNER JOIN subjects AS s
				// 					ON g.subject_id = s.subject_id
				// 					WHERE s.subject_id = '$subjectId' AND g.group_name LIKE 'Boys%'";
				// $boysresult = mysqli_query($con,$boysgroups);
				// $countboysgroups = mysqli_num_rows($boysresult);

				// // query to count the total boys groups related to a specific subject
				// $girlsgroups = "SELECT g.group_name FROM groups AS g INNER JOIN subjects AS s
				// 					ON g.subject_id = s.subject_id
				// 					WHERE s.subject_id = '$subjectId' AND g.group_name LIKE 'Girls%'";
				// $girlsresult = mysqli_query($con,$girlsgroups);
				// $countgirlsgroups = mysqli_num_rows($girlsresult);
	?>
		 <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        <i class="fa fa-info-circle"></i> Branch Profile
	        
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="../index/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="index.php">Back</a></li>
	      </ol>
	    </section>

	    <!-- Main content -->
	    <section class="content">

	      <div class="row">
	        <div class="col-md-3">

	          <!-- Profile Image -->
	          <div class="box box-primary">
	            <div class="box-body box-profile">
	              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

	              <h3 class="profile-username text-center"><?php echo $institute['institute_name'];?></h3>

	              <p class="text-muted text-center">Software House</p>

	              <ul class="list-group list-group-unbordered">
	                <li class="list-group-item">
	                  <b>Branch Name</b> <a class="pull-right"><?php echo $branch['branch_name'];?></a>
	                </li>
	                <li class="list-group-item">
	                  <b>Status</b> 
	                  <a class="pull-right label label-success">
	                  	<?php echo $branch['branch_status'];?>
	                  </a>
	                </li>
	                
	              </ul>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->

	          <!-- About Me Box -->
	          <!-- <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">About Me</h3>
	            </div> -->
	            <!-- /.box-header -->
	            <!-- <div class="box-body">
	              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

	              <p class="text-muted">
	                B.S. in Computer Science from the University of Tennessee at Knoxville
	              </p>

	              <hr>

	              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

	              <p class="text-muted">Malibu, California</p>

	              <hr>

	              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

	              <p>
	                <span class="label label-danger">UI Design</span>
	                <span class="label label-success">Coding</span>
	                <span class="label label-info">Javascript</span>
	                <span class="label label-warning">PHP</span>
	                <span class="label label-primary">Node.js</span>
	              </p>

	              <hr>

	              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

	              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
	            </div> -->
	            <!-- /.box-body -->
	          <!-- </div> -->
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->
	        <div class="col-md-9">
	          <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#branch" data-toggle="tab">Branch</a></li>
	              <li><a href="#classes" data-toggle="tab">Classes <span class="label label-success"><?php echo $countclasses; ?></span></a></li>
	              <li><a href="#groups" data-toggle="tab">Groups <span class="label label-primary"><?php echo $countgroups; ?></span></a></li>
	              <li><a href="#subjects" data-toggle="tab">Subjects</a></li>
	              <li><a href="#students" data-toggle="tab">Students</a></li>
	              <li><a href="#teachers" data-toggle="tab">Teachers</a></li>
	            </ul>

	           

	            <div class="tab-content">

	           <!-- Branch tab start here -->
		           <div class="active tab-pane" id="branch">
		               <div class="row">
		               	<div class="col-md-4">
		               		<p style="font-size: 20px;"><i class="fa fa-info-circle"></i> Branch information</p>
		               	</div>
		               	<div class="col-md-3 col-md-offset-5">
		               		<button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
		               	</div>
		               </div><hr>
		                <!-- Branch info start here -->
		               <div class="row">
		               	<div class="col-md-6">
		               		<table class="table table-bordered table-striped table-hover">
		               			<thead>
		               				<tr>
		               					<th>Branch Code:</th>
		               					<td><?php echo $branch['branch_code'];?></td>
		               				</tr>
		               				<tr>
		               					<th>Branch Location:</th>
		               					<td><?php echo $branch['branch_location'];?></td>
		               				</tr>
		               				<tr>
		               					<th>Branch Contact No:</th>
		               					<td><?php echo $branch['branch_contact_no'];?></td>
		               				</tr>
		               				<tr>
		               					<th>Branch Email:</th>
		               					<td><?php echo $branch['branch_email'];?></td>
		               				</tr>
		               			</thead>
		               		</table>
		               	</div>
		               	<div class="col-md-6">
		               		<table class="table table-bordered table-striped table-hover">
		               			<thead>
		               				<tr>
		               					<th>Branch Head Name:</th>
		               					<td><?php echo $branch['branch_head_name'];?></td>
		               				</tr>
		               				<tr>
		               					<th>Branch Head Contact No:</th>
		               					<td><?php echo $branch['branch_head_contact_no'];?></td>
		               				</tr>
		               				<tr>
		               					<th>Branch Head Email:</th>
		               					<td><?php echo $branch['branch_head_email'];?></td>
		               				</tr>
		               			</thead>
		               		</table>
		               	</div>
		               </div>
						<!-- Branch info close here -->
		              </div>
	              
	              <!-- Branch tab close here -->

	              <!-- Classes tab start here -->
		           <div class="tab-pane" id="classes">
		           	<!-- Classes info start here -->
		               <div class="row">
		               	<div class="col-md-4">
		               		<p style="font-size: 20px;"><i class="fa fa-info-circle"></i> Classes information</p>
		               	</div>
		               	<div class="col-md-3 col-md-offset-5">
		               		<button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
		               	</div>
		               </div><hr>
		                <!-- Branch info start here -->
		               <div class="row">
		               	<div class="col-md-6">
		               		<table class="table table-bordered table-striped table-hover">
		               			<thead>
		               				<tr>
		               					<th>SR #</th>
		               					<th>Class Name:</th>
		               					
		               				</tr>
		               			</thead>
		               			<tbody>
		               				<?php 
		        //        					$query_show = "SELECT * FROM classes WHERE branch_id = $branchId";
						    //             $resultclass = mysqli_query($con,$query_show);
						    //             global $countclasses;
										// $countclasses = mysqli_num_rows($resultclass);
										$key = 1;
										while($classes = mysqli_fetch_assoc($resultclass)){
											
		               				?>
		               				<tr> 	
		               					<td><?php echo $key; ?></td>
		               					<td><?php echo $classes['class_name'];?></td>
		               					
		               				</tr>
		               				<?php $key++; } ?>
		               			</tbody>
		               		</table>
		               	</div>
		               	<div class="col-md-6">
		               		
		               	</div>
		               </div>
						<!-- Classes info close here -->
		              </div>
	              
	              <!-- Classes tab close here -->

	              <!-- Groups tab start here -->
		           <div class="tab-pane" id="groups">
		           	<!-- Classes info start here -->
		               <div class="row">
		               	<div class="col-md-4">
		               		<p style="font-size: 20px;"><i class="fa fa-info-circle"></i> Groups information</p>
		               	</div>
		               	<div class="col-md-3 col-md-offset-5">
		               		<button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
		               	</div>
		               </div><hr>
		                <!-- Group info start here -->
		               <div class="row">
		               	<div class="col-md-12">
		               		<table class="table table-bordered table-striped table-hover">
		               			<thead>
		               				<tr>
		               					<th>SR #</th>
		               					<th>Subject:</th>
		               					<th>Groups</th>
		               					<th>Boys</th>
		               					<th>Girls</th>
		               					
		               				</tr>
		               			</thead>
		               			<tbody>
		               				<?php
				// 					// Query to get subject id from groups table
				$groups = "SELECT subject_id FROM groups WHERE delete_status = 1";
				$groupsresult = mysqli_query($con,$groups);
				while($showgroups = mysqli_fetch_array($groupsresult)){
				$subjectId = $showgroups['subject_id'];

				// Query to get subject names from subjects which are matched with the subject id from groups
				$subject = "SELECT * FROM subjects WHERE subject_id = '$subjectId'";
				$subjectresult = mysqli_query($con,$subject);
				while($subjectname = mysqli_fetch_array($subjectresult)){
					
				// //query to count total groups of a specific subject
				$group = "SELECT g.group_name FROM groups AS g INNER JOIN subjects AS s
				ON g.subject_id = s.subject_id
				WHERE g.subject_id = '{$subjectname['subject_id']}'";

				$groupsresult = mysqli_query($con,$group);
				$countgroups = mysqli_num_rows($groupsresult);

				// query to count the total boys groups related to a specific subject
				$boysgroups = "SELECT g.group_name FROM groups AS g INNER JOIN subjects AS s
									ON g.subject_id = s.subject_id
									WHERE s.subject_id = '{$subjectname['subject_id']}' AND g.group_name LIKE 'Boys%'";
				$boysresult = mysqli_query($con,$boysgroups);
				$countboysgroups = mysqli_num_rows($boysresult);

				// query to count the total boys groups related to a specific subject
				$girlsgroups = "SELECT g.group_name FROM groups AS g INNER JOIN subjects AS s
									ON g.subject_id = s.subject_id
									WHERE s.subject_id = '{$subjectname['subject_id']}' AND g.group_name LIKE 'Girls%'";
				$girlsresult = mysqli_query($con,$girlsgroups);
				$countgirlsgroups = mysqli_num_rows($girlsresult);
		               				
		               				 ?>
		               				<tr>
		               					<td><?php echo $key; ?></td>
		               					<td>
		               						<?php echo $subjectname['subject_name']; ?>
		               					</td>	
		               					<td><?php echo $countgroups;  ?></td>
		               					<td><?php echo $countboysgroups; ?></td>
		               					<td><?php echo $countgirlsgroups; ?></td>
		               				</tr>
		               				<?php
		               						}
		               					}
		               				?>
		               			</tbody>
		               		</table>
		               		
		               	</div>
		               	<div class="col-md-6">
		               		
		               	</div>
		               </div>
						<!-- Groups info close here -->
		              </div>
	              
	              <!-- Groups tab close here -->

	            </div>
	            <!-- /.tab-content -->
	          </div>
	          <!-- /.nav-tabs-custom -->
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

	    </section>
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

	<?php include"../includes/footer.php"; ?>