<div class="sidebar" data-color="orange">
	<!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
	<div class="logo text-center">
		<a href="index.php" class="simple-text logo-normal">
			<?php echo $hotel_name; ?>
		</a>
	</div>
	<div class="sidebar-wrapper">
		<ul class="nav">
			<li <?php if($linum == 1){?>class="active" <?php }?>>
				<a href="index.php">
					<i class="now-ui-icons design_app"></i>
					<p>Dashboard</p>
				</a>
			</li>
			<li class="nav-item dropdown <?php if($linum == 2){ ?>active<?php } ?>">
				<a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="now-ui-icons users_single-02"></i>
					ADD
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="add_department.php">Add Department</a>
					<a class="dropdown-item" href="add_employees.php">Add Employees</a>
					<a class="dropdown-item" href="add_product.php">Add Product</a>
					 <a class="dropdown-item" href="add_rooms.php">Add Room</a> 
				</div>
			</li>
			<li class="nav-item dropdown <?php if($linum == 3){ ?>active<?php } ?>">
				<a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="now-ui-icons users_circle-08"></i>
					Show Details
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="show_departments.php">Departments</a>
					<a class="dropdown-item" href="show_employees.php">Show Present Employees</a>
					<a class="dropdown-item" href="show_leave_employees.php">Show Left Employees</a>
					 <a class="dropdown-item" href="show_product.php">Show Product</a> 
					 <a class="dropdown-item" href="show_rooms.php">Show Rooms</a> 
				</div>
			</li>
			<li <?php if($linum == 4){?>class="active" <?php }?>>
				<a href="staff_history.php">
					<i class="fas fa-history"></i>
					<p>Staff History</p>
				</a>
			</li>
			<!-- <li <?php if($linum == 5){?>class="active"<?php }?> >
            <a href="calculate_salary.php">
              <i class="fas fa-calculator"></i>
              <p>Calculate Staff Salary</p>
            </a>
          </li> -->
			<!-- <li class="nav-item dropdown <?php if($linum == 6){ ?>active<?php } ?>">
                <a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-hotel"></i>
                  Booking
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="add_custom_price.php">Add Custom Price</a>
                  <a class="dropdown-item" href="show_custom_price.php">Show Custom Price</a>
                  <a class="dropdown-item" href="room_update.php">Update Rooms</a>
                </div>
          </li>
          <li class="nav-item dropdown <?php if($linum == 7){ ?>active<?php } ?>">
                <a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-image"></i>
                  Gallery
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="create_gallery.php">Create Gallery</a>
                  <a class="dropdown-item" href="show_images.php">Show Gallery</a>
                </div>
          </li> -->
			<li <?php if($linum == 5){?>class="active" <?php }?>>
				<a href="asset_management.php">
					<i class="now-ui-icons design_app"></i>
					<p>Asset Management</p>
				</a>
			</li>
						<li <?php if($linum == 6){?>class="active" <?php }?>>
				<a href="room_management.php">
					<i class="fas fa-person-booth  design_app"></i>
					<p>Room Management</p>
				</a>
			</li>
		</ul>
	</div>
</div>
