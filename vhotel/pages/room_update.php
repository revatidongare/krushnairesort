<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>
    <?php echo $hotel_name; ?> | Update Room Inventory
  </title>
  <?php include 'head.php'; ?>
  <?php
    $subtitle = "UPDATE ROOM INVENTORY";
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
                <h5 class="title">UPDATE ROOM INVENTORY</h5>
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
                      <button class="btn btn-info btn-md btn-block mx-auto" type="submit" name="search_date">Open Inventory</button>
                    </div>
                  </div>
                </form>
                <?php
                    if(isset($_POST['search_date'])){
                      $date=$_POST['date'];
                ?>
                <?php
                    $query="SELECT * FROM `room_inventory` WHERE `date`=?";
                    include 'config.php';
                    $stmt=$conn->prepare($query);
                    $stmt->execute([$date]);
                    $res=$stmt->fetch();
                    $conn=null;
                    ?>
                  <form method="post" action="back.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Room Category</label>
                        <?php
                          $category1=$res['category1'];
                          $query="SELECT * FROM `type_master` WHERE `id`=?";
                          include 'config.php';
                          $stmt=$conn->prepare($query);
                          $stmt->execute([$category1]);
                          $row1=$stmt->fetch();
                          $conn=null;
                        ?>
                        <input class="form-control" type="text" name="category1" value="<?php echo $row1['name'];?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Set Price</label>
                        <input class="form-control" type="number" name="count1" value="<?php echo $res['count1'];?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Room Category</label>
                        <?php
                          $category2=$res['category2'];
                          $query="SELECT * FROM `type_master` WHERE `id`=?";
                          include 'config.php';
                          $stmt=$conn->prepare($query);
                          $stmt->execute([$category2]);
                          $row2=$stmt->fetch();
                          $conn=null;
                        ?>
                        <input class="form-control" type="text" name="category2" value="<?php echo $row2['name'];?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Set Price</label>
                        <input class="form-control" type="number" name="count2" value="<?php echo $res['count2'];?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Room Category</label>
                        <?php
                          $category3=$res['category3'];
                          $query="SELECT * FROM `type_master` WHERE `id`=?";
                          include 'config.php';
                          $stmt=$conn->prepare($query);
                          $stmt->execute([$category3]);
                          $row3=$stmt->fetch();
                          $conn=null;
                        ?>
                        <input class="form-control" type="text" name="category3" value="<?php echo $row3['name'];?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Set Price</label>
                        <input class="form-control" type="number" name="count3" value="<?php echo $res['count3'];?>" required>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="date" value="<?php echo $date;?>">
                  <button class="btn btn-info btn-lg btn-block" type="submit" name="update_room">Update Room</button>      
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
        swal("Price Added Successfully","","success");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in adding price","","error");
      </script>
      <?php
    }
  }
?>
