<?php
include("dbConnect.php");
$title=$_POST["postTitle"];
$message=$_POST["message"];

$image= $_FILES['image']['name']; 
$temp_name  = $_FILES['image']['tmp_name'];  
    if(isset($image)&&!empty($image))
	{    
		$location = $_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/PostImages/";      
		
		
		$baseName=pathinfo($image, PATHINFO_FILENAME );
		$extension=pathinfo($image, PATHINFO_EXTENSION );
		
		$counter=1;
		while(file_exists($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/PostImages/".$image))
		{
			$image=$baseName.$counter.".".$extension;
			$counter++;
		}
		move_uploaded_file($temp_name, $location.$image);
    }
	else
	{
		$image=null;
	}
	$addPost = $conn->prepare("INSERT INTO posts (postId, postTitle, postImage, postText, postDate) VALUES(NULL, ?, ?, ?, '".date("Y-m-d")."')");
	$addPost->bind_param("sss", $title, $image, $message);
	$addPost->execute();

	header("Location:/CentreDEnergie/Pages/index.php");
?>