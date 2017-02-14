<?php
session_start();
include ("class.smtp.php");
include ("class.phpmailer.php");
include("dbConnect.php");
$_SESSION['success']=false;
if(isset($_POST["email"]))
{
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
$mail->setFrom($_POST["email"]);
$mail->addAddress('centredenergiedechambly@gmail.com');     // Add a recipient

$mail->Subject = 'Message ecris par '.$_POST["email"];
$mail->Body    = $_POST["message"];


if(!$mail->send()) {
    $_SESSION['success']=false;
} 
else 
{
    $_SESSION['success']=true;
	
	$email = $_POST["email"];
	$email = strip_tags($email);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	
	$message = $_POST["message"];
	$message = strip_tags($message);
	$message = filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
	
	$updateCustomer = $conn->prepare("INSERT INTO Customer (email, message, dateSent) VALUES(?, ?, '".date("Y-m-d")."')");
	$updateCustomer->bind_param("ss", $email, $message);
	$updateCustomer->execute();
	$updateCustomer->close();
	
	$conn->close();
	
	
	header("Location:/CentreDEnergie/Pages/contact.php");
}
}
else
	header("Location:/CentreDenergie/Pages/index.php");
?>