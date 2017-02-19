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
				</form>
			</div>
			<br>
			<div class='col-md-12' id='btnRows'>
				<form action='/CentreDEnergie/Pages/TableRapports.php' method='POST'>
					<select name='month' required>
						<option value=''>Choisissez Votre Mois</option>
						<option value='1'>Janvier</option>
						<option value='2'>Février</option>
						<option value='3'>Mars</option>
						<option value='4'>Avril</option>
						<option value='5'>Mai</option>
						<option value='6'>Juin</option>
						<option value='7'>Juillet</option>
						<option value='8'>Août</option>
						<option value='9'>Septembre</option>
						<option value='10'>Octobre</option>
						<option value='11'>Novembre</option>
						<option value='12'>Décembre</option>
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