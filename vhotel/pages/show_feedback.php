<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>
    <?php echo $hotel_name; ?> | Show Feedback Result
  </title>
  <?php include 'head.php'; ?>
  <?php
    $subtitle = "Show Feedback Result";
    $linum = 4;
  ?>
  <?php
    if(isset($_GET['employee'])){
        $id=$_GET['employee'];
        $query="SELECT * FROM `employee` WHERE `id`=?";
        include 'config.php';
        $stmt=$conn->prepare($query);
        $stmt->execute([$id]);
        $row=$stmt->fetch();
        $conn=null;
        $name=$row['name'];

        $query="SELECT * FROM `employee_feedback` WHERE `employee`=?";
        include 'config.php';
        $stmt=$conn->prepare($query);
        $stmt->execute([$id]);
        $feedback=$stmt->fetch();
        $conn=null;      
    }
  
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
                <h5 class="title">Feedback Employee</h5>
              </div>
              <hr>
              <div class="card-body">
                <form method="post" action="back.php">
                  <div class="card-header">
                    <h5 class="title"></h5>
                  </div>
                  <?php

                  ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="name">Name of Employee</label>
                        <input type="text" class="form-control" placeholder="<?php echo $name;?>" name="name" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="remark">Remark of Employee</label>
                        <input type="text" class="form-control" placeholder="<?php echo $feedback['remark'];?>" name="pan" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="feedback">Feedback of Employee</label>
                        <input type="text" class="form-control" placeholder="<?php echo $feedback['feedback'];?>" name="feedback" disabled>
                      </div>
                    </div>  
                  </div>                  
                  <!-- <button class="btn btn-info btn-lg btn-block" type="submit" name="search_member" value="add_member">Search</button> -->
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
        swal("There is no information for given Entry","","error");
      </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        swal("Error in adding Department","","error");
      </script>
      <?php
    }
  }
?>
