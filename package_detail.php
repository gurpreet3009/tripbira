
	<!--*** HEADER ***-->
	<?php include('view/header.php'); ?>
	<!--*** HEADER END ***-->

	<!--*** NAVBAR ***-->
	<?php include('view/navbar.php');  

	if(isset($_GET['id']))
		{
			$conn =  OpenCon();

			$id = $_GET['id'];

			$sql = "SELECT * FROM tb_package_details WHERE id='". $id ."'";
		
			$result = $conn->query($sql);

			$rows = $result->fetch_assoc();

			// closing connection 
			mysqli_close($conn); 
	?>
	<div id="all">
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
								<li class="breadcrumb-item"><a onclick="goBack()" href="#">Go back</a></li>
								<?php 
									$conn =  OpenCon();

									$id = $_GET['id'];

									$sql = "SELECT pack_name FROM tb_packages WHERE id='". $id ."'";
								
									$result = $conn->query($sql);

									$pack = $result->fetch_assoc();

									// closing connection 
									mysqli_close($conn); 
								?>
								<li aria-current="page" class="breadcrumb-item active"><?php echo $pack['pack_name']; ?> Package Itinerary</li>
							</ol>
						</nav>
					</div>

					<div class="col-lg-12 my-container">
						<h3 class="card-title">Overview</h3>
						<p style="font-size: 14px;text-align: justify;"><?php echo $rows['overview']; ?></p>
					</div>

					<div class="col-lg-12 my-container">
						<!-- Nav pills -->
						<ul class="nav nav-pills" style="margin-bottom: 1.5rem;justify-content: center;">
							<li class="nav-link my-padding text-center active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-clock-o" aria-hidden="true" style="font-size: 20px;"></i><br>ITINERARY</a></li>
							<li class="nav-link my-padding text-center"><a href="#tab-2" data-toggle="tab"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 20px;"></i><br>INCLUSIONS</a></li>
							<li class="nav-link my-padding text-center"><a href="#tab-3" data-toggle="tab"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 20px;"></i><br>EXCLUSIONS</a></li>
							<li class="nav-link my-padding text-center"><a href="#tab-4" data-toggle="tab"><i class="fa fa-child" aria-hidden="true" style="font-size: 20px;"></i><br>CHILD POLICY</a></li>
							<li class="nav-link my-padding text-center"><a href="#tab-5" data-toggle="tab"><i class="fa fa-money" aria-hidden="true" style="font-size: 20px;"></i><br>PAYMENT POLICY</a></li>
							<li class="nav-link my-padding text-center"><a href="#tab-6" data-toggle="tab"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 20px;"></i><br>TERMS & CONDITIONS</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content well">
							<div class="tab-pane active" id="tab-1">
								<ul class="pack_timeline">
									<?php 
									$conn = OpenCon();

									$sql_i = "SELECT * FROM tb_itinerary WHERE itinerary_id='". $rows['id'] ."'";

									$result_i = $conn->query($sql_i);

												// closing connection 
									mysqli_close($conn); 

									foreach ($result_i as $i_rows) { ?>
										<li class="pack_timeline-event">
											<label class="pack_timeline-event-icon"></label>
											<div class="pack_timeline-event-copy">
												<p class="pack_timeline-event-thumbnail"><?php echo $i_rows['day']; ?></p>
												<h3><?php echo $i_rows['heading']; ?></h3>
												<p style="text-align: justify;"><?php echo $i_rows['overview']; ?></p>
											</div>
										</li>		
										<?php
									}
									?>
								</ul>
							</div>
							<div class="tab-pane" id="tab-2">
								<ul style="text-align: justify;padding-left: 14px;font-size: 14px;">
									<?php 
									$incl = explode("^",$rows['inclusion']);
									foreach ($incl as $rows_incl) { ?>
										<li><?php echo $rows_incl; ?></li>
										<?php	
									}
									?>
								</ul>
							</div>
							<div class="tab-pane" id="tab-3">
								<ul style="text-align: justify;padding-left: 14px;font-size: 14px;">
									<?php 
									$encl = explode("^",$rows['exclusion']);
									foreach ($encl as $rows_encl) { ?>
										<li><?php echo $rows_encl; ?></li>
										<?php	
									}
									?>
								</ul>
							</div>
							<div class="tab-pane" id="tab-4">
								<ul style="text-align: justify;padding-left: 14px;font-size: 14px;">
									<?php 
									$ch = explode("^",$rows['child_policy']);
									foreach ($ch as $rows_ch) { ?>
										<li><?php echo $rows_ch; ?></li>
										<?php	
									}
									?>
								</ul>
							</div>
							<div class="tab-pane" id="tab-5">
								<h3 class="card-title">Payment Terms</h3>
								<ul style="text-align: justify;padding-left: 14px;font-size: 14px;">
									<?php 
									$pay = explode("^",$rows['payment_policy']);
									foreach ($pay as $rows_pay) { ?>
										<li><?php echo $rows_pay; ?></li>
										<?php	
									}
									?>
								</ul>
								<h3 class="card-title">Cancellation Terms</h3>
								<ul style="font-size: 14px;padding-left: 14px;text-align: justify;">
									<?php 
									$can = explode("^",$rows['cancellation_policy']);
									foreach ($can as $rows_can) { ?>
										<li><?php echo $rows_can; ?></li>
										<?php	
									}
									?>
								</ul>
							</div>
							<div class="tab-pane" id="tab-6">
								<ul style="font-size: 14px;padding-left: 14px;text-align: justify;">
									<?php 
									$tc = explode("^",$rows['terms_condition']);
									foreach ($tc as $rows_tc) { ?>
										<li><?php echo $rows_tc; ?></li>
										<?php	
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
	<!--*** FOOTER ***-->
	<?php include('view/footer.php'); ?>
	<!--*** FOOTER END ***-->
	<?php 
	}	
	?>