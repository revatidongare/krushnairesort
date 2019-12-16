<?php
if(isset($_GET['id'])){
    $employee_id=$_GET['id'];
     $query="SELECT * FROM `employee` WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $stmt->execute([$employee_id]);
     $res=$stmt->fetch();
     $conn=null;
     $path="../upload/pan/".$res['panfile'];
     unlink($path);
     $path="../upload/adhar/".$res['adharfile'];
     unlink($path);
     $query="DELETE FROM `employee` WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res=$stmt->execute([$employee_id]);
     if($res){
        header("location:show_employees.php?delete=1");
     }
     else{
        header("location:show_employees.php?delete=2");
     }
}
?>