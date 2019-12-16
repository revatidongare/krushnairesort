<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Create Image Gallery
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "CREATE IMAGE GALLERY";
    $linum = 7;
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
								<h5 class="title">Add New Image</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="category">Choose Category</label>
												<select class="form-control" id="category" name="category" required>
													<option value="">None</option>
													<?php
                            $query="SELECT * FROM `gallery_category_master`";
                            include 'config.php';
                            $stmt=$conn->prepare($query);
                            $stmt->execute();
                            $result_for_category=$stmt->fetchAll();
                            $conn=null;
                             foreach($result_for_category as $row){
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
												<label for="myfile">Upload Image</label><br>
												<input type="file" name="image" class="form-control-file" id="myfile" required>
											</div>
										</div>
									</div>
									<button class="btn btn-info btn-lg btn-block" type="submit" name="add_image" value="add_member">Add Image</button>
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
