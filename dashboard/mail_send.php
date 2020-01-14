<?php 
if(isset($_POST['email'])) {
$to = $_POST["email"];
$subject = "Hello";

$message = "<html>
<head>

</head>
<body>
  <div class='container' style='border: 1px solid rgba(0,0,0,.125);'>
    <div>
      <table align='center' style='border: 1px solid rgba(0,0,0,.125);'>
        <tr>
          <td colspan='4'>
            <img src='http://tripbira.com/images/header.png' height='250' style='position: relative;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;'>
          </td>
        </tr>
        <tr>
          <td colspan='4' style='padding: 25px;'>
            <span style='font-weight: bold;font-size: 20px;'>Dear " . $_POST['name'] .",</span>
            <br>
            <br>
            <br>
            <p style='text-align: center;font-size: 20px;'>
              For Payment
            </p>
            <p>
              <form action='http://tripbira.com/order_payment.php' method='POST' style='text-align: center;'>
                <input type='hidden' name='order_id' value=" . $_POST['order_id'] .">
                <button type='submit' name='submit' style='background: #2887ad;color: #fff;border: 1px solid #2887ad;border-radius: 35px;padding: 10px;font-size: 20px;'>Payment</button>
              </form>
            </p>
            <p style='text-align: center;font-size: 20px;'>
              If you have any query, please contact us on<br>
              Call: (+91)95-30-88-01-01/02-02<br>
              Mail to us at hello@tripbira.com
            </p>
          </td>
        </tr>
          <td colspan='4'>
            <img src='http://tripbira.com/images/footer.jpg' height='250' style='position: relative;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            margin-top: 25px;'>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>";


$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: hello@tripbira.com';

mail($to, $subject, $message, $headers);	

echo "Mail Sent";
}
?>