<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Show Custom Price
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "ADD CUSTOM PRICE";
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
								<h5 class="title">Show Custom Price</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>From Date</label>
												<input class="form-control" type="date" name="date1" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>To Date</label>
												<input class="form-control" type="date" name="date2" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-3">
											<button class="btn btn-info btn-md btn-block mx-auto" type="submit" name="search_date">Show Price</button>
										</div>
									</div>
								</form>
								<?php
                    if(isset($_POST['search_date'])){
                      $date1=$_POST['date1'];
                      $date2=$_POST['date2'];
                ?>
								<div class="row">
									<div class="col-md-12">
										<div class="card">
											<div class="card-header">
												<h5 class="title">Custom Price Report</h5>
											</div>
											<hr>
											<div class="card-body">
												<div class="table-responsive">
													<?php
                      $query="SELECT * FROM `custom_price` WHERE `hotel_id`=? AND `date` BETWEEN ? AND ?";
                      include 'config.php';
                      $stmt=$conn->prepare($query);
                      $stmt->execute([$hotel_id,$date1,$date2]);
                      $res=$stmt->fetchAll();
                      $conn=null;       
                    ?>
													<table class="table" id="dataTable2">
														<thead class=" text-primary">
															<tr>
																<th><strong>Date</strong></th>
																<th class="text-center"><strong>Royal Executive Price</strong></th>
																<th class="text-center"><strong>Executive Price</strong></th>
																<th class="text-center"><strong>Suite Price</strong></th>
															</tr>
														</thead>
														<tbody>
															<?php
                        foreach($res as $row){  
                      ?>
															<tr>
																<td><?php echo date("d-m-Y",strtotime($row['date'])); ?></td>
																<td class="text-center"><?php echo $row['type1']; ?></td>
																<td class="text-center"><?php echo $row['type2'];?></td>
																<td class="text-center"><?php echo $row['type3']; ?></td>
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
							<?php    
            }
            ?>


						</div>

					</div>
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
	swal("Price Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in adding price", "", "error");

</script>
<?php
    }
  }
?>
