<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>
    <?php echo $hotel_name; ?> | All Member Details
  </title>
  <?php include 'head.php'; ?>
  <?php
    $subtitle = "ALL MEMBER DETAILS";
    $linum = 3;
  ?>
  <style media="screen">
    .table > thead > tr >th{
      font-size: 1rem!important;
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
                <h4 class="card-title"> All Employees details</h4>
              </div>
              <div class="card-body">
                <div>
                  <!-- <a href="export_all_member_details.php" class="btn btn-info btn-lg">Export To Excel</a> -->
                </div>
                <div class="mt-3 table-responsive">
                  <?php
                      $q2 = "SELECT * FROM `employee` WHERE `hotel`=? AND `lflag`=?";
                      include 'config.php';
                      $stmt=$conn->prepare($q2);
                      $stmt->execute([$hotel_id,1]);
                      $res2=$stmt->fetchAll();
                      $conn=null;
                    ?>
                  <table id="dataTable" class="table">
                    <thead class=" text-primary">
                      <tr>
                          <th><strong>Member ID</strong></th>
                          <th><strong>Name</strong></th>
                          <th><strong>Department</strong></th>
<!--                          <th><strong> Id Card</strong></th>-->
                          <th><strong>View Complete Details</strong></th>
                          <th><strong>Delete Member</strong></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($res2 as $row){
                      ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
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
<!--                            <td class="text-left"><a href="generate_id.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fas fa-portrait " style="color: white;"></i></a></td>       -->
                            <td class="text-center"><a href="view_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-user fa-fw" style="color: white;"></i></a></td>
                            <td class="text-center"><a href="delete_member.php?id=<?php echo $row['id']; ?>"  class="btn btn-danger"><i class="fa fa-trash fa-fw" style="color: white;"></i></a></td>
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
  if(isset($_GET['add'])){
    if($_GET['add']==1){
      ?>
      <script type="text/javascript">
        swal("Employee Added Successfully","","success");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in adding employee","","error");
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
        swal("Employee Deleted Successfully","","success");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in deleting employee","","error");
      </script>
      <?php
    }
  }
?>
<?php
  if(isset($_GET['update'])){
    if($_GET['update']==1){
      ?>
      <script type="text/javascript">
        swal("Employee Date Updated Successfully","","success");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in updating employee data","","error");
      </script>
      <?php
    }
  }
?>
<?php
  if(isset($_GET['feedback'])){
    if($_GET['feedback']==1){
      ?>
      <script type="text/javascript">
        swal("Feedback Entered Successfully","","success");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in entering employee feedback","","error");
      </script>
      <?php
    }
  }
?>
<?php
  if(isset($_GET['aadhar'])){
    if($_GET['aadhar']==1){
      ?>
      <script type="text/javascript">
        swal("Aadhar Updated Successfully","","success");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in updating aadhar","","error");
      </script>
      <?php
    }
  }
?>
<?php
  if(isset($_GET['pan'])){
    if($_GET['pan']==1){
      ?>
      <script type="text/javascript">
        swal("PAN Updated Successfully","","success");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in updating PAN","","error");
      </script>
      <?php
    }
  }
?>
<?php
  if(isset($_GET['enter'])){
    if($_GET['enter']==1){
      ?>
      <script type="text/javascript">
        swal("Feedback Already Added for Employee","","error");
      </script>
      <?php
    }
  }
?>