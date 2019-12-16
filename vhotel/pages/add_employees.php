<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Add New Employee
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "ADD NEW EMPLOYEE";
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
								<h5 class="title">Add New Employee</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php" enctype="multipart/form-data">
									<div class="card-header">
										<h5 class="title">Basic Details</h5>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" placeholder="Enter First Name.." name="fname" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name</label>
												<input type="text" class="form-control" placeholder="Enter Last Name.." name="lname" required>
											</div>
										</div>
									</div>
									<div class="row">
										<?php
                        $query="SELECT * FROM `department_master` WHERE `hotel_id`=?";
                        include 'config.php';
                        $stmt=$conn->prepare($query);
                        $stmt->execute([$hotel_id]);
                        $result_for_department=$stmt->fetchAll();
                        $conn=null;
                    ?>
										<div class="col-md-12">
											<div class="form-group">
												<label id="department">Department</label>
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
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of Birth</label>
												<input type="date" class="form-control" name="dob" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of Joining</label>
												<input type="date" class="form-control" name="doj" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Permanent Address</label>
												<input type="text" class="form-control" placeholder="1234 main st" name="address" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Aadhaar No</label>
												<input type="text" class="form-control" placeholder="1234 9616 6452" name="adharno" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>PAN No</label>
												<input type="text" class="form-control" placeholder="ASEER34WE" name="panno">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Permanent Contact Number</label>
												<input type="text" class="form-control" placeholder="7825478912" name="pmobile" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Temporary Contact Number</label>
												<input type="text" class="form-control" placeholder="9874582415" name="tmobile" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="myfile">Upload Aadhaar Card</label><br>
												<input type="file" name="adharfile" class="form-control-file" id="myfile" required>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="pan">Upload PAN Card</label><br>
												<input type="file" name="panfile" id="pan" class="custom-control-file">
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="profile">Upload Profile Photo</label><br>
												<input type="file" name="profile" id="profile" class="custom-control-file" required>
											</div>
										</div>
									</div>
									<button class="btn btn-info btn-lg btn-block" type="submit" name="add_member" value="add_member">Add Details</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function showDepartment(str) {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET", "data1.php?category=" + str, true);
					xmlhttp.send();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {

							//converting JSON back to array
							var data = JSON.parse(this.responseText);
							//html value 
							console.log(data);
							var html = "";
							html += "<option>Choose...</option>";
							//looping through the data
							for (var i = 0; i < data.length; i++) {
								var id = data[i].id;
								var department = data[i].name;
								//appending a html
								html += "<option value=\"" + id + "\">";
								html += department;
								html += "</option>";
							}
							document.getElementById("inner").innerHTML = html;
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
	swal("Member Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in adding member", "", "error");

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
	swal("Member Already Exist", "", "error");

</script>
<?php 
  }
} 
?>
