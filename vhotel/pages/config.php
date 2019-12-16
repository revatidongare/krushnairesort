<?php
	$user='u429271489_metro';
	$pass='admin@123';
	$conn = new PDO('mysql:host=localhost;dbname=u429271489_hotel', $user, $pass);
	if (!$conn) {
		die("Connection failed: " . $conn->connect_error);
	}
  	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>
