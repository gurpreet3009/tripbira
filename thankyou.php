<!DOCTYPE html>
<html>
<head>
	<title>TripBira</title>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body style="background: #eee; font-family: 'Roboto Slab', 'Times New Roman', serif;">
	<div class="container" style="background: #fff;padding: 25px;border-radius: 10px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);margin-top: 100px;">
		<div class="row">
			<div class="col-md-12" style="text-align: center;font-size: 30px;margin-bottom: 10px;">
				<span>Thank you for purchasing!!</span>
			</div>
		</div>
			<?php 

				include('instamojo/Instamojo.php');
				$api = new Instamojo\Instamojo('test_6454b02f7f925408b709e0e75d0', "test_52ee6e4b0f49d3c13e75acc0090", 'https://test.instamojo.com/api/1.1/');

				$payid = $_GET['payment_request_id'];

				try{
					$response=$api->paymentRequestStatus($payid);
				?>
				<div class="row" style="justify-content: center;">
					<div class="col-md-6">
						<ul class="list-group mb-6">
							<li class="list-group-item d-flex justify-content-between lh-condensed">
	    						<div>
	    							<h6 class="my-0">You have purchased : </h6>		
	    						</div>
	    						<small class="text-muted" style="text-align: right;"> <?= $response['purpose']; ?></small>
	    					</li>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
	    						<div>
	    							<h6 class="my-0">Payment ID : </h6>		
	    						</div>
	    						<small class="text-muted" style="text-align: right;"> <?= $response['payments'][0]['payment_id']; ?></small>
	    					</li>
	    					<li class="list-group-item d-flex justify-content-between lh-condensed">
	    						<div>
	    							<h6 class="my-0">Payee Name : </h6>		
	    						</div>
	    						<small class="text-muted" style="text-align: right;"> <?= $response['payments'][0]['buyer_name']; ?></small>
	    					</li>
	    					<li class="list-group-item d-flex justify-content-between lh-condensed">
	    						<div>
	    							<h6 class="my-0">Payee Email : </h6>		
	    						</div>
	    						<small class="text-muted" style="text-align: right;"> <?= $response['payments'][0]['buyer_email']; ?></small>
	    					</li>
						</ul>
					</div>
				</div>
				<?php
				}
				catch(Exception $e){
					print("Error:" .$e->getMessage());
				}
			?>
	</div>
</body>
</html>