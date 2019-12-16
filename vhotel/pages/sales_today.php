<?php include 'variables.php';?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>
    <?php echo $gym_name; ?> | Today's Payment Report
  </title>
  <?php include 'head.php';
        include 'config.php';
  ?>
  <?php
    $subtitle = "TODAY'S PAYMENT REPORT";
    $linum = 4;
  ?>
  <style media="screen">
    .table > thead > tr >th{
      font-size: 1rem!important;
      /* font-weight: bold!important; */
    }
  </style>
</head>
<?php
    $today = date("Y-m-d");
  ?>
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
                <h4 class="card-title"> Today's Payment Report</h4>
              </div>
              <div class="card-body">
                <div>
                  <a href="export_sales_today.php" class="btn btn-info btn-lg">Export To Excel</a>
                </div>
                <div class="table-responsive">
                  <?php
                  $myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
                  ?>
                <?php
                  $q2 = "SELECT * FROM `payments` WHERE `gym_id`= '$gym_id' AND `sys_date` = '$today'";
                  $res2 = mysqli_query($con, $q2);
                ?>
                  <table class="table" id="dataTable">
                    <thead class=" text-primary">
                      <tr>
                          <th><strong>Reciept No.</strong></th>
                          <th><strong>Member ID</strong></th>
                          <th><strong>Member Name</strong></th>
                          <th><strong>Date of Payment</strong></th>
                          <th><strong>Amount Paid</strong></th>
                          <th><strong>Type</strong></th>
                          <th><strong>Payment Mode</strong></th>
                          <th><strong>Delete</strong></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($row = mysqli_fetch_array($res2)){
                      ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['member_id']; ?></td>
                          <td><?php
                                $mid = $row['member_id'];
                                $q2 = "SELECT * FROM `member_details` WHERE `gym_id`= '$gym_id' AND `id` = '$mid'";
                                $res = mysqli_query($con, $q2);
                                $row2 = mysqli_fetch_array($res);
                                echo $row2['name']; ?>
                          </td>
                          <td><?php echo date("d-m-Y",strtotime($row['sys_date'])); ?></td>
                          <td><?php echo $row['amount']; ?></td>
                          <td><?php echo $row['type']; ?></td>
                          <td><?php echo $row['mode']; ?></td>
                          <td class="text-center"><a href="delete_sales.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-fw" style="color: white;"></i></a></td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                    <tfoot>
                      <?php
                    $q3 = "SELECT count(*) as `total_count`, sum(amount) as `total_amount` FROM `payments` WHERE `gym_id`= '$gym_id' AND `sys_date` = '$today'";
                    $res3 = mysqli_query($con, $q3);
                    $row3 = mysqli_fetch_array($res3);
                    $total_count = $row3['total_count'];
                    $total_amount = $row3['total_amount'];
                  ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Total entries: <?php echo $total_count; ?></b></td>
                    <td><b>Total Amount: <?php echo $total_amount; ?> /-</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tfoot>
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
  if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    ?>
    <script type="text/javascript">
    swal({
      title: "You want to delete payment?",
      text: "Once deleted, you will not be able to recover this payment details!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        <?php
          $qd="DELETE FROM `payments` WHERE `id` = '$delete_id'";
          $rd = mysqli_query($con,$qd);

        ?>
        swal("Poof! Your payment details has been deleted!", {
          icon: "success",
        })
        .then((willreload)=> {
          if (willreload) {
            window.location.href = "sales_today.php";
          }
        });
      } else {
        swal("Your payment details are safe!");
      }
      });
    </script>
    <?php
  }

?>
