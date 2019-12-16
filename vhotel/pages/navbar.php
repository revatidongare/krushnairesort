<nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<div class="navbar-toggle">
				<button type="button" class="navbar-toggler">
					<span class="navbar-toggler-bar bar1"></span>
					<span class="navbar-toggler-bar bar2"></span>
					<span class="navbar-toggler-bar bar3"></span>
				</button>
			</div>
			<a class="navbar-brand" href="#pablo"><?php echo $subtitle; ?></a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-bar navbar-kebab"></span>
			<span class="navbar-toggler-bar navbar-kebab"></span>
			<span class="navbar-toggler-bar navbar-kebab"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navigation">
			<ul class="navbar-nav">
				<!-- <li class="nav-item <?php if($nlink == 1){?>active<?php } ?>">
                <a class="nav-link" href="view_pending.php">
                  <i class="now-ui-icons business_money-coins"></i>
                  <p>
                    <span class="d-md-block">Pending Payments</span>
                  </p>
                </a>
              </li>
              <li class="nav-item <?php if($nlink == 2){?>active<?php } ?>">
                <a class="nav-link" href="view_comingup.php">
                  <i class="now-ui-icons business_money-coins"></i>
                  <p>
                    <span class="d-md-block">Upcoming Payments</span>
                  </p>
                </a>
              </li> -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="now-ui-icons users_single-02"></i>
						<p>
							<span class="d-lg-none d-md-block">Settings</span>
						</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="profile.php">Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
						<a class="dropdown-item" href="logout.php">Log Out</a>

					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
