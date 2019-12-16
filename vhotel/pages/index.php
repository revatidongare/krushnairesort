<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    <?php echo $hotel_name; ?> | Dashboard
  </title>
  <?php include 'head.php'; ?>
  <?php
    $subtitle = "Dashboard";
    $linum = 1;
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
                <h4 class="card-title">Enquiry From Website</h4>
              </div>
              <div class="card-body">
                <div>
                </div>
                <div class="mt-3 table-responsive">
                  <?php
                      $query = "SELECT * FROM `contact` ORDER BY `id` DESC";
                      include 'config.php';
                      $stmt=$conn->prepare($query);
                      $stmt->execute();
                      $result = $stmt->fetchAll();
                      $conn=null;
                    ?>
                  <table id="dataTable" class="table">
                    <thead class=" text-primary">
                      <tr class="text-left">
                        <th><strong>No</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Phone</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Show Requirement</strong></th>
                        <th><strong>Mark as Shown</strong></th>
                        <th><strong>Delete Enquiry</strong></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($result as $row){
                      ?>
                      <tr class="text-left">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['requirement'];?></td>
                        <?php
                              if($row['flag']==0){
                                ?>
                        <td><a href="back.php?enquiry_mark=<?php echo $row['id']; ?>" class="btn btn-info">Mark as seen</a></td>
                        <?php
                              }else{
                                ?>
                        <td>Seen</td>
                        <?php
                              }
                            ?>
                        <td><a href="back.php?enquiry_delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw" style="color: white;"></i></a></td>
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
  if(isset($_GET['login'])){
      if($_GET['login']==1){
?>
<script type="text/javascript">
  swal("Welcome to <?php echo $hotel_name; ?>", "", "success");

</script>
<?php
      }
      else{
          ?>
<script type="text/javascript">
  swal("Error in Deleting Department", "", "error");

</script>
<?php
      }
  }
  if(isset($_GET['q'])){
    if($_GET['q']==1){
?>
<script type="text/javascript">
  swal("Department Added Successfully", "", "success");
</script>
<?php 
    }elseif($_GET['q'] == md5(404)){
?>
<script type="text/javascript">
  swal("Unable to process request", "", "error");
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
<?php
 if(isset($_GET['delete'])){
    if($_GET['delete']==1){
      ?>
<script type="text/javascript">
  swal("Enquiry Deleted Successfully", "", "success");

</script>
<?php
    }else{
      ?>
<script type="text/javascript">
  swal("Error in deleting enquiry", "", "error");

</script>
<?php
    }
  }
?>
