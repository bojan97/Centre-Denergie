<?php
echo "works";

session_start();
include("dbConnect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

$student=unserialize($_SESSION["student"]);

$username = $student->getUsername();
$message=$_POST["message"];

$updateChat = $conn->prepare("INSERT INTO chat (messageId, senderUsername, message, dateSent) VALUES(NULL, ?, ?, '".date("Y-m-d")."')");
$updateChat->bind_param("ss", $username, $message);
$updateChat->execute();


$updateChat->close();

?>