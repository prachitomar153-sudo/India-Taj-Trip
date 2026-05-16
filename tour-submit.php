 <?php
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$rid = mt_rand();
	
    $tourname = $_POST['tourname'];
	$name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $language = $_POST['language'];
    $adults = $_POST['adults'];
    
    $childrens = $_POST['childrens'];
    $arrival = $_POST['arrival'];
    
	$requirements = $_POST['requirements'];
     

    $admin_email = 'mldigitalwork@gmail.com';

   
    $subject = "Tour Enquiry - India Taj Trip";

    $message = "";
    $message .= "Dear ".$name.",\n\n";
    $message .= "Thank you for your Enquiry with India Taj Trip.\n\n";
    $message .= "Booking Details:\n";
    $message .= "Booking ID: ".$rid."\n";
    $message .= "Tour Name: ".$tourname."\n";
    $message .= "Email: ".$email."\n";
    $message .= "Phone: ".$phone."\n";
    $message .= "Country: ".$country."\n";
    $message .= "Guide Language: ".$language."\n";
	$message .= "Adults: ".$adults."\n";
	$message .= "Childrens: ".$childrens."\n";
	$message .= "Arrival Date: ".$arrival."\n\n";
	$message .= "Requirements: ".$requirements."\n\n";
    $message .= "We will contact you shortly to confirm the trip.\n\n";
    $message .= "Regards,\n";
    $message .= "India Taj Trip";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@indiatajholidays.com';
    $mail->Password = 'Alimmalik#001';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(false);

    $mail->setFrom('info@indiatajholidays.com', 'India Taj Trip');
    $mail->addAddress($email, $name);
    $mail->addCC($admin_email);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if(!$mail->send()){
        echo "<div style=\"color:red;\">Email sending failed: ".$mail->ErrorInfo."</div>";
    } else {
         echo "<script>window.location='https://indiatajholidays.com/thankyou.php?name=$name';</script>";
    }

    ?>
	 
 
<?php

} else {
    echo "Invalid request.";
}
?>
 				