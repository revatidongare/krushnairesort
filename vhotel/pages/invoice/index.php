<?php include '../variables.php';?>
<!DOCTYPE html>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title><?php echo $gym_name; ?> | INVOICE</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	

</head>

<body>
	<?php 
		$id = $_GET['id'];
		include '../config.php';
		$q = "SELECT * FROM `payments` WHERE `id` = '$id' AND `gym_id` = '$gym_id'";
		
		$result = mysqli_query($con, $q);
		$row = mysqli_fetch_array($result);

		$member_id = $row['member_id'];

		$q2 = "SELECT * FROM `member_details` WHERE `id` = '$member_id' AND `gym_id` = '$gym_id'";
		$res = mysqli_query($con, $q2);
		$row2 = mysqli_fetch_array($res);
		$member_name = $row2['name'];

    $q3 = "SELECT * FROM `gym_details` WHERE `gym_id` = '$gym_id'";
    $res3 = mysqli_query($con,$q3);
    $row3 = mysqli_fetch_array($res3);
    
	?>

	<div id="page-wrap">

		<div id="header" style="padding: 2% 1% 4% 1%; margin-top: 10%;">INVOICE</div>
		
		<div id="identity">
		
            <div id="address">
            	<?php echo $gym_name; ?><br>
            	<?php echo $row3['address'];?><br>
            	<?php echo $row3['phone'];?>
			</div>

            <div id="logo" style="margin-top: 5px;">
              <img id="image" src="images/logo2.jpeg" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

			<div id="customer-title"><span style="font-weight: bold;"><?php echo $gym_name;?></span><br><?php echo $row3['email'];?></div>
			
		

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>

                    <td class="meta-head">Billing Date</td>
                    <td><?php echo date("d-m-Y", strtotime($row['sys_date'])); ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><?php echo $row['amount']; ?></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Member ID</th>
		      <th>Member Name</th>
		      <th>Phone Number</th>
		      <th>From Date</th>
		      <th>To Date</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td><?php echo $member_id; ?></td>
		      <td><?php echo $member_name; ?></td>
		      <td><?php echo $row2['phone']; ?></td>
		      <td><?php echo date("d-m-Y", strtotime($row['from_date'])); ?></td>
		      <td><?php echo date("d-m-Y", strtotime($row['to_date'])); ?></td>
		  </tr>
		 
		  
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="1" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php echo $row['amount']; ?></div></td>
		  </tr>
		  <tr>

		      <td colspan="3" class="blank"> </td>
		      <td colspan="1" class="total-line">Total</td>
		      <td class="total-value"><div id="total"><?php echo $row['amount']; ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="1" class="total-line">Amount Paid</td>

		      <td class="total-value"><?php echo $row['amount']; ?></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="1" class="total-line balance">Balance Due</td>
		      <td class="total-value balance">0.00</td>
		  </tr>
		
		</table>
		
		<!-- <div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div> -->
	
	</div>

<hr>
	<div class="text-center mb-5" id="hide-this" style="display: block;">
	    <a href="../index.php" class="btn btn-danger btn-lg">Go Home</a>
		<button onclick="print_reciept()" class="btn btn-warning btn-lg">Print Reciept</button>
	</div>
<script>
	function print_reciept(){
		var x = document.getElementById("hide-this");
		x.style.display = "none";

		window.print();

		x.style.display = "block";
	}
</script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
</body>

</html>