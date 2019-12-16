<?php
  $q=$_REQUEST['id'];
	$query="SELECT * FROM `employee` WHERE `id`=?";
  include 'config.php';
  $stmt=$conn->prepare($query);
  $stmt->execute([$q]);
  $res=$stmt->fetch();
  $conn=null;
  $data=$res['name'];
	echo json_encode($data);
?>