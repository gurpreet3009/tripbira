<?php
	require('../config/db.php');

	$conn = OpenCon();

	if ($_POST['action'] == 'add') {


		$customer = $_POST['customer'];
		$cust_email = $_POST['cust_email'];
		$cust_address = $_POST['cust_address'];
		$cust_city = $_POST['cust_city'];
		$cust_country = $_POST['cust_country'];
		$cust_postal_code = $_POST['cust_postal_code'];
		$order_name = $_POST['order_name'];
		$order_place = $_POST['order_place'];
		$day = $_POST['day'];
		$departure = $_POST['departure'];
		$amount = $_POST['amount'];
		$total_amount = $_POST['total_amount'];
		$status = 0;

		$sql = "INSERT INTO tb_order (customer, cust_email, cust_address, cust_city, cust_country, cust_postal_code, order_name, order_place, day, departure, amount, total_amount, status)
                        VALUES ('".$customer."','".$cust_email."','".$cust_address."','".$cust_city."','".$cust_country."','".$cust_postal_code."','".$order_name."','".$order_place."','".$day."','".$departure."','".$amount."','".$total_amount."','".$status."')";

        if ($conn->query($sql) === TRUE) {
        	echo "New order is created!!";
        } else {
        	echo "Unable to submit form: please try again!!";
        }
	} else if($_POST['action'] == 'show') {
		$id = $_POST['id'];
		$edit_sql = "SELECT * FROM tb_order WHERE id = '".$id."'";

		$result = $conn->query($edit_sql);

		foreach ($result as $key => $value) {
			echo json_encode($value);
		}
		
	} else if($_POST['action'] == 'delete') {
		$id = $_POST['id'];
		$sql = "UPDATE tb_order SET status = '1' WHERE id = '".$id."'";

		if ($conn->query($sql) === TRUE) {
        	echo "Deleted!!";
        } else {
        	echo "Unable to submit form: please try again!!";
        }
	} else if($_POST['action'] == 'edit') {
		$id = $_POST['id'];
		$customer = $_POST['customer'];
		$cust_email = $_POST['cust_email'];
		$cust_address = $_POST['cust_address'];
		$cust_city = $_POST['cust_city'];
		$cust_country = $_POST['cust_country'];
		$cust_postal_code = $_POST['cust_postal_code'];
		$order_name = $_POST['order_name'];
		$order_place = $_POST['order_place'];
		$day = $_POST['day'];
		$departure = $_POST['departure'];
		$amount = $_POST['amount'];
		$total_amount = $_POST['total_amount'];
		$status = 0;
		$sql = "UPDATE tb_order SET customer = '".$customer."', cust_email = '".$cust_email."', cust_address = '".$cust_address."', cust_city = '".$cust_city."', cust_country = '".$cust_country."', cust_postal_code = '".$cust_postal_code."', order_name = '".$order_name."', order_place = '".$order_place."', day = '".$day."', departure = '".$departure."', amount = '".$amount."', total_amount = '".$total_amount."', status = '".$status."' WHERE id = '".$id."'";

		if ($conn->query($sql) === TRUE) {
        	echo "Updated!!";
        } else {
        	echo "Unable to submit form: please try again!!";
        }

	} else {
		echo "Check your request.";
	}

?>