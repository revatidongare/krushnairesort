<?php include 'examples/config.php'; ?>

<html lang="en">

<head>

  <title>
    vGymMS | Add Member
  </title>
  
</head>

<body class="">
    
    <?php
        date_default_timezone_set('Asia/Kolkata');
        $time_1 = "10:00:00";
        $time_2 = "12:00:00";
        
        if(time() >= strtotime($time_1) AND time() <= strtotime($time_2)){
            echo "Success";
        }
    ?>
    <form method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="password" placeholder="password">
        <input type="submit" name="submit">
    </form>
</body>
</html>


<?php 
    if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $q = "INSERT INTO `login`(`name`, `username`, `password`) VALUES ('$name', '$user', '$pass')";
    $res = mysqli_query($con, $q);
    }
?>