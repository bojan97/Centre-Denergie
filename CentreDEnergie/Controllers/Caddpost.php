<?php
include("dbConnect.php");
$title=$_POST["postTitle"];
$title = strip_tags($title);
$title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);


$message=$_POST["message"];
$message = strip_tags($message);
$message = filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);

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
	if(isset($_POST["postId"])&&$_POST["postId"]!=0)//EXISTING POST IS BEING EDITED
	{
		$postId = $_POST["postId"];
		
		$getImage = $conn->prepare("SELECT postImage FROM posts WHERE postId = ?");
		$getImage->bind_param("i", $postId);
		$getImage->execute();
		$getImage->bind_result($img);
		$getImage->fetch();
		$getImage->close();
		
		if($image!=$img)
		{
			unlink($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/PostImages/".$img);
		}
		
		$addPost = $conn->prepare("UPDATE posts SET postTitle = ?, postImage = ?, postText = ?  WHERE postId = ?");
		$addPost->bind_param("sssi", $title, $image, $message, $postId);
		$addPost->execute();
		$addPost->close();
	}
	else//NEW POST IS CREATED
	{
		$addPost = $conn->prepare("INSERT INTO posts (postId, postTitle, postImage, postText, postDate) VALUES(NULL, ?, ?, ?, '".date("Y-m-d")."')");
		$addPost->bind_param("sss", $title, $image, $message);
		$addPost->execute();
		$addPost->close();
	}
	header("Location:/CentreDEnergie/Pages/index.php");
	$conn->close();
?>