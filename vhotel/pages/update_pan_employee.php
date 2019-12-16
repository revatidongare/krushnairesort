<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Update PAN Card
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "Update PAN Card";
    $linum = 3;
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
								<h5 class="title">Update PAN Card</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php" enctype="multipart/form-data">
									<div class="card-header">
										<h5 class="title">Upload PAN Card</h5>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="file" class="form-control-file" name="panfile" required>
											</div>
										</div>
									</div>
									<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
									<button class="btn btn-info btn-lg btn-block" type="submit" name="update_pan" value="">Update Details</button>
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
