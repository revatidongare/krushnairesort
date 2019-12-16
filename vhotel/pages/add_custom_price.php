<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php echo $hotel_name; ?> | Add Custom Price
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
								<h5 class="title">Add Custom Price</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Choose Date</label>
												<input class="form-control" type="date" name="date" required>
											</div>
										</div>
										<div class="col-md-4  mt-3">
											<button class="btn btn-info btn-md btn-block mx-auto" type="submit" name="search_date">Add Price</button>
										</div>
									</div>
								</form>
								<?php
                    if(isset($_POST['search_date'])){
                      $date=$_POST['date'];
                ?>
								<?php
                    $query="SELECT * FROM `type_master`";
                    include 'config.php';
                    $stmt=$conn->prepare($query);
                    $stmt->execute();
                    $res=$stmt->fetchAll();
                    $conn=null;
                    foreach($res as $row){
                  ?>
								<form method="post" action="back.php" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Room Category</label>
												<input class="form-control" type="text" value="<?php echo $row['name'];?>" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Set Price</label>
												<input class="form-control" type="text" name="price[]" value="<?php echo $row['price'];?>" required>
											</div>
										</div>
									</div>
									<?php 
                    }
                  ?>
									<input type="hidden" name="date" value="<?php echo $date;?>">
									<button class="btn btn-info btn-lg btn-block" type="submit" name="add_price">Add Price</button>
								</form>
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
