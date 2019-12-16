<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'inc/head.php';?>
	<title>Krushnai Resort - Contact</title>
	<?php 
        $linum = 5;
     ?>
</head>

<body>
	<!-- ##### Header Area Start ##### -->
	<?php include 'inc/navbar.php'; ?>
	<!-- ##### Header Area End ##### -->

	<!-- ##### Breadcumb Area Start ##### -->
	<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url(img/krushnai/contact1-banner.JPG);">
		<div class="bradcumbContent">
			<h2>Contact</h2>
		</div>
	</section>
	<!-- ##### Breadcumb Area End ##### -->

	<!-- ##### Contact Form Area Start ##### -->
	<div class="container mb-5 section-padding-100-0">
		<div class="section-heading text-center">
			<!-- <div class="line-"></div> -->
			<h2>Get In Touch</h2>
			<img src="img/core-img/decoration-1.png" width="10%" alt="Image">
		</div>
		<form method="post" action="vhotel/pages/back.php">
			<div class="form-group">
				<div class="form-group">
					<label for="exampleInputPassword1">Name</label>
					<input type="text" class="form-control" id="business-event-name" placeholder="Your Name" name="name" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Phone Number</label>
					<input type="text" class="form-control" id="business-event-number" placeholder="Your Number" name="phone" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Your Requirement</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="requirement" required ></textarea>
				</div>

				<button type="submit" class="btn palatin-btn" name="customer_enquiry">Submit</button>
			</div>
		</form>
	</div>
	<!-- ##### Contact Form Area End ##### -->

	<!-- ##### Google Maps ##### -->

	<!--<div class="map-area mb-100">-->
	<!--	<div class="container">-->
	<!--		<div class="row">-->
	<!--			<div class="col-12">-->
	<!--				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3778.0136080889097!2d73.40335241491016!3d18.75292918727411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be801102328146d%3A0x9672de96f146d96d!2sHotel+The+Metropole!5e0!3m2!1sen!2sin!4v1555683245784!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->

<a></a>
	<section class="contact-area d-flex flex-wrap align-items-center container section-padding-100">
		<div class="home-map-area">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3778.007769531098!2d73.40208731472438!3d18.753189987273924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be801106909869b%3A0x53e64c9492bf8845!2sKrushnai%20Resort!5e0!3m2!1sen!2sin!4v1575290938963!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
		<!-- Contact Info -->

		<div class="contact-info section-padding-100">
			<div class="section-heading wow fadeInUp" data-wow-delay="100ms">
				<!-- <div class="line-"></div> -->
				<h2>Contact Info</h2>
				<img src="img/core-img/decoration-1.png" width="30%" alt="Image">
			</div>
			<p class="wow fadeInUp" data-wow-delay="300ms" style="font-size: 20px;">Krushnai Resort Old Mumbai Pune Highway, Opp Kumar Water Park, Lonavla, Maharashtra 410401</p>
			<p class="wow fadeInUp" data-wow-delay="400ms" style="font-size: 16px;">08380096375</p>
			<p class="wow fadeInUp" data-wow-delay="500ms" style="font-size: 16px;">support@krushnairesort.com</p>

			<!-- Social Info -->
			<!-- <div class="social-info mt-50 wow fadeInUp" data-wow-delay="600ms">
				<a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>

			</div> -->
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

</body>

</html>
