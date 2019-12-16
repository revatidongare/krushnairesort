<?php
if(isset($_GET['id'])){
    $asset_id=$_GET['id'];
     $query="DELETE FROM `assets` WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res=$stmt->execute([$asset_id]);
     if($res){
        header("location:asset_management.php?d=1");
     }
     else{
        header("location:asset_management.php?delete=2");
     }
}
?>