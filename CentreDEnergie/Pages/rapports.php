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
			<div class='col-md-12' id='btnRows'>
				<form action='/CentreDEnergie/Pages/TableRapports.php' method='POST'>
					<input type='submit' name='Dreport' id='Dreport' class='btn btn-danger' value='Rapport Détaillé'>
				</form>
			</div>
			<div class='col-md-12' id='btnRows'>
				<form action='/CentreDEnergie/Pages/TableRapports.php' method='POST'>
					<input type='submit' name='Sreport' id='Sreport' class='btn btn-danger' value='Rapport Sommaire'>
			</div>
			<br>
			<div class='col-md-12' id='btnRows'>
				<form action='/CentreDEnergie/Pages/TableRapports.php' method='POST'>
					<select name='month' required>
						<option value=''>Choisissez Votre Mois</option>
						<option value='Jan'>Janvier</option>
						<option value='Feb'>Février</option>
						<option value='Mar'>Mars</option>
						<option value='Apr'>Avril</option>
						<option value='May'>Mai</option>
						<option value='Jun'>Juin</option>
						<option value='Jul'>Juillet</option>
						<option value='Aug'>Août</option>
						<option value='Sep'>Septembre</option>
						<option value='Oct'>Octobre</option>
						<option value='Nov'>Novembre</option>
						<option value='Dec'>Décembre</option>
				    </select>
					
					<br>
					<input type='submit' name='Ereport' id='Ereport' class='btn btn-danger' value='Rapport D&#39;exception'>
				</form>
			</div>
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