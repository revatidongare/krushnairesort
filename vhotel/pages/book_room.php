<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Book a New Room
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "BOOK ROOM";
    $linum = 6;
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
								<h5 class="title">Choose Booking Date</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>From Date</label>
												<input class="form-control" type="date" name="from_date" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>To Date</label>
												<input class="form-control" type="date" name="to_date" required>
											</div>
										</div>
									</div>
									<button class="btn btn-info btn-lg btn-block" type="submit" name="our_date">Get Report</button>
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
