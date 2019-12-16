<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>
		<?php echo $hotel_name; ?> | Add Rooms
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "ADD NEW ROOM";
    $linum = 2;
    //Getting the Tpye of room
    $query="SELECT * FROM `type_master`";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result_for_type=$stmt->fetchAll();
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
								<h5 class="title">Add Room</h5>
							</div>
							<hr>
							<div class="card-body">
								<form method="post" action="back.php">
									<div class="card-header">
										<h5 class="title"></h5>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="room">Enter Room No</label>
												<input type="text" class="form-control" id="room" name="room_no" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="rtype">Select Room Type</label>
												<select class="form-control" id="rtpye" name="room_type" required>
													<option value="">None</option>
													<?php
                             foreach($result_for_type as $row){
                          ?>
													<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?>
													</option>
													<?php
                            }
                          ?>
												</select>
											</div>
										</div>
									<button class="btn btn-info btn-lg btn-block m-3" type="submit" name="add_room" value="add_room">Add Room</button>
							</div>
							</form>
							<!--<a href="room_update.php" > Update Room Inventory </a>-->
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
	swal("Detail Added Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
	swal("Detail in adding Hotel", "", "error");

</script>
<?php
    }
  }
?>
