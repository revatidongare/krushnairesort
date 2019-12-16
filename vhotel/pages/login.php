<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login : vHotel Portal</title>
    <?php include 'head.php';?>
  </head>
  <body style="background:url('../assets/img/hotel.jpg') no-repeat center center fixed;background-size: cover;">
    <div class="container">
  <div class="row">
    <div class="col-md-12 text-center mt-5" style="color:black;">
      <h1><strong>Welcome!</strong></h1>
    </div>
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-3">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center"><strong>Sign In</strong></h5>
          <form class="form-signin" method="post" action="back.php">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
              <label for="inputEmail">Username</label>
            </div>

            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
              <label for="inputPassword">Password</label>
            </div>
              <!-- <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputEmail">Confirm Password</label>
              </div> -->
            <!-- <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div> -->
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  </body>
</html>
<?php
  if(isset($_GET['q'])){
    if($_GET['q']==1){
      ?>
      <script type="text/javascript">
        swal("Credentials Incorrect","error");
      </script>
      <?php
    }
    // if($_GET['q']==3){
    //   ?>
    //   <script type="text/javascript">
    //     swal("Password Doesn't Match ","warning");
    //   </script>
    //   <?php
    // }
  }
?>
