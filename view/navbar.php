<?php 
	if ($_SERVER['HTTP_HOST'] == 'localhost') {
		define("BASE_URL", "http://localhost/responsive/");
	} else {
		define("BASE_URL", "https://tripbira.com/");
	}

?>
<!-- navbar--> 
	<header class="header mb-5 navbar-fixed-top">
		<!--*** TOPBAR ***-->
		<div id="top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offer mb-3 mb-lg-0">
						<ul class="menu list-inline mb-0">
							<li class="list-inline-item">Contact Us</li>
							<li class="list-inline-item">9530880101/202</li>
							<li class="list-inline-item">hello@tripbira.com</li>
						</ul>
					</div>
					<div class="col-lg-6 text-center text-lg-right">
						<ul class="menu list-inline mb-0">
							<li class="list-inline-item">
								<a class="nav-link d-inline-block" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/BiraTrip" target="_blank" data-original-title="Follow us on Twitter" style="cursor: pointer;">
									<i class="fa fa-twitter"></i>
									<div class="ripple-container"></div>
								</a>
								<a class="nav-link d-inline-block" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/tripbira1/" target="_blank" data-original-title="Like us on Facebook" style="cursor: pointer;">
									<i class="fa fa-facebook-square"></i>
									<div class="ripple-container"></div>
								</a>
								<a class="nav-link d-inline-block" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/tripbira/" target="_blank" data-original-title="Follow us on Instagram" style="cursor: pointer;">
									<i class="fa fa-instagram"></i>
									<div class="ripple-container"></div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- *** TOP BAR END ***-->
		</div>
		<nav class="navbar navbar-expand-lg navbar-color-on-scroll navbar-trans navbar-inverse">
			<div class="container">
				<a href="<?php echo BASE_URL; ?>" class="navbar-brand home">
					<img src="images/Logo1.png" alt="TripBira logo" class="d-none d-md-inline-block" height="60" width="150">
					<img src="images/Logo1.png" alt="TripBira logo" class="d-inline-block d-md-none" height="60" width="150">
				</a>
				<div class="navbar-buttons">
					<button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-align-justify"></i>
					</button>
					<a href="basket.html" class="btn btn-outline-secondary navbar-toggler" data-toggle="modal" data-target="#query"><i class="fa fa-pencil"></i></a>
				</div>
				<div id="navigation" class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								FEATURED
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php 
								include('config/db.php');
								$conn = OpenCon();

								$feat_sql = "SELECT DISTINCT city FROM tb_packages WHERE feature_status = '1' ORDER BY CHAR_LENGTH(city)";

								$feat_result = $conn->query($feat_sql);
								foreach ($feat_result as $feat_rows) { 
									$city_url = str_replace(' ', '_', $feat_rows['city']);
								?>
									<a href="<?php echo BASE_URL; ?>featured_tour_package/<?php echo $city_url; ?>" class="dropdown-item nav-link" style="cursor: pointer;">
										<?php echo $feat_rows['city']; ?>
									</a>
								<?php 
								}

								// closing connection 
								mysqli_close($conn); 
								?>
							</div>
						</li>
						<li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">NATIONAL<b class="caret"></b></a>
							<ul class="dropdown-menu megamenu">
								<li>
									<div class="row">
										<div class="col-md-12">
											<ul class="list-unstyled mb-3">
												<h5 style="text-align: center;">NATIONAL PACKAGES</h5>
												<?php 
													
													$conn = OpenCon();

													$nat_sql = "SELECT DISTINCT p.city FROM tb_packages As p JOIN tb_feat_packages As fp on p.id=fp.pack_id WHERE fp.feat_id='2' ORDER BY CHAR_LENGTH(p.city)";

													$nat_result = $conn->query($nat_sql);
													$num = 1;
													foreach ($nat_result as $nat_rows) { 

														$city_url = str_replace(' ', '_', $nat_rows['city']);
														if ($num%5 == 1)
														{  
														    echo '<div class="col-md-6 d-inline-block">';
														}
														?>
														<a href="<?php echo BASE_URL; ?>national_tour_package/<?php echo $city_url; ?>" class="dropdown-item nav-link" style="cursor: pointer;">
															<?php echo $nat_rows['city']; ?>
														</a>
														<?php 
														if($num%5 == 0) {
														  	echo '</div>';
														}
														$num++;
													}
													if ($num%4 != 1) echo "</div>";

													// closing connection 
													mysqli_close($conn); 
												?>
											</ul>
										</div>
									</div>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown menu-large">
							<a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">INTERNATIONAL<b class="caret"></b>
							</a>
							<ul class="dropdown-menu megamenu">
								<li>
									<div class="row">
										<div class="col-md-12">
											<ul class="list-unstyled mb-3">
												<h5 style="text-align: center;">INTERNATIONAL PACKAGES</h5>
												<?php 
													
													$conn = OpenCon();

													$nat_sql = "SELECT DISTINCT p.city FROM tb_packages As p JOIN tb_feat_packages As fp on p.id=fp.pack_id WHERE fp.feat_id='3' ORDER BY CHAR_LENGTH(p.city)";

													$nat_result = $conn->query($nat_sql);
													$num = 1;
													foreach ($nat_result as $nat_rows) { 
														$city_url = str_replace(' ', '_', $nat_rows['city']);
														
														if ($num%5 == 1)
														{  
														    echo '<div class="col-md-6 d-inline-block">';
														}
														?>
														<a href="<?php echo BASE_URL; ?>international_tour_package/<?php echo $city_url; ?>" class="dropdown-item nav-link" style="cursor: pointer;">
															<?php echo $nat_rows['city']; ?>
														</a>
														<?php 
														if($num%5 == 0) {
														  	echo '</div>';
														}
														$num++;
													}
													if ($num%4 != 1) echo "</div>";

													// closing connection 
													mysqli_close($conn); 
												?>
											</ul>
										</div>
									</div>
								</li>
							</ul>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									OUR SERVICES
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item nav-link" style="cursor: pointer;" href="<?php echo BASE_URL; ?>sightseeing">SIGHTSEEING</a>
									<a class="dropdown-item nav-link" style="cursor: pointer;" href="<?php echo BASE_URL; ?>visa_service">VISA SERVICE</a>
									<a class="dropdown-item nav-link" style="cursor: pointer;" href="<?php echo BASE_URL; ?>flight_booking">FLIGHT BOOKING</a>
									<a class="dropdown-item nav-link" style="cursor: pointer;" href="<?php echo BASE_URL; ?>travel_insurance">TRAVEL INSURANCE</a>
									<a class="dropdown-item nav-link" style="cursor: pointer;" href="<?php echo BASE_URL; ?>car_coach_rental">CAR & COACH RENTAL</a>
								</div>
							</li>
							<li class="nav-item"><a href="<?php echo BASE_URL; ?>faq" class="nav-link">FAQ</a></li>
						</ul>
						<div class="navbar-buttons d-flex justify-content-end">
							<!-- /.nav-collapse-->
							<div id="search-not-mobile" class="navbar-collapse collapse"></div>
							<div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
								<a class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#query">
									<i class="fa fa-pencil"></i><span>HAVE A QUERY</span>
								</a>
							</div>
						</div>
					</div>
				</div>
		</nav>
		<!-- Query Model -->
    	<?php include('view/query.php'); ?>

		<!-- Message Query Model -->
	    <?php include('view/message_query.php'); ?>
	</header>
