	
	<!--*** HEADER ***-->
	<?php include('view/header.php'); ?>
	<!--*** HEADER END ***-->

	<!--*** NAVBAR ***-->
	<?php include('view/navbar.php');  

	if(isset($_GET['city']))
	{ 
		$city = str_replace('_', ' ', $_GET['city']);
	?>
	<div class="jumbotron jumbotron-fluid my-jumbotron" style="background-image: url('images/banner.jpg');">
  		<div class="container">
    		<h1 class="display-4"><?php echo $city; ?></h1>
  		</div>
	</div>
	<div id="all">
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
								<li aria-current="page" class="breadcrumb-item active"><?php echo $city; ?> Packages</li>
							</ol>
						</nav>
					</div>
					<div class="col-lg-12 my-container">
						<div class="section-story-overview">
							<?php
							$city_ch = $city;

							$conn =  OpenCon();
							
							$sql = "SELECT id, pack_name, city, place, description, flight, hotel, meal, taxi, sightseeing, price, img FROM tb_packages WHERE city='".$city_ch."'";
						
							$result = $conn->query($sql);

							// closing connection 
							mysqli_close($conn);
							
							foreach ($result as $rows) { 
								$city_url = str_replace(' ', '_', $rows['city']);
							?>	
								<div class="row hoverEffect">
									<div class="col-xl-5 col-lg-12 col-md-12">
										<img src="images/<?php echo $rows['img']; ?>" class="img-raised rounded img-fluid my-pack-img">
									</div>
									<div class="col-xl-7 col-lg-12 col-md-12">
										<!-- First image on the left side -->
										<h3 class="title" style="text-align: left;color: #af281e;font-size: 20px;font-weight: bold;"><?php echo $rows['pack_name']; ?></h3>
											<small class="hotelTag"><?php echo $rows['place']; ?></small>
										<p class="blockquote blockquote-primary text_overview"><?php echo $rows['description']; ?></p>
											<hr>
											<ul class="ulFacility">
												<li><i class="fa fa-plane <?php echo $rows['flight']=='1'?'icon_color':''; ?>" aria-hidden="true"></i></li>
												<li><i class="fa fa-bed <?php echo $rows['hotel']=='1'?'icon_color':''; ?>" aria-hidden="true"></i></li>
												<li><i class="fa fa-cutlery <?php echo $rows['meal']=='1'?'icon_color':''; ?>" aria-hidden="true"></i></li>
												<li><i class="fa fa-taxi <?php echo $rows['taxi']=='1'?'icon_color':''; ?>" aria-hidden="true"></i></li>
												<li><i class="fa fa-binoculars <?php echo $rows['sightseeing']=='1'?'icon_color':''; ?>" aria-hidden="true"></i></li>
											</ul>
											<hr>
										
										<div>
											<a href="<?php echo BASE_URL; ?>package_detail/<?php echo $rows['id']; ?>/<?php echo $city_url; ?>_itinerary" class="main_btn" style="text-decoration: none;float: left;">
												<h3>View More</h3> <img src="images/next.png">
											</a>
											<span style="float: right;">
												<small class="priceTag">Price Start From</small>
												<h3 class="price" style="color: #af281e;"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $rows['price']; ?></h3>
											</span>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<?php
	} 
	?>

	<!--*** FOOTER ***-->
	<?php include('view/footer.php'); ?>
	<!--*** FOOTER END ***-->