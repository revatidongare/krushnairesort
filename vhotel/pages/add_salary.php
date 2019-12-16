<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Add Employee Salary
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "ADD EMPLOYEE SALARY";
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
								<h5 class="title">Add Employee Salary</h5>
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
												<label for="hotel">Enter Employee ID</label>
												<input type="text" name="emp_id" class="form-control" id="hotel" oninput="showName(this.value)" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Employee Name</label>
												<input class="form-control" id="name_emp" readonly>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="department">Enter Salary Per Month</label>
												<input class="form-control" id="department" name="emp_salary" required>
											</div>
										</div>
									</div>
									<button class="btn btn-info btn-lg btn-block" type="submit" name="add_salary" value="add_Salary">Add Salary</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
		<script type="text/javascript">
			function showName(str) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "data.php?id=" + str, true);
				xmlhttp.send();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {

						//converting JSON back to array
						var data = JSON.parse(this.responseText);
						document.getElementById("name_emp").value = data;
					}
				}
			}

		</script>
		<?php include 'footer.php';?>
	</div>
	</div>
	<?php include 'scripts.php';?>
</body>

</html>
<?php
  if(isset($_GET['add'])){
    if($_GET['add']==1){
      ?>
<script type="text/javascript">
	swal("Salary Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in adding salary", "", "error");

</script>
<?php
    }
  }
?>
<?php
  if(isset($_GET['no'])){
    if($_GET['no']==1){
      ?>
<script type="text/javascript">
	swal("Wrong Employee Id", "", "error");

</script>
<?php
    }
  }
?>
<?php
  if(isset($_GET['duplicate'])){
    if($_GET['duplicate']==1){
      ?>
<script type="text/javascript">
	swal("Salary already added For this employee Id", "", "error");

</script>
<?php
    }
  }
?>
