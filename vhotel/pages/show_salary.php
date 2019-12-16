<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php echo $hotel_name; ?> | Hotel Salary Details
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "SALARY DETAILS";
    $linum = 3;
  ?>
	<style media="screen">
		.table>thead>tr>th {
			font-size: 1rem !important;
		}

	</style>
</head>

<body>
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
								<h4 class="card-title"> Added Salaries</h4>
							</div>
							<div class="card-body">
								<div>
								</div>
								<div class="mt-3 table-responsive">
									<?php
                      $query = "SELECT * FROM `basic_salary`";
                      include 'config.php';
                      $stmt=$conn->prepare($query);
                      $stmt->execute();
                      $result = $stmt->fetchAll();
                      $conn=null;
                    ?>
									<table id="dataTable" class="table">
										<thead class=" text-primary">
											<tr class="text-left">
												<th><strong>Emp ID</strong></th>
												<th><strong>Name</strong></th>
												<th><strong>Salary</strong></th>
												<th><strong>Update</strong></th>
												<th><strong>Delete Hotel</strong></th>
											</tr>
										</thead>
										<tbody>
											<?php
                        foreach($result as $row){
                      ?>
											<tr class="text-left">
												<td><?php echo $row['emp_id']; ?></td>
												<?php
                                $emp_id=$row['emp_id'];
                                $query="SELECT * FROM `employee` WHERE `id`=?";
                                include 'config.php';
                                $stmt=$conn->prepare($query);
                                $stmt->execute([$emp_id]);
                                $res=$stmt->fetch();
                                $conn=null; 
                              ?>
												<td><?php echo $res['name']?></td>
												<td><?php echo $row['salary'];?></td>
												<td><a href="update_salary.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fas fa-pen fa-fw" style="color: white;"></i></a></td>
												<td><a href="back.php?salary_delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw" style="color: white;"></i></a></td>
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
			</div>
			<?php include 'footer.php';?>
		</div>
	</div>
	<?php include 'scripts.php';?>
</body>

</html>
<?php
  if(isset($_GET['update'])){
      if($_GET['update']==1){
?>
<script type="text/javascript">
	swal("Salary Updated Successfully", "", "success");

</script>
<?php
      }
      else{
          ?>
<script type="text/javascript">
	swal("Error in updating salary", "", "error");

</script>
<?php
      }
  }
  if(isset($_GET['delete'])){
    if($_GET['delete']==1){
      ?>
<script type="text/javascript">
	swal("Salary Deleted Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in deleting Salary", "", "error");

</script>
<?php
    }
  }
?>
