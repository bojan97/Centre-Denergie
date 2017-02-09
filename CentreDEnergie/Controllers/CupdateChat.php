<?php

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




$updateStudentTable = $conn->prepare("UPDATE student SET postedMessages = postedMessages + 1 WHERE username=?");
$updateStudentTable->bind_param("s", $username);
$updateStudentTable->execute();
$updateStudentTable->close();




$getPostedMessages = $conn->prepare("SELECT postedMessages FROM student WHERE username=?");
$getPostedMessages->bind_param("s", $username);
$getPostedMessages->execute();
$getPostedMessages->store_result();

$getPostedMessages->bind_result($postedMessages);
$getPostedMessages->close();


//header("Location:/CentreDEnergie/Pages/salle.php#wrapper");

?>