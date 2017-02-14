<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");
	
	if(isset($_POST["Ereport"])){
		echo $_POST["month"];
	}
	if(isset($_POST["Dreport"])){	
		$getTable = $conn->prepare("SELECT username,LName,FName,beltLevel,postedMessages,dateRegistered FROM student ORDER BY dateRegistered DESC, LName");
		$getTable->execute();
		$getTable->store_result();

		$getTable->bind_result($username,$lname,$fname,$beltLevel,$postedMessages,$dateRegistered);
		//echo $getTable->num_rows();
		if($getTable->num_rows()>0)
		{
			echo"<link rel='stylesheet' href='/CentreDEnergie/Content/CSSTableRapports.css'>
			<h1>Rapport Détaillé</h1>
			<h2>Généré le ".date("Y-m-d")."</h2>
			<div id='tableRows'>
			<table>
			<tr>
				<th>Nom d'utilisateur</th>
				<th>Nom</th>
				<th>Couleur de ceinture</th>
				<th>Messages Postés</th>
				<th>Date d'enregistrement</th>
			</tr>";
			while($getTable->fetch())
			{
				echo "<tr>
					<td>$username</td>
					<td>$lname,$fname</td>
					<td>$beltLevel</td>
					<td>$postedMessages</td>
					<td>$dateRegistered</td>
				</tr>";
			}
			echo"</table>
			</div>
			<br>
			<form action='/CentreDEnergie/Pages/TableRapportsTelecharger.php' method='POST'>
				<input type='hidden' name='report' value='detail'>
				<input type='submit' name='download' value='Télécharger'>
			</form>
			<br>
			<a href='/CentreDEnergie/Pages/rapports.php'>Retourner</a>";
		}
		else
		{
			echo "<p style='text-align:center;color:#e7d732'>Il n'y a pas de rapport.</p>";
		}
		
		$getTable->close();
		$conn->close();
	}
	
?>