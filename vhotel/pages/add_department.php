<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Add New Department
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "ADD NEW DEPARTMENT";
    $linum = 2;
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
								<h5 class="title">Add New Department</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php">
									<div class="card-header">
										<h5 class="title">Enter Department Name</h5>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Office" name="department" required>
											</div>
										</div>
									</div>
									<button class="btn btn-info btn-lg btn-block" type="submit" name="add_department" value="add_member">Add Details</button>
							</div>
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
  if(isset($_GET['q'])){
    if($_GET['q']==1){
      ?>
<script type="text/javascript">
	swal("Department Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in adding Department", "", "error");

</script>
<?php
    }
  }
?>
