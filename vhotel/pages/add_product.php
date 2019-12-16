<?php include 'variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>
    <?php echo $hotel_name; ?> | Product Master
  </title>
  <?php include 'head.php'; ?>
  <?php
    $subtitle = "Product Master";
    $linum = 2;
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
                <h5 class="title">Product Master</h5>
              </div>
              <hr>
              <div class="card-body">
                <form method="post" action="back.php">
                  <div class="card-header">
                    <h5 class="title"></h5>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="adhar">Enter Product Name</label>
                        <input type="text" class="form-control" placeholder="" name="name">
                      </div>
                    </div>
                  </div>
<!--
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="pan">Enter PAN Card No</label>
                        <input type="text" class="form-control" placeholder="OJMLK23E" name="pan">
                      </div>
                    </div>
                  </div>
-->
                  <button class="btn btn-info btn-lg btn-block" type="submit" name="add_product" value="add_member">Submit</button>
															
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
