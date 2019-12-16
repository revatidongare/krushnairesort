<?php include 'variables.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php $hotel_name;?> | Update Employee Details
	</title>
	<?php include 'head.php';
   ?>
	<?php
    $subtitle = "UPDATE EMPLOYEE DETAILS";
    $linum=3;
  ?>
	<style media="screen">
		.table>thead>tr>th {
			font-size: 1rem !important;
			/* font-weight: bold!important; */
		}

	</style>
</head>
<?php
     $id = $_GET['id'];
     $q = "SELECT * FROM `employee` WHERE `id` = ?";
     include 'config.php';
     $stmt=$conn->prepare($q);
     $stmt->execute([$id]);
     $row = $stmt->fetch();
     $conn=null;
     $id = $row['id'];
     $name = $row['name'];
     $departmentid = $row['department'];
     $dob = $row['dob'];
     $doj = $row['doj'];
     $address = $row['address'];
     $adhar=$row['adhar'];
     $adharfile=$row['adharfile'];
     if($row['pan']==NULL){
       $pan="Not Entered";
     }else{
      $pan=$row['pan'];
     }
     $panfile=$row['panfile'];
     $pmobile = $row['pmobile'];
     $tmobile = $row['tmobile'];
     $profile=$row['profile'];
     $query="SELECT * FROM `department_master` WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $stmt->execute([$departmentid]);
     $department=$stmt->fetch();
     $department=$department['name'];
     $conn=null;

 ?>

<body class="">
	<div class="wrapper ">
		<?php include 'sidebar.php';?>
		<div class="main-panel">
			<!-- Navbar -->
			<?php include 'navbar.php';?>
			<!-- End Navbar -->
			<div class="panel-header panel-header-sm">
			</div>
			<div class="content">
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h5 class="title">Edit Profile</h5>
							</div>
							<div class="card-body">
								<form action="back.php" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6 pr-1">
											<div class="form-group">
												<label for="inputEmail4">Name</label>
												<input type="text" class="form-control" placeholder="<?php echo $name;?>" name="name" value="<?php echo $name;?>" required>
											</div>
										</div>
										<div class="col-md-6 pl-1">
											<div class="form-group">
												<label for="inputAddress">Address</label>
												<input type="text" class="form-control" id="inputAddress" placeholder="<?php echo $address;?>" name="address" value="<?php echo $address;?>" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 pl-1">
											<div class="form-group">
												<label for="inputEmail4">Department</label>
												<select class="form-control" id="deparmtent" name="department" required>
													<option value="<?php echo $departmentid;?>" selected><?php echo $department;?></option>
													<?php
                            $query="SELECT * FROM `department_master` WHERE `hotel_id`=?";
                            include 'config.php';
                            $stmt=$conn->prepare($query);
                            $stmt->execute([$hotel_id]);
                            $result_for_department=$stmt->fetchAll();
                            $conn=null;
                             foreach($result_for_department as $row){
                          ?>
													<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?>
													</option>
													<?php
                            }
                          ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputEmail4">Date of Joining</label>
												<input type="date" class="form-control" placeholder="<?php echo $doj;?>" name="doj" value="<?php echo $doj;?>" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputEmail4">Date of Birth</label>
												<input type="date" class="form-control" placeholder="<?php echo $dob;?>" name="dob" value="<?php echo $dob;?>" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 pr-1">
											<div class="form-group">
												<label for="inputEmail4">Aadhaar No</label>
												<input type="text" class="form-control" placeholder="<?php echo $age;?>" name="adhar" value="<?php echo $adhar;?>" required>
											</div>
										</div>
										<div class="col-md-6 px-1">
											<div class="form-group">
												<label for="inputEmail4">PAN No</label>
												<input type="text" class="form-control" placeholder="<?php echo $height;?>" name="pan" value="<?php echo $pan;?>" required>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6 pr-1">
											<div class="form-group">
												<label for="inputEmail4">Permanent Contact No</label>
												<input type="text" class="form-control" placeholder="<?php echo $weight;?>" name="pmobile" value="<?php echo $pmobile;?>" required>
											</div>
										</div>
										<div class="col-md-6 px-1">
											<div class="form-group">
												<label for="inputEmail4">Temporary Contact No</label>
												<input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo $email;?>" name="tmobile" value="<?php echo $tmobile;?>" required>
											</div>
										</div>
									</div>
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<button class="btn btn-info btn-lg btn-block" type="submit" name="update_profile">Update Profile</button>
								</form>
								<div class="row">
									<div class="col-md-12">
										<a href="update_aadhar_employee.php?id=<?php echo $id;?>" class="btn btn-success btn-block">Update Aadhaar Card</a>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<a href="update_pan_employee.php?id=<?php echo $id;?>" class="btn btn-success btn-block">Update PAN Card</a>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<a href="update_profile_employee.php?id=<?php echo $id;?>" class="btn btn-success btn-block">Update Profile Picture</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-user">
							<div class="image">
								<!-- <img src="../assets/img/bg5.jpg" alt="..."> -->
							</div>
							<div class="card-body">
								<div class="author">
									<a href="#">
										<img class="avatar border-gray" src="../upload/profile/<?php echo $profile;?>" alt="...">
										<h5 class="title"><?php echo $name;?></h5>
									</a>
									<p class="description">
										<strong>Member Id :</strong> <?php echo $id; ?>
									</p>
								</div>
								<p class="description text-left">
									<hr>
									<strong>Department : <?php echo $department;?><br>
										<hr>
										<strong>Date of Birth : <?php echo date("d-m-Y",strtotime($dob)); ?><br>
											<hr>
											<strong>Date of Joining : <?php echo date("d-m-Y",strtotime($doj));?><br>
												<hr>
												<strong>Address: <?php echo $address;?><br>
													<hr>
													<strong>Aadhaar Card: <?php echo $adhar; ?><br>
														<hr>
														<strong>Aadhaar Photo: <a href="../upload/adhar/<?php echo $adharfile;?>" target="_blank">Aadhar</a><br>
															<hr>
															<strong>PAN Card :<?php echo $pan; ?><br>
																<hr>
																<?php if($panfile==NULL){ ?>
																<strong>PAN Photo: Not uploaded <br>
																	<hr>
																	<?php
                    }else{
                      ?>
																	<strong>PAN Photo: <a href="../upload/pan/<?php echo $panfile;?>" target="_blank">PAN</a><br>
																		<hr>
																		<?php } ?>
																		<strong>Permanent Mobile : <?php echo $pmobile; ?><br>
																			<hr>
																			<strong>Temporary Mobile : <?php echo $tmobile;?><br>
																				<hr>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include 'footer.php';?>
		</div>
	</div>
	<?php include 'scripts.php';?>
</body>

</html>
<?php
  if(isset($_GET['change'])){
    if($_GET['change']==1){
      ?>
<script type="text/javascript">
	swal("Profile Changed Successfully!", {
			icon: "success",
		})
		.then((willreload) => {
			if (willreload) {
				window.location.href = "view_member.php?id=<?php echo $id;?>";
			}
		});

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in changing Profile", "", "error");

</script>
<?php
    }
  }
?>
