<?php
if (isset($_POST["report"])){
	include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");
	if ($_POST["report"]=="detail"){
		$getTable = $conn->prepare("SELECT username,LName,FName,beltLevel,postedMessages,dateRegistered FROM student ORDER BY dateRegistered DESC, LName");
		$getTable->execute();
		$getTable->store_result();

		$getTable->bind_result($username,$lname,$fname,$beltLevel,$postedMessages,$dateRegistered);
		//echo $getTable->num_rows();
		if($getTable->num_rows()>0)
		{
			echo"
			<h1>Rapport Détaillé</h1>
			<h2>Généré le ".date("Y-m-d")."</h2>
			<div id='tableRows'>
			<table>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Belt Color</th>
				<th>Posted Messages</th>
				<th>Date Registered</th>
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
			</div>";
		}
		else
		{
			echo "<p style='text-align:center;color:#e7d732'>Il n'y a pas de rapport.</p>";
		}
		
		$getTable->close();
		$conn->close();
		$file="détaillé.xls";
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
	}
}
?>