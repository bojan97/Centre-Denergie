<?php
include("dbConnect.php");

$postId = $_GET["id"];

$getImage = $conn->prepare("SELECT postImage FROM posts WHERE postId = ?");
$getImage->bind_param("i", $postId);
$getImage->execute();
$getImage->bind_result($img);
$getImage->fetch();
$getImage->close();


unlink($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/PostImages/".$img);


$deletePost = $conn->prepare("DELETE FROM posts WHERE postId = ?");
$deletePost->bind_param("i", $postId);
$deletePost->execute();
$deletePost->close();

header("Location:/CentreDEnergie/Pages/index.php");

?>