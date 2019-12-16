<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>
		<?php echo $hotel_name; ?> | Add Product Master
	</title>
	<?php include 'head.php'; ?>
	<?php
    $subtitle = "Product Master";
    $linum = 3;
     
    //Function for Hotel Name
    $query="SELECT * FROM `hotel_details`";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $result_for_hotel=$stmt->fetchAll();
    $conn=null;


  ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>
<style>
	.form-control[disabled],
	.form-control[readonly],
	fieldset[disabled] .form-control {
		background-color: white;
	}

</style>

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
								<h5 class="title">Current Product Details</h5>
							</div>
							<hr>
							<div class="card-body">
								<!--
                <div style="float: right">
                  <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">+ Add Asset</button>
                </div>
-->
								<div class="mt-3 table-responsive">
									<?php
                      $q2 = "SELECT * FROM `product_master` where `hotel_id`=? ";
                      include 'config.php';
                      $stmt=$conn->prepare($q2);
                      $stmt->execute([$hotel_id]);
                      $res2=$stmt->fetchAll();
                      $conn=null;
                    ?>
									<table id="dataTable" class="table">
										<thead class=" text-primary">
											<tr>
												<th><strong>Id</strong></th>
												
												<th><strong>Product Name</strong></th>
											    <th><strong>Delete</strong></th>
												<!--
                          <th><strong>Count Date</strong></th>
                          <th><strong>Quantity</strong></th>
                          <th><strong>Maintainance ?</strong></th>
                          <th><strong>Maintainance Date</strong></th>
-->
											</tr>
										</thead>
										<tbody>
											<?php
                        foreach($res2 as $row){
                      ?>
											<tr>
												<td><?php echo $row['id']; ?></td>
												<!--                            <td><?php echo $row['hotel_id']; ?></td>-->
												<td><?php echo $row['name']; ?></td>
												<td><a href="back.php?product_delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw" style="color: white;"></i></a></td>
											</tr>




											<!--
                        <tr>
                            <?php
                                $department=$row['department'];
                                $query="SELECT * FROM `department_master` WHERE `id`=?";
                                include 'config.php';
                                $stmt=$conn->prepare($query);
                                $stmt->execute([$department]);
                                $department_name=$stmt->fetch();
                                $conn=null;
                            ?>
                            <td><?php echo $department_name['name'];?></td>   
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['add_date']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>
                              
                              <?php 
                                if($row['mflag'] == '1'){
                              ?>
                                <i class="fa fa-check text-success"></i>
                              <?php }else{ ?>
                                <i class="fa fa-times text-danger"></i>
                            <?php
                              }
                            ?>
                              
                            </td>
                            <td>
                              <?php
                                if($row['mflag'] == '1'){
                                echo $row['m_date'];

                               }else{ ?>
                                <i class="fa fa-times danger"></i>
                            <?php
                              }
                            ?>
                              
                            </td>
                            
                        </tr>
-->
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

				<!-- Modal -->
				<!--
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Asset</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="back.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <?php
                    $query = "SELECT * FROM `department_master` WHERE `hotel_id`=?";
                    include 'config.php';
                    $stmt=$conn->prepare($query);
                    $stmt->execute([$hotel_id]);
                    $result = $stmt->fetchAll();
                    $conn=null;
                  ?>
                    
                  <select class="form-control" name="dept">
                    <?php
                        foreach($result as $row){
                      ?>
                    <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                  </select>
                <?php } ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Asset Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="maintainance" value="1">
                    </div>
                  </div>
                  <input type="text" disabled="" class="form-control" aria-label="Text input with checkbox" value="Is Maintainance Required ?">
                </div>
                <div class="form-group">
                  <label for="m_date">Maintainance Date</label>
                  <input type="date" class="form-control" name="m_date" id="m_date">
                </div>
                <script>
                  flatpickr('#m_date', {
                      enableTime: true
                  })
                </script>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save_asset">Save Asset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
-->

			</div>
			<?php include 'footer.php';?>
		</div>
	</div>
	<?php include 'scripts.php';?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php
  if(isset($_GET['q'])){
    if($_GET['q']==1){
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
