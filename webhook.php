<?php
    /*
    Basic PHP script to handle Instamojo RAP webhook.
    */

    $data = $_POST;
    $mac_provided = $data['mac'];  // Get the MAC from the POST data
    unset($data['mac']);  // Remove the MAC key from the data.
    $ver = explode('.', phpversion());
    $major = (int) $ver[0];
    $minor = (int) $ver[1];
    if($major >= 5 and $minor >= 4){
         ksort($data, SORT_STRING | SORT_FLAG_CASE);
    }
    else{
         uksort($data, 'strcasecmp');
    }
    // You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
    // Pass the 'salt' without <>
    $mac_calculated = hash_hmac("sha1", implode("|", $data), "c7e8b47c7e6e47e38bd5c4124d6c89b8");
    if($mac_provided == $mac_calculated){
        if($data['status'] == "Credit"){

            include('config/db.php');

            $conn = OpenCon();  

            $purpose = $data['purpose'];
            $amount = $data['amount'];
            $name = $data['buyer_name'];
            $email = $data['buyer'];
            $phone = $data['buyer_phone'];
            $pid = $data['payment_id'];
            $status = $data['status'];

            $sql = "INSERT INTO tb_instomojo_pay(purpose, amount, name, email, phone, pid, status)VALUES('$purpose', '$amount', '$name', '$email', '$phone', '$pid', '$status')";

            $conn->query($sql);
        }
        else{
            // Payment was unsuccessful, mark it as failed in your database.
            // You can acess payment_request_id, purpose etc here.
        }
    }
    else{
        echo "MAC mismatch";
    }
?>