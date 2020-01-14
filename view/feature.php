<?php 
$conn = OpenCon();

$feat_sql = "SELECT pack_name, pack_summary, city, price, img FROM tb_packages WHERE feature_status = '1'";

$feat_result = $conn->query($feat_sql);

	// closing connection 
mysqli_close($conn); 
?>		

<div id="hot">
	<div class="box py-4">
		<div class="container"> 
			<div class="row">
				<div class="col-md-12">
					<h2 class="mb-0">Featured Packages</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="container my-container">
		<div class="row">
			<?php foreach ($feat_result as $feat_rows) {?>
				<div class=" col-lg-4 col-md-6" style="padding: 5px;">
					<div class="our-feat">
						<div class="pic">
							<img src="images/<?php echo $feat_rows['img']; ?>" height= "230px">
						</div>
						<div class="team-content" style="padding: 5px;">
							<h4 class="title" style="font-size: 20px;"><?php echo $feat_rows['pack_name']; ?></h4>
							<small style="float: left;"><?php echo $feat_rows['pack_summary']; ?></small><br>
							<a href="<?php echo BASE_URL; ?>featured_tour_package/<?php echo $feat_rows['city']; ?>" class="main_btn" style="text-decoration: none;float: left;">
								<h3>View More</h3> <img src="images/next.png">
							</a>
							<span class="post" style="text-align: right;"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $feat_rows['price']; ?><br>
								<small style="font-size: 12px;position: relative;bottom: 10px;">Per Person</small>
							</span>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<div class=" col-lg-8 col-md-12">
				<div class="box slideshow">
					<div id="get-inspired" class="owl-carousel owl-theme">
						<a href="<?php echo BASE_URL; ?>featured_tour_package/singapore" class="" style="text-decoration: none;float: left;">
							<div class="item slid_singapore"><img src="images/feat_1.jpg" alt="Get inspired" class="img-fluid my-feat-img">
							</div>
						</a>
						<a href="<?php echo BASE_URL; ?>featured_tour_package/singapore" class="" style="text-decoration: none;float: left;">
							<div class="item slid_singapore"><img src="images/feat_2.jpg" alt="Get inspired" class="img-fluid my-feat-img">
							</div>
						</a>
						<a href="<?php echo BASE_URL; ?>featured_tour_package/singapore" class="" style="text-decoration: none;float: left;">
							<div class="item slid_singapore"><img src="images/feat_3.jpg" alt="Get inspired" class="img-fluid my-feat-img">
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container-->
	</div>
	<!-- /#hot-->
	<!-- *** HOT END ***-->
</div>