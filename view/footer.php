		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3">
						<h4 class="mb-3">Featured Packages</h4>
						<hr>
						<ul class="list-unstyled">
							<?php 
							$conn = OpenCon();

							$feat_sql = "SELECT DISTINCT city FROM tb_packages WHERE feature_status = '1' ORDER BY CHAR_LENGTH(city)";

							$feat_result = $conn->query($feat_sql);
							foreach ($feat_result as $feat_rows) { 
								$city_url = str_replace(' ', '_', $feat_rows['city']);
							?>
								<a href="<?php echo BASE_URL; ?>featured_tour_package/<?php echo $city_url; ?>" class="foot_btn" style="cursor: pointer;">
									<?php echo $feat_rows['city']; ?><br>
								</a>
								<?php 
							}

							// closing connection 
							mysqli_close($conn); 
							?>
						</ul>
						<hr>
						<h4 class="mb-3" style="margin-bottom: 0rem!important;">Our Services</h4>
						<ul class="list-unstyled">
							<li><a href="<?php echo BASE_URL; ?>sightseeing" class="service_btn">Sightseeing</a></li>
							<li><a href="<?php echo BASE_URL; ?>visa_service" class="service_btn">Visa Service</a></li>
							<li><a href="<?php echo BASE_URL; ?>flight_booking" class="service_btn">Flight Booking</a></li>
							<li><a href="<?php echo BASE_URL; ?>travel_insurance" class="service_btn">Travel Insurance</a></li>
							<li><a href="<?php echo BASE_URL; ?>car_coach_rental" class="service_btn">Car & Coach Rental</a></li>
						</ul>
					</div>
					<!-- /.col-lg-3-->
					<div class="col-lg-3 col-md-3">
						<h4 class="mb-3">National Packages</h4>
						<hr>
						<ul class="list-unstyled">
							<?php 
							$conn = OpenCon();

							$nat_sql = "SELECT DISTINCT p.city FROM tb_packages As p JOIN tb_feat_packages As fp on p.id=fp.pack_id WHERE fp.feat_id='2' ORDER BY CHAR_LENGTH(p.city)";

							$nat_result = $conn->query($nat_sql);
							foreach ($nat_result as $nat_rows) { 
								$city_url = str_replace(' ', '_', $nat_rows['city']);
							?>
								<a href="<?php echo BASE_URL; ?>national_tour_package/<?php echo $city_url; ?>" class="foot_btn" style="cursor: pointer;">
									<?php echo $nat_rows['city']; ?><br>
								</a>
							<?php 					
							}
							// closing connection 
							mysqli_close($conn); 
							?>
						</ul>
					</div>
					<!-- /.col-lg-3-->
							<?php 
							$conn = OpenCon();

							$inter_sql = "SELECT DISTINCT p.city FROM tb_packages As p JOIN tb_feat_packages As fp on p.id=fp.pack_id WHERE fp.feat_id='3' ORDER BY CHAR_LENGTH(p.city)";

							$inter_result = $conn->query($inter_sql);
							$num = 1;
							foreach ($inter_result as $inter_rows) { 
								$city_url = str_replace(' ', '_', $inter_rows['city']);
								if ($num%11 == 1)
								{  ?>
									<div class="col-lg-3 col-md-3">
										<h4 class="mb-3">International Packages</h4>
										<hr>
										<ul class="list-unstyled">
							<?php }
								?>
								<a href="<?php echo BASE_URL; ?>international_tour_package/<?php echo $city_url; ?>" class="foot_btn" style="cursor: pointer;">
									<?php echo $inter_rows['city']; ?>
								</a><br>
							<?php 
								if($num%11 == 0) {
									echo '</div>';
								}
								$num++;
							}
							if ($num%4 != 1) echo '<hr class="hide-hr">
								<h4 class="mb-3 hide-h4">Stay in touch</h4>
								<p class="social hide-social"><a href="https://www.facebook.com/tripbira1/" class="facebook external"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/BiraTrip" class="twitter external"><i class="fa fa-twitter"></i></a><a href="https://www.instagram.com/tripbira/" class="instagram external"><i class="fa fa-instagram"></i></a>
								</p></div>'; 	
							// closing connection 
							mysqli_close($conn); 
							?>
						</ul>
					</div>
				</div>
				<!-- /.row-->
			</div>
			<!-- /.container-->
		</div>
		<!-- /#footer-->
		<!-- *** FOOTER END ***-->


    	<!--*** COPYRIGHT ***-->
		<div id="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 mb-2 mb-lg-0">
						<p class="text-center text-lg-center">©2019 TripBira.</p>
					</div>
					<!-- <div class="col-lg-6">
						<p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/p/big-bootstrap-tutorial">Bootstrapious</a>
						</p>
					</div> -->
				</div>
			</div>
		</div>
		<!-- *** COPYRIGHT END ***-->
		<!-- JavaScript files-->
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
		<script src="js/front.js"></script>
		<script src="js/moment.min.js"></script>

		<script src="js/swiper.min.js"></script>
		<script src="js/script.js"></script>

</body>
</html>