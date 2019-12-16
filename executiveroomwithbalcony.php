<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'inc/head.php';?>
	<title>Krushnai Resort - ROYAL HONEYMOON SUITE
</title>
	<?php 
         $linum = 2;
         ?>
</head>

<body>
	<!-- ##### Header Area Start ##### -->
	<?php include 'inc/navbar.php'; ?>
	<!-- ##### Header Area End ##### -->
	<!-- ##### Breadcumb Area Start ##### -->
	<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url(img/krushnai/rooms/kbanner.jpg);">
		<div class="bradcumbContent">
			<h2>ROYAL HONEYMOON SUITE</h2>
		</div>
	</section>
	<!-- ##### Rooms Area Start ##### -->
	<section class="padding80">
		<div class="container-fluid hidethis" id="room_details_block_1">
			<div class="card w-100">
				<div class="row">
					<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 mx-auto detailspadding">
						<div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/krushnai/rooms/h1.jpg" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
									<img src="img/krushnai/rooms/h2.jpg" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
									<img src="img/krushnai/rooms/h3.jpg" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
									<img src="img/krushnai/rooms/h4.jpg" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
									<img src="img/krushnai/rooms/h5.jpg" class="d-block w-100" alt="...">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<div class="col-lg-5 col-md-8 col-sm-12 col-xs-12">
						<div class="room-details-description-rooms-page">
							<div class="text">
								<h5 class="card-title orangeheading">ROYAL HONEYMOON SUITE</h5>
								<p class="card-text" style="font-size: 15px;">This spacious suite with a King bed has a combined living area and bedroom. A well-appointed bathroom with jacuzzi and bathtub and selected amenities ensures you have a convenient and comfortable stay.This room are specially made for the couples who visit us for their honeymoon.


								</p>
								<h5 class="card-title orangeheading">Amenities</h5>
								<div class="row card-text margintop20">
									<div class="col-md-6" style="padding-left: 0px;">
										<div class="col"><i class="fa fa-wifi fa-right" aria-hidden="true"></i>Wifi</div>
										<div class="col"><i class="fa fa-clock-o fa-right" aria-hidden="true"></i>24/7 Room Service</div>
										<!-- <div class="col"><i class="fa fa-user fa-right" aria-hidden="true"></i>Fully AC Rooms</div> -->
										<!-- <div class="col"><i class="fa fa-tint fa-right" aria-hidden="true"></i>Hot & Cold Water</div> -->
										<!-- <div class="col"><i class="fa fa-circle-o-notch fa-right" aria-hidden="true"></i>Generator Backup</div> -->
									</div>
									<div class="col-md-6" style="padding-left: 0px;">
										<!-- <div class="col"><i class="fa fa-bed fa-right" aria-hidden="true"></i>Extra Mattress</div> -->
										<div class="col"><i class="fa fa-television fa-right" aria-hidden="true"></i>Tv</div>
										<!-- <div class="col"><i class="fa fa-newspaper-o fa-right" aria-hidden="true"></i>NewsPapers</div> -->
										<div class="col"><i class="fa fa-cutlery fa-right" aria-hidden="true"></i>Cafebar</div>
										<!-- <div class="col"><i class="fa fa-user fa-right" aria-hidden="true"></i>Laundry</div> -->
									</div>
								</div>
								<div class="row margintop20">
									<div class="col-lg-6 col-md-6" style="padding-left: 0px;">
										<a href="http://www.xmitter.com:4430/OnlineBooking/availability?propertyId=8a225b2645b465660145b64b22c60020"class="room-details-btn" id="room_details_1">Book Now
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ##### Footer Area Start ##### -->
	<?php include 'inc/footer.php'; ?>
	<!-- ##### Footer Area End ##### -->
	<!-- ##### All Javascript Script ##### -->
	<!-- jQuery-2.2.4 js -->
	<script src="js/jquery/jquery-2.2.4.min.js"></script>
	<!-- Popper js -->
	<script src="js/bootstrap/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- All Plugins js -->
	<script src="js/plugins/plugins.js"></script>
	<!-- Active js -->
	<script src="js/active.js"></script>

	<?php include 'inc/script.php'; ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#room_details_1").click(function() {
				$("#room_details_block_1").toggle();
			})

			$("#room_details_2").click(function() {
				$("#room_details_block_2").toggle();
			})

			$("#room_details_3").click(function() {
				$("#room_details_block_3").toggle();
			})

			$("#room_details_4").click(function() {
				$("#room_details_block_4").toggle();
			})

			$("#room_details_5").click(function() {
				$("#room_details_block_5").toggle();
			})
		})
	</script>
</body>
