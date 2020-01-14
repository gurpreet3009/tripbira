<?php 
    include('../config/db.php');

    $conn = OpenCon();

    if(isset($_POST['name'])) {
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $recaptcha_secret = '6Ldzna0UAAAAAOV35TsmVSdMBVH9xfhJ67gI8PdX';
        } else {
            $recaptcha_secret = '6Lfr8K4UAAAAAA05fy-ryJpUedA36UJK7QodR9hC';
        }
        $recaptcha_response = $_POST['recaptcha_response'];
        
        // Make and decode POST request:
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);


        if($recaptcha->success==true){
            // Take action based on the score returned:
            if ($recaptcha->score >= 0.5) {
                $sql = "INSERT INTO tb_query (name, email, phone, destination, plan_date)
                        VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["destination"]."','".$_POST["date"]."')";
                $name = $_POST['name'];
                if ($conn->query($sql) === TRUE) {
                    // Verified - send email
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
                                            <span style='font-weight: bold;'>Dear " . $_POST['name'] .",</span>
                                            <br>
                                            <br>
                                            <br>
                                            <p>
                                                Thank you for showing your interest in Tripbira.com.<br>
                                                We have received your enquiry. Our specialist will get back to you very soon with requisite information.
                                            </p>
                                            <p>
                                                If you would like to get in touch with us in the meantime, contact us on<br>
                                                Call: (+91)95-30-88-01-01/02-02<br>
                                                Mail to us at hello@tripbira.com
                                            </p>
                                            <p>
                                                Talk to you soon:<br>
                                                Tripbira.com
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' style='border: 1px solid rgba(0,0,0,.125);text-align: center;padding:10px;'>
                                            <img src='http://tripbira.com/images/wallet.png'>
                                            <p class='card-text'>Fowrex</p>
                                            <a href='#' style='background: #2887ad;padding: 5px;border-radius: 20px;text-decoration: none;color: #fff;'>Click Me</a>
                                        </td>
                                        <td colspan='2' style='border: 1px solid rgba(0,0,0,.125);text-align: center;padding:10px;'>
                                            <img src='http://tripbira.com/images/wallet.png'>
                                            <p class='card-text'>Car Rental</p>
                                            <a href='#' style='background: #2887ad;padding: 5px;border-radius: 20px;text-decoration: none;color: #fff;'>Click Me</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' style='border: 1px solid rgba(0,0,0,.125);text-align: center;padding:10px;'>
                                            <img src='http://tripbira.com/images/wallet.png'>
                                            <p class='card-text'>Sightseeing</p>
                                            <a href='#' style='background: #2887ad;padding: 5px;border-radius: 20px;text-decoration: none;color: #fff;'>Click Me</a>
                                        </td>
                                        <td colspan='2' style='border: 1px solid rgba(0,0,0,.125);text-align: center;padding:10px;'>
                                            <img src='http://tripbira.com/images/wallet.png'>
                                            <p class='card-text'>Flight Booking</p>
                                            <a href='#' style='background: #2887ad;padding: 5px;border-radius: 20px;text-decoration: none;color: #fff;'>Click Me</a>
                                        </td>
                                    </tr>
                                    <tr>
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


                    //Mail for TripBira
                    $to_2 = "hello@tripbira.com";
                    $subject_2 = "New Query";
                    $message_2 = "Name : ".$_POST['name']."<br>Email :".$_POST['email']."<br> Phone No. : ".$_POST['phone']."<br> Destination : ".$_POST["destination"]."<br> Date : ".$_POST["date"].

                    $headers_2 = 'MIME-Version: 1.0' . "\r\n";
                    $headers_2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers_2 .= 'From: hello@tripbira.com';

                    mail($to_2, $subject_2, $message_2, $headers_2);
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
            exit;            
            }  
            /*else {
                echo '<pre>';
                print_r("Not verified - show form error");
                echo '</pre>';
            exit;
            // Not verified - show form error
            }*/
        }else{ // there is an error /
            ///  timeout-or-duplicate meaning you are submit the  form
            echo '<pre>';
            print_r($recaptcha);
            echo '</pre>';
        exit;
        }
    }

 ?>