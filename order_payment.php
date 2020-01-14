test
<?php
	include('config/db.php');

	$conn = OpenCon();	

	//if (isset($_POST['order_id'])) {
		$id = $_POST['order_id'];

		$query = "SELECT * FROM tb_order WHERE ID = '$id'";
        $result = $conn->query($query);
        $row = mysqli_fetch_array($result);
		?>
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
				<div class="container" style="background: #fff;padding: 25px;border-radius: 10px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);margin-top: 30px;">
					<div class="py-1 text-center">
						<img class="d-block mx-auto mb-4" src="images/Logo1.png" alt="" width="300" height="100">
					</div>
  					<div class="row">
    					<div class="col-md-4 order-md-2 mb-4">
    						<h4 class="d-flex justify-content-between align-items-center mb-3">
    							<span class="text-muted">Your cart</span>
    							<span class="badge badge-secondary badge-pill">1</span>
    						</h4>
    						<ul class="list-group mb-3">
    							<li class="list-group-item d-flex justify-content-between lh-condensed">
    								<div>
    									<h6 class="my-0">Order Name</h6>
    								</div>
    								<small class="text-muted"><?php echo $rows['order_name']; ?></small>
    							</li>
    							<li class="list-group-item d-flex justify-content-between lh-condensed">
    								<div>
    									<h6 class="my-0">Place</h6>
    								</div>
    								<small class="text-muted"><?php echo $rows['order_place']; ?></small>
    							</li>
    							<li class="list-group-item d-flex justify-content-between lh-condensed">
    								<div>
    									<h6 class="my-0">Amount</h6>
    								</div>
    								<span class="text-muted"><i class="fa fa-inr"></i><?php echo $rows['amount']; ?></span>
    							</li>
    							<li class="list-group-item d-flex justify-content-between">
    								<span>Total Amount</span>
                                    <p><small class="text-muted">18% GST</small></p>
    								<strong><i class="fa fa-inr"></i><?php echo $rows['total_amount']; ?></strong>
    							</li>
    						</ul>
    					</div>
    					<div class="col-md-8 order-md-1">
    						<h4 class="mb-3">Fill the details to complete your order</h4>
    						<form class="needs-validation" action="pay.php" method="POST">
    							<div class="row">
    								<div class="col-md-12 mb-6">
    									<label for="firstName">Name</label>
    									<input type="text" class="form-control" name="cust_name" id="firstName" placeholder="" value="<?php echo $rows['customer']; ?>" required="required">
    									<div class="invalid-feedback">
    										Valid first name is required.
    									</div>
    								</div>
    							</div>

    							<div class="mb-3">
    								<label for="email">Email </label>
    								<input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="required">
    								<div class="invalid-feedback">
    									Please enter a valid email address.
    								</div>
    							</div>

    							<div class="mb-3">
    								<label for="address">Phone No.</label>
    								<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone No." pattern="^\d{10}$" required="required">
    								<div class="invalid-feedback">
    									Please enter your valid phone no..
    								</div>
    							</div>
    							<hr class="mb-4">
                                <input type="hidden" name="order_id" value="<?php echo $rows['id']; ?>">
                                <input type="hidden" name="order_name" value="<?php echo $rows['order_name']; ?>">
                                <input type="hidden" name="total_amount" value="<?php echo $rows['total_amount']; ?>">
    							<button class="btn btn-primary btn-lg btn-block" type="submit">Make Payment</button>
    						</form>
    					</div>
    				</div>
    			</div>
			</body>
			</html>
	<?php
		} else {
            include('view/404.php');
        }
?>