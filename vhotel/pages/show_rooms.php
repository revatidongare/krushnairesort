<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php echo $hotel_name; ?> | Room Details
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "Room DETAILS";
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
								<h4 class="card-title"> Added Rooms</h4>
							</div>
							<div class="card-body">
								<div>
								</div>
								<div class="mt-3 table-responsive">
									<?php
                      $query = "SELECT * FROM `room_master` WHERE `hotel_id`=?";
                      include 'config.php';
                      $stmt=$conn->prepare($query);
                      $stmt->execute([$hotel_id]);
                      $result = $stmt->fetchAll();
                      $conn=null;
                    ?>
									<table id="dataTable" class="table">
										<thead class=" text-primary">
											<tr class="text-left">
												<th><strong>Room No</strong></th>
												<th><strong>Room Type</strong></th>
												<th><strong>Price</strong></th>
												<th><strong>Delete</strong></th>
											</tr>
										</thead>
										<tbody>
											<?php
                        foreach($result as $row){
                      ?>
											<tr class="text-left">
												<td><?php echo $row['no']; ?></td>
												<?php 
                              $type=$row['type'];
                              $query="SELECT * FROM `type_master` WHERE `name`=? ";
                              include 'config.php';
                              $stmt=$conn->prepare($query);
                              $stmt->execute([$type]);
                              $res=$stmt->fetch();
                              $conn=null;
                            ?>
												<td><?php echo $res['name'];?></td>
												<td><?php echo $res['price'];?></td>
												<td><a href="back.php?room_delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw" style="color: white;"></i></a></td>
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
	swal("Room Deleted Successfully", "", "success");

</script>
<?php
      }
      else{
          ?>
<script type="text/javascript">
	swal("Error in Deleting Room", "", "error");

</script>
<?php
      }
  }
  if(isset($_GET['q'])){
    if($_GET['q']==1){
      ?>
<script type="text/javascript">
	swal("Room Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Error in adding room", "", "error");

</script>
<?php
    }
  }
?>
