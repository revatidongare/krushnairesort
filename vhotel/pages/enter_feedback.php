<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>
    <?php echo $hotel_name; ?> | Add Feeedback
  </title>
  <?php include 'head.php'; ?>
  <?php
    $subtitle = "ADD FEEDBACK";
    $linum = 2;
    $id=$_GET['id'];
    $query="SELECT * FROM `employee_feedback` WHERE `employee`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute([$id]);
    $count=$stmt->rowCount();
    if($count==1){
      header("location:show_employees.php?enter=1");
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
                <h5 class="title">Add FEEDBACK</h5>
              </div>
              <hr>
              <div class="card-body">
                <form method="post" action="back.php">
                  <div class="card-header">
                    <h5 class="title"></h5>
                  </div>
                  <?php 
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $query="SELECT * FROM `employee` WHERE `id`=?";
                        include 'config.php';
                        $stmt=$conn->prepare($query);
                        $stmt->execute([$id]);
                        $employee=$stmt->fetch();
                        $conn=null;
                    }
                  ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="name">Name Of Employee</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $employee['name'];?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <select class="form-control" id="remark" name="remark" required>
                                <option value="">Select</option>
                                <option value="Bad">Bad</option>
                                <option value="Average">Average</option>
                                <option value="Good">Good</option>
                                <option value="Excellent">Excellent</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="feedback">Enter Feedback</label>
                            <input type="text" name="feedback" class="form-control">
                        </div>
                      </div>
                  </div>
                  <input type="hidden" value="<?php echo $id;?>" name="id">
                  <button class="btn btn-info btn-lg btn-block" type="submit" name="add_feedback">Add Feedback</button>
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
        swal("Department Added Successfully","","success");
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
