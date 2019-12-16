<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php echo $hotel_name; ?> | Gallery
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "GALLERY";
    $linum = 7;
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
								<h4 class="card-title"> Added Images</h4>
							</div>
							<div class="card-body">
								<div>
								</div>
								<div class="mt-3 table-responsive">
									<?php
                      $query = "SELECT * FROM `photo_upload` WHERE `hotel_id`=?";
                      include 'config.php';
                      $stmt=$conn->prepare($query);
                      $stmt->execute([$hotel_id]);  
                      $result = $stmt->fetchAll();
                      $conn=null;
                    ?>
									<table id="dataTable" class="table">
										<thead class=" text-primary">
											<tr class="text-left">
												<th><strong>Id</strong></th>
												<th><strong>Category</strong></th>
												<th><strong>View</strong></th>
												<th><strong>Delete</strong></th>
											</tr>
										</thead>
										<tbody>
											<?php
                        foreach($result as $row){
                      ?>
											<tr class="text-left">
												<td><?php echo $row['id']; ?></td>
												<?php 
                              $type=$row['category'];
                              $query="SELECT * FROM `gallery_category_master` WHERE `id`=?";
                              include 'config.php';
                              $stmt=$conn->prepare($query);
                              $stmt->execute([$type]);
                              $res=$stmt->fetch();
                              $conn=null;
                            ?>
												<td><?php echo $res['name'];?></td>
												<td><a href="../gallery/<?php echo $row['file']; ?>" target="_blank" class="btn btn-info">View</a></td>
												<td><a href="back.php?gallery=<?php echo $row['id'];?>" class="btn btn-danger"><i class="fa fa-trash fa-fw" style="color: white;"></i></td>
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
  if(isset($_GET['delete'])){
      if($_GET['delete']==1){
?>
<script type="text/javascript">
	swal("Image Deleted Successfully", "", "success");

</script>
<?php
      }
      else{
          ?>
<script type="text/javascript">
	swal("Error in Deleting Image", "", "error");

</script>
<?php
      }
  }
  if(isset($_GET['q'])){
    if($_GET['q']==1){
      ?>
<script type="text/javascript">
	swal("Image Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in adding image", "", "error");

</script>
<?php
    }
  }
?>
