<?php
include("headerLayout.php");


if(isset($_SESSION["loginStatus"]))
{
	if($_SESSION["loginStatus"]=='T')//check if user is logged in
	{
		include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");
		
		$postId=0;
		
		if(isset($_GET["id"]))
		{
			$postId=$_GET["id"];
		}
		
		$getPostInfo = $conn->prepare("SELECT postId, postTitle, postText, postDate FROM posts WHERE postId = ?");
		$getPostInfo->bind_param("i", $postId);
		$getPostInfo->execute();
		$getPostInfo->bind_result($postId,$postTitle,$postText, $postDate);
		$getPostInfo->fetch();
		$getPostInfo->close();
		
		
		echo"<div class='row'>
			<h2>Rapport</h2>
			
			</div>";

	}
	else
	{
		echo "<br><br><p style='text-align:center;color:red'>Vous n'avez pas la permission d'être ici.</p>";
	}
}
else
{
	echo "<br><br><p style='text-align:center;color:red'>Vous n'avez pas la permission d'être ici.</p>";
}
?>



<?php

include("footerLayout.php");


?>