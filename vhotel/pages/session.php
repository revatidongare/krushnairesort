<?php
  session_start();
  if(isset($_SESSION['admin'])){
    $user1 = $_SESSION['admin'];

    $query = "SELECT * FROM `admin` WHERE `username` = ?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute([$user1]);
    $r = $stmt->fetch();
    $conn=null;
    $hotel_id=$r['id'];
    $hotel_name = $r['name'];
    $password = $r['password'];
  }
  else{
    header('location: login.php');
  }
?>
