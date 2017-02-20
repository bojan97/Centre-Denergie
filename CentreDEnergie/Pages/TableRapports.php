<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");
	
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
					<td>$lname, $fname</td>
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
			echo "<p style='text-align:center;'>Il n'y a pas de rapport.</p>
				<div style='text-align:center;'>
				<a href='/CentreDEnergie/Pages/rapports.php' style='display:inline-block;'>Retourner</a>
				</div>";
		}
		
		$getTable->close();
		$conn->close();
	}
	
	else if(isset($_POST["Sreport"])){
		//Get the total number of student 
		$getTotalStudents = $conn->prepare("SELECT COUNT(username) FROM student");
		$getTotalStudents->execute();
		$getTotalStudents->store_result();
		$getTotalStudents->bind_result($totalStudents);
		
		//get the total number of post message
		$getTotalPosts = $conn->prepare("SELECT SUM(postedMessages) FROM student");
		$getTotalPosts->execute();
		$getTotalPosts->store_result();
		$getTotalPosts->bind_result($totalPosts);
		
		//get the number of student per belt level
			//white
		$getTotalWhiteStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='blanche'");
		$getTotalWhiteStudents->execute();
		$getTotalWhiteStudents->store_result();
		$getTotalWhiteStudents->bind_result($totalWhiteStudents);
		
			//yellow
		$getTotalYellowStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='jaune'");
		$getTotalYellowStudents->execute();
		$getTotalYellowStudents->store_result();
		$getTotalYellowStudents->bind_result($totalYellowStudents);
		
			//orange
		$getTotalOrangeStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='orange'");
		$getTotalOrangeStudents->execute();
		$getTotalOrangeStudents->store_result();
		$getTotalOrangeStudents->bind_result($totalOrangeStudents);
		
			//purple
		$getTotalPurpleStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='violette'");
		$getTotalPurpleStudents->execute();
		$getTotalPurpleStudents->store_result();
		$getTotalPurpleStudents->bind_result($totalPurpleStudents);
		
			//blue
		$getTotalBlueStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='bleue'");
		$getTotalBlueStudents->execute();
		$getTotalBlueStudents->store_result();
		$getTotalBlueStudents->bind_result($totalBlueStudents);
		
			//Green
		$getTotalGreenStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='verte'");
		$getTotalGreenStudents->execute();
		$getTotalGreenStudents->store_result();
		$getTotalGreenStudents->bind_result($totalGreenStudents);
		
			//Brown
		$getTotalBrownStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='brune'");
		$getTotalBrownStudents->execute();
		$getTotalBrownStudents->store_result();
		$getTotalBrownStudents->bind_result($totalBrownStudents);
		
			//Black
		$getTotalBlackStudents = $conn->prepare("SELECT COUNT(username) FROM student Where beltLevel='noire'");
		$getTotalBlackStudents->execute();
		$getTotalBlackStudents->store_result();
		$getTotalBlackStudents->bind_result($totalBlackStudents);
		
		
		
		if($getTotalStudents->num_rows()>0)
		{
			echo"<link rel='stylesheet' href='/CentreDEnergie/Content/CSSTableRapports.css'>
				<h1>Rapport de sommaire</h1>
				<h2>Généré le ".date("Y-m-d")."</h2>
				<div id='tableRows'>
				<table>
				<tr>
					<th>Le nombre total d'étudiants</th>
					<th>Le nombre total de messages postés</th>
					<th>Le nombre total d'étudiants avec une ceinture blanche</th>
					<th>Le nombre total d'étudiants avec une ceinture jaune</th>
					<th>Le nombre total d'étudiants avec une ceinture orange</th>
					<th>Le nombre total d'étudiants avec une ceinture violette</th>
					<th>Le nombre total d'étudiants avec une ceinture blue</th>
					<th>Le nombre total d'étudiants avec une ceinture verte</th>
					<th>Le nombre total d'étudiants avec une ceinture brune</th>
					<th>Le nombre total d'étudiants avec une ceinture noire</th>
				</tr>
				<tr>";
				while($getTotalStudents->fetch())
				{
					echo "<td>$totalStudents</td>";
				}
				if($getTotalPosts->num_rows()>0){
					while($getTotalPosts->fetch())
					{
						echo "<td>$totalPosts</td>";
					}
				}
				if($getTotalWhiteStudents->num_rows()>0){
					while($getTotalWhiteStudents->fetch())
					{
						echo "<td>$totalWhiteStudents</td>";
					}
				}
				if($getTotalYellowStudents->num_rows()>0){
					while($getTotalYellowStudents->fetch())
					{
						echo "<td>$totalYellowStudents</td>";
					}
				}				
				if($getTotalOrangeStudents->num_rows()>0){
					while($getTotalOrangeStudents->fetch())
					{
						echo "<td>$totalOrangeStudents</td>";
					}
				}
				if($getTotalPurpleStudents->num_rows()>0){
					while($getTotalPurpleStudents->fetch())
					{
						echo "<td>$totalPurpleStudents</td>";
					}
				}
				if($getTotalBlueStudents->num_rows()>0){
					while($getTotalBlueStudents->fetch())
					{
						echo "<td>$totalBlueStudents</td>";
					}
				}
				if($getTotalGreenStudents->num_rows()>0){
					while($getTotalGreenStudents->fetch())
					{
						echo "<td>$totalGreenStudents</td>";
					}
				}
				if($getTotalBrownStudents->num_rows()>0){
					while($getTotalBrownStudents->fetch())
					{
						echo "<td>$totalBrownStudents</td>";
					}
				}
				if($getTotalBlackStudents->num_rows()>0){
					while($getTotalBlackStudents->fetch())
					{
						echo "<td>$totalBlackStudents</td>";
					}
				}
				echo"
				</tr>
				</table>
				</div>
				<br>
				<form action='/CentreDEnergie/Pages/TableRapportsTelecharger.php' method='POST'>
					<input type='hidden' name='report' value='summary'>
					<input type='submit' name='download' value='Télécharger'>
				</form>
				<br>
				<a href='/CentreDEnergie/Pages/rapports.php'>Retourner</a>";
			
		}
		else
		{
			echo "<p style='text-align:center;'>Il n'y a pas de rapport.</p>
				<div style='text-align:center;'>
				<a href='/CentreDEnergie/Pages/rapports.php' style='display:inline-block;'>Retourner</a>
				</div>";
		}
		
		$getTotalStudents->close();
		$getTotalPosts->close();
		$getTotalWhiteStudents->close();
		$getTotalYellowStudents->close();
		$getTotalOrangeStudents->close();
		$getTotalPurpleStudents->close();
		$getTotalBlueStudents->close();
		$getTotalGreenStudents->close();
		$getTotalBrownStudents->close();
		$getTotalBlackStudents->close();
		$conn->close();
	}
	
	else if (isset($_POST["Ereport"])){
		$getExceptionTable = $conn->prepare("SELECT username,LName,FName,beltLevel,postedMessages,dateRegistered FROM student WHERE MONTH(dateRegistered)=".$_POST["month"]." AND YEAR(dateRegistered)=".date("Y")." ORDER BY dateRegistered DESC, LName");
		$getExceptionTable->execute();
		$getExceptionTable->store_result();

		$getExceptionTable->bind_result($username,$lname,$fname,$beltLevel,$postedMessages,$dateRegistered);
		if($getExceptionTable->num_rows()>0)
		{
			$mois = array("Janvier", "Février", "Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			
			echo"<link rel='stylesheet' href='/CentreDEnergie/Content/CSSTableRapports.css'>
			<h1>Rapport d'exception pour ".$mois[$_POST["month"]-1]." ".date("Y")."</h1>
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
			while($getExceptionTable->fetch())
			{
				echo "<tr>
					<td>$username</td>
					<td>$lname, $fname</td>
					<td>$beltLevel</td>
					<td>$postedMessages</td>
					<td>$dateRegistered</td>
				</tr>";
			}
			echo"</table>
			</div>
			<br>
			<form action='/CentreDEnergie/Pages/TableRapportsTelecharger.php' method='POST'>
				<input type='hidden' name='month' value='".$_POST["month"]."'>
				<input type='hidden' name='report' value='exception'>
				<input type='submit' name='download' value='Télécharger'>
			</form>
			<br>
			<a href='/CentreDEnergie/Pages/rapports.php'>Retourner</a>";
		}
		else
		{
			echo "<p style='text-align:center;'>Il n'y a pas de rapport.</p>
				<div style='text-align:center;'>
				<a href='/CentreDEnergie/Pages/rapports.php' style='display:inline-block;'>Retourner</a>
				</div>";
		}
		
		$getExceptionTable->close();
		$conn->close();
	}
	else{
		header("Location:/CentreDEnergie/Pages/rapports.php");
	}
?>