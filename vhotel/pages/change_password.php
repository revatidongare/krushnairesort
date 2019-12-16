<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name;?> | Change Password
	</title>
	<?php include 'head.php';
        include 'config.php';
  ?>
	<?php
    $subtitle = "CHANGE PASSWORD";
    $linum=0;
  ?>
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
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h5 class="title">Change Password</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Enter Old Password</label>
												<input type="password" name="opassword" class="form-control" id="name" placeholder="Enter Old Password">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Enter New Password</label>
												<input type="password" name="npassword" class="form-control" id="name" placeholder="Enter New Password">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Confirm New Password</label>
												<input type="password" name="cpassword" placeholder="Enter New Password" class="form-control" id="stock">
											</div>
										</div>
									</div>
									<button class="btn btn-info btn-lg btn-block" type="submit" name="change_password">Change Password</button>
								</form>
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
	swal("Enter Old Password Correctly!!", "", "error");

</script>
<?php
    }
    if($_GET['change']==2){
      ?>
<script type="text/javascript">
	swal("Password Changed Successfully!!", "", "success");

</script>
<?php
    }
    if($_GET['change']==3){
      ?>
<script type="text/javascript">
	swal("Confirm Password Correctly!!", "", "warning");

</script>
<?php
    }
  }
?>
