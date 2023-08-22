<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bussinessdb";
$conn=  "";
try{
 $conn = mysqli_connect(
                       $db_server,
                       $db_user,
                       $db_pass, 
                       $db_name);
 
 if($conn) {
  // if connection is there
 if($_SERVER ["REQUEST_METHOD"]=="POST") {
  $name = filter_input(INPUT_POST, "name",FILTER_VALIDATE_REGEXP,[
   "options"=> ["regexp"=>"/^[a-zA-Z\s]+$/"]
  ] );
  $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
  $phone = filter_input(INPUT_POST, "phone",FILTER_VALIDATE_REGEXP,[
   "options" => ["regexp" =>"/^\d{10}$/"]
  ]);

  $subject = filter_input(INPUT_POST, "subject", FILTER_VALIDATE_REGEXP,[
   "options"=> ["regexp"=>"/^[a-zA-Z0-9\s.,\-]+$/"]
  ]);
  
  $message = $_POST["message"];
  include('ipadd.php');
  $user_ip = get_client_ip();
date_default_timezone_set('Asia/Kolkata');
  $current_timestamp = date('Y-m-d H:i:s');
  
   if($name===false) {
     echo"<h2> Name is Missing or invalid format:  only alphabate is allowed</h2>";
   }
   else if($email===false) {
     echo"<h2>Email is Missing or wrong email format, type as : xyz@gmail.com</h2>";
   }
   else if($phone===false) {
     echo"<h2> Phone no. is not valid : only digits allowed and has to be 10digits</h2>";

   } 
   else if($subject===false) {
    echo"<h2>Subject is Missing</h2><br>";
   }
   else if(empty($message)) {
    echo"<h2>Message is Missing</h2>";
   }
    else {
    $sql = "INSERT INTO contact_form(name, email, phone, subject, message, user_ip, current_ts_dbt) 
    VALUES
    ('$name','$email', '$phone', '$subject', '$message','$user_ip', '$current_timestamp')";
     if(mysqli_query($conn, $sql)) {
// email logic
require 'PHPMailer/src/Exception.php';
require  'PHPMailer/src/PHPMailer.php';
require  'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
 //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
    $mail->isSMTP();  
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;  
    $mail->Username = 'ak383834@gmail.com';    
    $mail->Password = 'cjmhghswwllyhxhn'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;    


    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('ak383834@gmail.com', 'Ajay Kushwaha');     
    $mail->addReplyTo($email, $name);


   //Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    header("Location:./response.php");
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
     }
     else {
      echo"Error".$sql."<br>".mysqli_error($conn);
     }
    }
   }
  }
 }
catch(mysqli_sql_exception $e) {
 echo"Could not connect!". $e->getMessage();
}
?>