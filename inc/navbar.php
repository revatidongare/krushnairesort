<!-- ##### Header Area Start ##### -->
<header class="header-area" onscroll="changelogo();">
	<!-- Navbar Area -->
	<div class="palatin-main-menu">
		<div class="classy-nav-container breakpoint-off">
			<div class="container">
				<!-- Menu -->
				<nav class="classy-navbar justify-content-between" id="palatinNav">
					<!-- Nav brand -->
					<!-- logo1  -->
					<a id="brandlogo1" href="index.php" class="nav-brand"><img src="img/core-img/krushnairesortlogo.png" style = "margin-top: 0px;" alt=""></a>

					<!-- Navbar Toggler -->
					<div class="classy-navbar-toggler">
						<span class="navbarToggler"><span></span><span></span><span></span></span>
					</div>
					<!-- Menu -->
					<div class="classy-menu">
						<!-- close btn -->
						<div class="classycloseIcon">
							<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
						</div>
						<!-- Nav Start -->
						<div class="classynav">
							<ul>
								<li class="<?php if($linum == 1){echo "active";} ?>"><a href="index.php">Home</a></li>
								<li><a href="rooms.php">Accomodation</a>
									<ul class="dropdown">
										<li><a href="executiveroom.php">Executive Room</a></li>
										<li><a href="corporateroom.php">Royal Executive Room</a></li>
										<li><a href="suiteroom.php">Suite with Jacuzzi</a></li>
										<li><a href="executiveroomwithbalcony.php">Royal Honeymoon Suite</a></li>
									</ul>
								</li>

								<li><a href="">Events</a>
									<ul class="dropdown">
										<li><a href="corporate-event.php">Business Events</a></li>
										<li><a href="social-event.php">Social Events</a></li>
									</ul>
								</li>

								<li class="<?php if($linum == 3){echo "active";} ?>"><a href="services.php">Services</a></li>

								<li class="<?php if($linum == 4){echo "active";} ?>"><a href="gallery.php">Gallery</a></li>

								<li class="<?php if($linum == 5){echo "active";} ?>"><a href="contact.php">Contact</a></li>
								<li class="<?php if($linum == 6){echo "active";} ?>"><a href="payments.php">Pay Online</a></li>
								<li class="<?php if($linum == 7){echo "active";} ?>" style="background:rgb(181,138,96)"> <a  href="http://www.xmitter.com:4430/OnlineBooking/availability?propertyId=8a225b2645b465660145b64b22c60020" class="btn palatin-btn" style="padding-top: 9px;     margin-bottom: -7px; margin-top: -6px;">Make a Reservation</a></li>
								    
							<!-- <div class="menu-btn" style="padding-left:20px!important;">-->
								    
							<!--	<a href="http://www.xmitter.com:4430/OnlineBooking/availability?propertyId=8a23814b4cafe9ac014cb1f4d1870021" class="btn palatin-btn">Make a Reservation</a>-->
							<!--</div>-->

							</ul>
								
							<!-- Button -->
							 
						</div>
						<!-- Nav End -->
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
