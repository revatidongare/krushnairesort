<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Add Hotel Details
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "ADD NEW HOTEL";
    $linum = 2;
     
    //Function for Hotel Name
    $query="SELECT * FROM `hotel_master`";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result_for_hotel=$stmt->fetchAll();
    $conn=null;

    //Function for Department Name
    $query="SELECT * FROM `department_master`";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result_for_department=$stmt->fetchAll();
    $conn=null;
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
								<h5 class="title">Add Hotel Details</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php">
									<div class="card-header">
										<h5 class="title"></h5>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="hotel">Select Hotel</label>
												<select class="form-control" id="hotel" name="hotel" required>
													<option value="">None</option>
													<?php
                             foreach($result_for_hotel as $row){
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
										<div class="col-md-12">
											<div class="form-group">
												<label for="department">Select Department</label>
												<select class="form-control" id="department" name="department" required>
													<option value="">None</option>
													<?php
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
									<button class="btn btn-info btn-lg btn-block" type="submit" name="add_detail" value="add_detail">Add Details</button>
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
	swal("Detail Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Detail in adding Hotel", "", "error");

</script>
<?php
    }
  }
?>
