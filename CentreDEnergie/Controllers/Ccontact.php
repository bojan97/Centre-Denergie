<?php
include ("class.smtp.php");
include ("class.phpmailer.php");

$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'centredenergiedechambly@gmail.com';                 // SMTP username
$mail->Password = 'I<3B0j4N';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->IsHTML(true);
$mail->setFrom('centredenergiedechambly@gmail.com');
$mail->addAddress($_POST["email"]);     // Add a recipient

$mail->Subject = 'Message ecris par '.$_POST["email"];
$mail->Body    = $_POST["message"];

if(!$mail->send()) {
    echo '<br>Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>