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
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}