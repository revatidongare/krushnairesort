<?php include 'variables.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Update Hotel Details
	</title>
	<?php include 'head.php';
  $linum=0;
   ?>
	<?php
    $q = "SELECT * FROM `hotel_details` WHERE `hotel_id` = ?";
    include 'config.php';
    $stmt=$conn->prepare($q);
    $stmt->execute([$hotel_id]);
    $row=$stmt->fetch();
    $conn=null;
    $subtitle = "HOTEL DETAILS";
  ?>
	<style media="screen">
		.table>thead>tr>th {
			font-size: 1rem !important;
			/* font-weight: bold!important; */
		}

	</style>
</head>

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
				<?php
          if($row != NULL){
        ?>
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h5 class="title">Edit Hotel Details</h5>
							</div>
							<div class="card-body">
								<form action="back.php" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputEmail4">Name</label>
												<input type="text" class="form-control" placeholder="<?php echo $row['name'];?>" name="name" value="<?php echo $row['hotel_name'];?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputAddress">Address</label>
												<input type="text" class="form-control" id="inputAddress" placeholder="<?php echo $row['address'];?>" name="address" value="<?php echo $row['address'];?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputEmail4">Email</label>
												<input type="email" class="form-control" placeholder="<?php echo $row['email'];?>" name="email" value="<?php echo $row['email'];?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputEmail4">Contact Number</label>
												<input type="text" class="form-control" placeholder="<?php echo $row['phone'];?>" name="phone" value="<?php echo $row['phone'];?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="inputEmail4">Owner Name</label>
												<input type="text" class="form-control" placeholder="<?php echo $row['owner_name'];?>" name="owner_name" value="<?php echo $row['owner'];?>">
											</div>
										</div>
									</div>
									<input type="hidden" name="hotel_id" value="<?php echo $row['hotel_id']; ?>">
									<button class="btn btn-info btn-lg btn-block" type="submit" name="update_hotel_details">Update Profile</button>
								</form>
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
										<img class="avatar border-gray" src="../assets/img/hotel1.png" alt="...">
										<h5 class="title"><a href="http://themetropole.in/"><?php echo $row['hotel_name'];?></a></h5>
									</a>
									<p class="description">
										Hotel Id : <?php echo $row['hotel_id']; ?>
									</p>
								</div>
								<p class="description text-left">
									<hr>
									Address : <?php echo $row['address']; ?><br>
									<hr>
									Email : <?php echo $row['email'];?><br>
									<hr>
									Contact Number : <?php echo $row['phone'];?><br>
									<hr>
									Owner Name : <?php echo $row['owner'];?><br>
									<hr>
								</p>
							</div>

						</div>
					</div>
				</div>
				<?php
        }else{
        ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h5 class="title">Create Profile</h5>
							</div>
							<div class="card-body">
								<form action="back.php" method="post">
									<div class="row">
										<div class="col-md-6 pr-1">
											<div class="form-group">
												<label for="inputEmail4">Enter Name</label>
												<input type="text" class="form-control" placeholder="<?php echo $gym_name;?>" name="name" value="<?php echo $gym_name;?>" required>
											</div>
										</div>
										<div class="col-md-6 pl-1">
											<div class="form-group">
												<label for="inputAddress">Address</label>
												<input type="text" class="form-control" id="inputAddress" placeholder="Enter Address.." name="address" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 pr-1">
											<div class="form-group">
												<label for="inputEmail4">Email</label>
												<input type="email" class="form-control" placeholder="abc@company.com" name="email" required>
											</div>
										</div>
										<div class="col-md-6 pl-1">
											<div class="form-group">
												<label for="inputEmail4">Contact Number</label>
												<input type="text" class="form-control" placeholder="" name="phone" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="inputEmail4">Owner Name</label>
												<input type="text" class="form-control" placeholder="Enter Owner Name" name="owner_name" required>
											</div>
										</div>
									</div>

									<input type="hidden" name="gym_id" value="<?php echo $gym_id; ?>">
									<button class="btn btn-info btn-lg btn-block" type="submit" name="create_gym_details">Create Profile</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
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
	swal("Hotel Profile Updated Successfully!");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in changing Hotel Profile", "", "error");

</script>
<?php
    }
  }
?>
<?php
  if(isset($_GET['add'])){
    if($_GET['add']==1){
      ?>
<script type="text/javascript">
	swal("Hotel Profile Created Successfully!");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in Creating Hotel Profile", "", "error");

</script>
<?php
    }
  }
?>
