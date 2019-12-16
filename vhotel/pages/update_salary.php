<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Update Employee Salary
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "UPDATE EMPLOYEE SALARY";
    $linum = 3;
    $id=$_GET['id'];
    $query="SELECT * FROM `basic_salary` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute([$id]);
    $res=$stmt->fetch();
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
								<h5 class="title">Update Employee Salary</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php">
									<div class="card-header">
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="empid">Employee ID</label>
												<input type="text" class="form-control" value="<?php echo $res['id'];?>" id="empid" name="empid" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="empname">Employee Name</label>
												<?php
                          $emp_id=$res['emp_id'];
                          $query="SELECT * FROM `employee` WHERE `id`=?";
                          include 'config.php';
                          $stmt=$conn->prepare($query);
                          $stmt->execute([$emp_id]);
                          $res1=$stmt->fetch();
                          $conn=null;
                        ?>
												<input type="text" class="form-control" value="<?php echo $res1['name'];?>" name="hotel" id="empname" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="empsalary">Enter Salary</label>
												<input type="text" class="form-control" id="empsalary" name="salary" required>
											</div>
										</div>
									</div>
									<button class="btn btn-info btn-lg btn-block" type="submit" name="update_salary" value="add_member">Add Details</button>
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
