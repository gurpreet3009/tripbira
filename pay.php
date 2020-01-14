<?php 
	
	$order_name = $_POST['order_name'];
	$price = $_POST['total_amount'];
	$cust_name = $_POST['cust_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone']; 

	include('instamojo/Instamojo.php');
	$api = new Instamojo\Instamojo('test_6454b02f7f925408b709e0e75d0', "test_52ee6e4b0f49d3c13e75acc0090", 'https://test.instamojo.com/api/1.1/');

	try {
		$response = $api->paymentRequestCreate(array(
			"purpose" => $order_name,
			"amount" => $price,
			"send_email" => true,
			"email" => $email,
			"buyer_name" => $cust_name,
			"phone" => $phone,
			"send_sms" => true,
			"allow_repeated_payments" => false,
			"redirect_url" => "http://www.tripbira.com/thankyou.php",
			"webhook" => "http://www.tripbira.com/webhook.php",
			));
		//print_r($response);
		$pay_url = $response['longurl'];
		header("Location: $pay_url");
	}
	catch (Exception $e) {
		print('Error: ' . $e->getMessage());
	}

?>