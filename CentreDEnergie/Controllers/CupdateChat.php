<?php
echo "works";

session_start();
include("dbConnect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

$student=unserialize($_SESSION["student"]);

$username = $student->getUsername();
$senderColor = $student->getRank();
$message=$_POST["message"];

$updateChat = $conn->prepare("INSERT INTO chat (messageId, senderUsername,senderColor, message, dateSent) VALUES(NULL, ?, ?, ?, '".date("Y-m-d")."')");
$updateChat->bind_param("sss", $username, $senderColor, $message);
$updateChat->execute();


$updateChat->close();

header("Location:/CentreDEnergie/Pages/salle.php#wrapper");

?>