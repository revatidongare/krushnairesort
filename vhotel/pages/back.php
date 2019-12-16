<?php
  include 'session.php';
  if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $q = "SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?";
  include 'config.php';
  $stmt=$conn->prepare($q);
  $stmt->execute([$username,$password]);
  $row = $stmt->fetch();
  $conn=null;
  if ($row) {
    session_start();
    $_SESSION['admin'] = $username;
    header('location: index.php?login=1');
  }
  else{
    header('location: login.php?q=1');
  }
}
  if(isset($_POST['add_room'])){
    $room_no=$_POST['room_no'];
    $room_type=$_POST['room_type'];
    var_dump($room_type);
    $query="INSERT INTO `room_master`(`no`,`hotel_id`,`type`) VALUES (?,?,?)";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$room_no,$hotel_id,$room_type]);
    $conn=null;
    if($result){
      header("location:show_rooms.php?q=1");
    }
    else{
      header("location:show_rooms.php?q=2");
    }
  }
if(isset($_POST['add_department'])){
    $department=$_POST['department'];
    $query="INSERT INTO `department_master`(`name`,`hotel_id`) VALUES (?,?)";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$department,$hotel_id]);
    $conn=null;
    if($result){
      header("location:show_departments.php?q=1");
    }
    else{
      header("location:show_departments.php?q=2");
    }
  }
  if(isset($_GET['room_delete'])){
    $room=$_GET['room_delete'];
    $query="DELETE FROM `room_master` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$room]);
    $conn=null;
    if($result){
      header("location:show_rooms.php?delete=1");
    }
    else{
      header("location:show_rooms.php?delete=2");
    }
  }
  if(isset($_GET['product_delete'])){
    $product=$_GET['product_delete'];
    $query="DELETE FROM `product_master` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$product]);
    $conn=null;
    if($result){
      header("location:show_product.php?delete=1");
    }
    else{
      header("location:show_product.php?delete=2");
    }
  }
  
  if(isset($_GET['department_delete'])){
    $department=$_GET['department_delete'];
    $query="DELETE FROM `department_master` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$department]);
    $conn=null;
    if($result){
      header("location:show_departments.php?delete=1");
    }
    else{
      header("location:show_departments.php?delete=2");
    }
  }
  if(isset($_POST['add_member'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $name=$fname.' '.$lname;
    $department=$_POST['department'];
    $dob=$_POST['dob'];
    $doj=$_POST['doj'];
    $address=$_POST['address'];
    $adharno=$_POST['adharno'];
    $panno=$_POST['panno'];
    $pmobile=$_POST['pmobile'];
    $tmobile=$_POST['tmobile'];
    $path = "../upload/adhar/";
    
    $query="SELECT * FROM `employee` WHERE `adhar`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute([$adharno]);
    $count=$stmt->rowCount();
    if($count>0){
      header("location:add_employees.php?duplicate=1");
    }
    else{
      if ($_FILES["adharfile"]["error"] > 0)
      {
        echo "Return Code: " . $_FILES["adharfile"]["error"] . "<br>";
      }
      else
      {
        $temp = explode(".", $_FILES["adharfile"]["name"]);
        $img = round(microtime(true)) . '.' . end($temp);
        if (file_exists($path . $img))
        {
          echo $_FILES["adharfile"]["name"] . " already exists. ";
        }
        else
        {
           move_uploaded_file($_FILES["adharfile"]["tmp_name"], $path . $img);
        }
      }
      if(isset($_FILES["panfile"]["name"])){
        $path2 ="../upload/pan/";
        if ($_FILES["panfile"]["error"] > 0)
        {
         echo "Return Code: " . $_FILES["panfile"]["error"] . "<br>";
        }
        else
        {
          $temp1 = explode(".", $_FILES["panfile"]["name"]);
          $img1 = round(microtime(true)) . '.' . end($temp1);
          if (file_exists($path2 . $img1))
          {
           echo $_FILES["panfile"]["name"] . " already exists. ";
          }
          else
          {
            move_uploaded_file($_FILES["panfile"]["tmp_name"], $path2 . $img1);
          }
        }
      }else{
        $img1="0";  
      }
      $path3 ="../upload/profile/";
      if ($_FILES["profile"]["error"] > 0)
      {
        echo "Return Code: " . $_FILES["profile"]["error"] . "<br>";
      }
      else
      {
        $temp1 = explode(".", $_FILES["profile"]["name"]);
        $img2 = round(microtime(true)) . '.' . end($temp1);
        if (file_exists($path3 . $img2))
        {
          echo $_FILES["profile"]["name"] . " already exists. ";
        }
        else
        {
           move_uploaded_file($_FILES["profile"]["tmp_name"], $path3 . $img2);
        }
      }
      $query="INSERT INTO `employee`(`name`, `hotel`, `department`, `doj`, `dob`, `address`, `adhar`, `adharfile`, `pan`, `panfile`, `profile`, `pmobile`, `tmobile`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
       include 'config.php';
       $stmt=$conn->prepare($query);
       $res=$stmt->execute([$name,$hotel_id,$department,$doj,$dob,$address,$adharno,$img,$panno,$img1,$img2,$pmobile,$tmobile]);
       if(res){
         header("location:show_employees.php?add=1");
       }else{
        header("location:show_employees.php?add=2");
        }
    }
  }
  //Update Profile
  if(isset($_POST['update_profile'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $department=$_POST['department'];
    $dob=$_POST['dob'];
    $doj=$_POST['doj'];
    $adharno=$_POST['adhar'];
    $panno=$_POST['pan'];
    $pmobile=$_POST['pmobile'];
    $tmobile=$_POST['tmobile'];
     $query="UPDATE `employee` SET `name`=?,`department`=?,`doj`=?,`dob`=?,`address`=?,`adhar`=?,`pan`=?,`pmobile`=?,`tmobile`=? WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res=$stmt->execute([$name,$department,$doj,$dob,$address,$adharno,$panno,$pmobile,$tmobile,$id]);
     if(res){
       header("location:show_employees.php?update=1");
     }else{
      header("location:show_employees.php?update=2");
     }
  }
  if(isset($_POST['add_feedback'])){
     $id=$_POST['id'];
     $remark=$_POST['remark'];
     $feedback=$_POST['feedback'];
     $query="INSERT INTO `employee_feedback`(`employee`, `remark`, `feedback`) VALUES (?,?,?)";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res=$stmt->execute([$id,$remark,$feedback]);
     $conn=null;
     $query="UPDATE `employee` SET `lflag`=? WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res1=$stmt->execute([1,$id]);
     $conn=null;
     if($res && $res1){
      header("location:show_employees.php?feedback=1");
    }
    else{
      header("location:show_employees.php?feedback=2");
    }
  }
  if(isset($_POST['search_member'])){
    $aadhar=$_POST['aadhar'];
    $pan=$_POST['pan'];
     $query="SELECT * FROM `employee` WHERE `adhar`=? OR `pan`=? AND `hotel`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $stmt->execute([$aadhar,$pan,$hotel_id]);
     $row=$stmt->fetch();
     $res=$stmt->rowCount();
     $conn=null;
     if($res>0){
      header("location:show_feedback.php?employee=".urlencode($row['id']));
    }else{
      header("location:staff_history.php?q=1");
    }
  }
  if(isset($_POST['update_aadhar'])){
    $id=$_POST['id'];
    $query="SELECT * FROM `employee` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query); 
    $stmt->execute([$id]);
    $res=$stmt->fetch();
    $conn=null;
    $path="../upload/adhar/".$res['adharfile'];
    unlink($path);
    $path = "../upload/adhar/";
    //file upload code
    if($_FILES["adharfile"]["error"] > 0)
    {
      echo "Return Code: " . $_FILES["adharfile"]["error"] . "<br>";
    }
    else
    {
      $temp = explode(".", $_FILES["adharfile"]["name"]);
      $img = round(microtime(true)) . '.' . end($temp);
      if (file_exists($path . $img))
      {
        echo $_FILES["adharfile"]["name"] . " already exists. ";
      }
      else
      {
          move_uploaded_file($_FILES["adharfile"]["tmp_name"], $path . $img);
      }
    }
     $query="UPDATE `employee` SET `adharfile`=? WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res=$stmt->execute([$img,$id]);
     if($res){
       header("location:show_employees.php?aadhar=1");
     }else{
       header("location:show_employees.php?aadhar=2");
     }
  }
  if(isset($_POST['update_pan'])){
     $id=$_POST['id'];
     $query="SELECT * FROM `employee` WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $stmt->execute([$id]);
     $res=$stmt->fetch();
     $conn=null;
     $path2 ="../upload/pan/";
     if ($_FILES["panfile"]["error"] > 0)
     {
       echo "Return Code: " . $_FILES["panfile"]["error"] . "<br>";
     }
     else
     {
       $temp1 = explode(".", $_FILES["panfile"]["name"]);
       $img1 = round(microtime(true)) . '.' . end($temp1);
       if (file_exists($path2 . $img1))
       {
         echo $_FILES["panfile"]["name"] . " already exists. ";
       }
       else
       {
         move_uploaded_file($_FILES["panfile"]["tmp_name"], $path2 . $img1);
       }
     }  
     $query="UPDATE `employee` SET `panfile`=? WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res=$stmt->execute([$img1,$id]);
     if($res){
       header("location:show_employees.php?pan=1");
     }else{
       header("location:show_employees.php?pan=2");
     }
  }
  if(isset($_POST['update_profile_image'])){
    $id=$_POST['id'];
    $query="SELECT * FROM `employee` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query); 
    $stmt->execute([$id]);
    $res=$stmt->fetch();
    $conn=null;
    $path="../upload/profile/".$res['profile'];
    unlink($path);
    $path = "../upload/profile/";
    //file upload code
    if($_FILES["profile"]["error"] > 0)
    {
      echo "Return Code: " . $_FILES["profile"]["error"] . "<br>";
    }
    else
    {
      $temp = explode(".", $_FILES["profile"]["name"]);
      $img = round(microtime(true)) . '.' . end($temp);
      if (file_exists($path . $img))
      {
        echo $_FILES["profile"]["name"] . " already exists. ";
      }
      else
      {
          move_uploaded_file($_FILES["profile"]["tmp_name"], $path . $img);
      }
    }
     $query="UPDATE `employee` SET `profile`=? WHERE `id`=?";
     include 'config.php';
     $stmt=$conn->prepare($query);
     $res=$stmt->execute([$img,$id]);
     if($res){
       header("location:show_employees.php?profile=1");
     }else{
       header("location:show_employees.php?profile=2");
     }
  }
  if(isset($_POST['add_salary'])){
    $id=$_POST['emp_id'];
    $salary=$_POST['emp_salary'];
     $query="SELECT * FROM `employee` WHERE `id`=?";
     include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$id]);
    $count=$stmt->rowCount();
    $conn=null;
   if($count==1){
      $query="SELECT * FROM `basic_salary` WHERE `emp_id`=?";
      include 'config.php';
      $stmt=$conn->prepare($query);
      $result=$stmt->execute([$id]);
      $count1=$stmt->rowCount();
      $conn=null;
      if($count1==0){
        $query="INSERT INTO `basic_salary`(`emp_id`, `salary`) VALUES (?,?)";
        include 'config.php';
        $stmt=$conn->prepare($query);
        $res=$stmt->execute([$id,$salary]);
        if($res){
         header("location:add_salary.php?add=1");
        }else{
          header("location:add_salary.php?add=2");
        }
      }else{
        header("location:add_salary.php?duplicate=1");
      }
    }else{
      header("location:add_salary.php?no=1");
    }
   }
   if(isset($_POST['update_salary'])){
    $id=$_POST['empid'];
    $salary=$_POST['salary'];
    $query="UPDATE `basic_salary` SET `salary`=? WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    if($stmt->execute([$salary,$id])){
      header("location:show_salary.php?update=1");
    }else{
      header("location:show_salary.php?update=2");
    }
   }
   if(isset($_GET['salary_delete'])){
    $hotel=$_GET['salary_delete'];

    $query="DELETE FROM `basic_salary` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$hotel]);
    $conn=null;
    if($result){
      header("location:show_salary.php?delete=1");
    }
    else{
      header("location:show_salary.php?delete=2");
    }
  }
  if(isset($_POST['add_image'])){
    $category=$_POST['category'];
     $path = "../gallery/";
    if ($_FILES["image"]["error"] > 0)
      {
        echo "Return Code: " . $_FILES["image"]["error"] . "<br>";
      }
      else
      {
        $temp = explode(".", $_FILES["image"]["name"]);
        $img = round(microtime(true)) . '.' . end($temp);
        if (file_exists($path . $img))
        {
          echo $_FILES["image"]["name"] . " already exists. ";
        }
        else
        {
           move_uploaded_file($_FILES["image"]["tmp_name"], $path . $img); 
        }
      }
      $query="INSERT INTO `photo_upload`(`hotel_id`,`category`, `file`) VALUES (?,?,?)";
      include 'config.php';
      $stmt=$conn->prepare($query);
      $res=$stmt->execute([$hotel_id,$category,$img]);
      if($res){
        header("location:show_images.php?q=1");
      }else{
        header("location:show_images.php?q=2");
      }
  }
  if(isset($_GET['gallery'])){
    $id=$_GET['gallery'];
    $query="SELECT * FROM `photo_upload` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute([$id]);
    $res=$stmt->fetch();
    $conn=null;
    $path="../gallery/".$res['file'];
    unlink($path);
    $query="DELETE FROM `photo_upload` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$id]);
    if($result){
      header("location:show_images.php?delete=1");
    }else{
      header("location:show_images.php?delete=2");
    }
  }
  if(isset($_POST['add_price'])){
    $date=$_POST['date'];
    $price=$_POST['price'];
    $query="SELECT * FROM `custom_price` WHERE `date`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $stmt->execute([$date]);
    $count=$stmt->rowCount();
    $conn=null;
    if($count==1){
      $query="UPDATE `custom_price` SET `type1`=?,`type2`=?,`type3`=? WHERE `date`=? AND `hotel_id`=?";
      include 'config.php';
      $stmt=$conn->prepare($query);
      $res=$stmt->execute([$price[0],$price[1],$price[2],$date,$hotel_id]);
      if($res){
        header("location:add_custom_price.php?add=1");
      }else{
        header("location:add_custom_price.php?add=2");
      }
    }else{
      $query="INSERT INTO `custom_price`(`date`,`hotel_id`,`type1`, `type2`, `type3`) VALUES (?,?,?,?,?)";
      include 'config.php';
      $stmt=$conn->prepare($query);
      $res=$stmt->execute([$date,$hotel_id,$price[0],$price[1],$price[2]]);
      // $query1="INSERT INTO `room_inventory`(`date`, `category1`, `price1`, `category2`, `price2`, `category3`, `price3`) VALUES (?,?,?,?,?,?,?)";
      // $stmt=$conn->prepare($query1);
      // $res1=$stmt->execute([$date,1,6,2,6,3,6]);
      if($res){
        header("location:add_custom_price.php?add=1");
      }else{
        header("location:add_custom_price.php?add=2");
      }
    }
  }
  if(isset($_POST['update_room'])){
    $date=$_POST['date'];
    $count1=$_POST['count1'];
    $count2=$_POST['count2'];
    $count3=$_POST['count3'];
    $query="UPDATE `room_inventory` SET `count1`=?,`count2`=?,`count3`=? WHERE `date`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $res=$stmt->execute([$count1,$count2,$count3,$date]);
    if($res){
      header("location:room_update.php?update=1");
    }else{
      header("location:room_update.php?update=2");
    }
  }
  if(isset($_POST['change_password'])){
    $opassword = $_POST['opassword'];
    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];

    if($opassword == $password){
      if($npassword == $cpassword){
        $query = "UPDATE `admin` SET `password`= ? WHERE `id` = ?";
        include 'config.php';
        $stmt=$conn->prepare($query);
        $result=$stmt->execute([$npassword,$hotel_id]);
        if($result){
        header('location: change_password.php?change=2');
        }
       }else{
        header('location: change_password.php?change=3');
       }
    }else{
       header('location: change_password.php?change=1');
    }

  }
  if(isset($_POST['update_hotel_details'])){
    $h_id = $_POST['hotel_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $owner = $_POST['owner_name'];
    
    $query = "UPDATE `hotel_details` SET `hotel_name`=?,`owner`=?,`email`=?,`address`=?,`phone`=? WHERE `hotel_id`=? ";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result = $stmt->execute([$name,$owner,$email,$address,$phone,$h_id]);
    if($result){
    header('location: profile.php?change=1');
    }else{
    header('location: profile.php?change=2');
    }
  }
  if(isset($_GET['enquiry_delete'])){
    $department=$_GET['enquiry_delete'];
    $query="DELETE FROM `contact` WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$department]);
    $conn=null;
    if($result){
      header("location:index.php?delete=1");
    }
    else{
      header("location:index.php?delete=2");
    }
  }
  if(isset($_GET['enquiry_mark'])){
    $department=$_GET['enquiry_mark'];
    $query="UPDATE `contact` SET `flag`=? WHERE `id`=?";
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([1,$department]);
    $conn=null;
    if($result){
      header("location:index.php?update=1");
    }
    else{
      header("location:index.php?update=2");
    }
  }

  if (isset($_POST['save_asset'])) {
    include 'sessions.php';
    $m_date = "";
    if (isset($_POST['maintainance'])){
      if($_POST['maintainance'] == 1){
        $check = 1;
        $m_date = $_POST['m_date'];
      }else{
        $check = "";
      }
    }
    $dept = $_POST['dept'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

      $query="INSERT INTO `assets`(`name`,`hotel`,`department`,`quantity`,`mflag`,`m_date`) VALUES (?,?,?,?,?,?)";
      include 'config.php';
      $stmt=$conn->prepare($query);
      $res=$stmt->execute([$name, $hotel_id, $dept, $quantity, $check, $m_date]);
      if($res){
        header("location:asset_management.php?add=1");
      }else{
        header("location:asset_management.php?add=2");
      }
  }

  if (isset($_POST['room_asset'])) {
    include 'sessions.php';
    $rno = $_POST['rno'];
    $asset = $_POST['asset'];
    $quantity = $_POST['quantity'];

      $query="INSERT INTO `room_management`(`rno`,`asset`,`quantity`) VALUES (?,?,?)";
      include 'config.php';
      $stmt=$conn->prepare($query);
      $res=$stmt->execute([$rno, $asset,$quantity]);
      if($res){
        header("location:room_management.php?add=1");
      }else{
        header("location:room_management.php?add=2");
      }
  }

  if(isset($_POST['add_product'])){
    $name = $_POST['name'];
	
	  $query = "INSERT INTO `product_master` SET `name`=?,`hotel_id`=?";
    
    include 'config.php';
    $stmt=$conn->prepare($query);
    $result = $stmt->execute([$name,$hotel_id]);
    if($result){
    header('location: show_product.php?change=1');
    }else{
    header('location: add_product.php?change=2');
    }
  }

 if(isset($_POST['customer_enquiry'])){
    $name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$requirement=$_POST['requirement'];
	  
	  $query="INSERT INTO `contact` SET `hotel_id`=?,`name`=?,`phone`=?,`email`=?,`requirement`=?";
	include 'config.php';
    $stmt=$conn->prepare($query);
    $result=$stmt->execute([$hotel_id,$name,$phone,$email,$requirement]);
		if($result){
		    


// Replace with your username
$user="divya_vinnovate";

// Replace with your API KEY (We have sent API KEY on activation email, also available on panel)
$apikey="y3qvhsF1CspiqN40OXt0"; 

// Replace if you have your own Sender ID, else donot change
$senderid = "METROPOLE"; 

// Replace with the destination mobile Number to which you want to send sms
$mobile=$phone; 

// Replace with your Message content
$message="Your response has been received. We will revert you shortly."; 
$message=urlencode($message);

// For Plain Text, use "txt" ; for Unicode symbols or regional Languages like hindi/tamil/kannada use "uni"
$type="txt";

$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);      
    curl_close($ch); 

// Display MSGID of the successful sms push
echo $output;




		    
		    
		    
		    
    header('location: ../../index.php?change=1');
    }else{
    header('location: ../../contact.php?change=2');
    }	
 }

?>
