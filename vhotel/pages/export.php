<?php  
//export.php  

//	$user='u429271489_metro';
// 	$pass='admin@123';
// 	$conn = new PDO('mysql:host=localhost;dbname=u429271489_hotel', $user, $pass);

$connect = mysqli_connect("localhost", "u429271489_metro", "admin@123", "u429271489_hotel");

$output = '';
if(isset($_GET["export_employee"]))
{
 $query = "SELECT * FROM employee WHERE lflag='0' ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
    <tr>  
        <th>Name</th>  
        <th>Address</th>  
        <th>Adhaar</th>  
       <th>Pan</th>
       <th>DOJ</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["address"].'</td>  
                         <td>'.$row["adhar"].'</td>  
       <td>'.$row["pan"].'</td>  
       <td>'.$row["doj"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Employee_Details.xls');
  echo $output;
 }
 else{
	header('location:index.php?q='.md5(404));
}
}
elseif(isset($_GET["export_asset"]))
{
 $query = "SELECT * FROM assets ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table-responsive table" bordered="3">  
    <tr>
        <th>Add Date</th>
        <th>Department</th>  
        <th>Name</th>  
        <th>Quantity</th>  
        <th>Maintanace_Date</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
    $department = $row["department"];
    $query="SELECT * FROM department_master WHERE id='$department'";
    $res = mysqli_fetch_assoc(mysqli_query($connect, $query));
   $output .= '
    <tr> 
        <td>'.$row["add_date"].'</td>  
        <td>'.$res["name"].'</td>  
        <td>'.$row["name"].'</td>  
        <td>'.$row["quantity"].'</td>  
        <td>'.$row["m_date"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Asset_Details.xls');
  echo $output;
 }
 else{
	header('location:index.php?q='.md5(404));
}
}
elseif(isset($_GET["export_room"]))
{
 $query = "SELECT * FROM room_management ORDER BY rno";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
    <tr>
        <th>Room No.</th>
        <th>Asset Name</th>  
        <th>Quantity</th>  
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr> 
        <td>'.$row["rno"].'</td>  
        <td>'.$row["asset"].'</td>  
        <td>'.$row["quantity"].'</td>  
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Room_Assets.xls');
  echo $output;
 }
 else{
	header('location:index.php?q='.md5(404));
}
}
else{
	header('location:index.php?q='.md5(404));
}
?>