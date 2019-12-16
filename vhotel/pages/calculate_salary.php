<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Calculate Salary
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "CALCULATE SALARY";
    $linum = 3;

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
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h5 class="title">Custom Salary Report </h5>
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
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Select Department</label>
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
									<button class="btn btn-info btn-lg btn-block" type="submit" name="our_date">Get Report</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php
          if(isset($_POST['our_date'])){
        ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<?php
                      $from_date = $_POST['from_date'];
                      $to_date = $_POST['to_date'];
                      $department_id=$_POST['department'];
                ?>
								<div>
									<a href="export_custom_payments.php?from=<?php echo $from_date;?>&&to=<?php echo $to_date;?>" class="btn btn-info btn-lg">Export To Excel</a>
								</div>
								<div class="table-responsive">
									<table class="table" id="dataTable">
										<thead class="text-primary">
											<tr>
												<th><strong>Name</strong></th>
												<th><strong>Member ID</strong></th>
												<th><strong>Days Working</strong></th>
												<th><strong>Amount</strong></th>
											</tr>
										</thead>
										<tbody>
											<?php
                      $query="SELECT * FROM `employee` WHERE `hotel`=? AND `department`=?";
                      include 'config.php';
                      $stmt=$conn->prepare($query);
                      $stmt->execute([$hotel_id,$department_id]);
                      $res=$stmt->fetchAll();
                      $conn=null;
                      foreach($res as $row){
                          $emp_id=$row['id'];
                          $q2 = "SELECT * FROM `attendance` WHERE `emp_id`= ? AND `indate` BETWEEN '$from_date' AND '$to_date' AND `outdate` BETWEEN `from_date` BETWEEN `$to_date` AND '$to_date'";
                          include 'config.php';
                          $stmt=$conn->prepare($q2);
                          $stmt->execute([$emp_id]);
                          $res1=$stmt->fetchAll();
                          $conn=null;
                          $count=0;

                          foreach($res1 as $row1){
                            if($row1['workhour']==10)
                            {
                              $count++;
                            }
                          }
                          ?>
											<tr>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $row['id']; ?></td>
												<td><?php echo $count; ?></td>
												<td>
													<?php
                              if($count==30){
                                $query="SELECT * FROM `basic_salary` WHERE `emp_id`=?";
                                include 'config.php';
                                $stmt=$conn->prepare($query);
                                $stmt->execute([$emp_id]);
                                $salary=$stmt->fetch();
                                $conn=null;
                                echo $salary['salary'];
                              }  
                              else{
                                echo 0;
                              }
                            ?>
												</td>
											</tr>
											<?php
                        }
                      ?>
										</tbody>
									</table>
								</div>
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
