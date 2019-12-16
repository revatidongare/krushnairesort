<?php
if(isset($_GET['id'])){
    $employee_id=$_GET['id'];
     $query="UPDATE `employee` SET `lflag`=? WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $stmt->execute([1,$employee_id]);
     $res=$stmt->fetch();
     $conn=null;
     
	if($stmt){
        header("location:show_employees.php?delete=1");
     }
     else{
        header("location:show_employees.php?delete=2");
     }
}
?>