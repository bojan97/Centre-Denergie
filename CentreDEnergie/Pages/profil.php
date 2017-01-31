<?php
session_start();
include("headerLayout.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

if(isset($_SESSION["loginStatus"]))
{
if($_SESSION["loginStatus"]!=null)//check if user is logged in
{
	$student=unserialize($_SESSION["student"]);

	$username = $student->getUsername();
	$rank = ucfirst($student->getRank());
	
	echo "<div class='row'>
		<h2>Mon Profil</h2>
</div>
<div class='row'>
	<form id='changeUsername' method='post' action='/CentreDEnergie/Controllers/Cchangeusername.php' name='changeUsername'>
		<div id='usernameHeader'>
			<h3>Nom d'Utilisateur</h3>
			<p>Changez votre nom d'utilisateur ici.</p>
		</div>
		<label for='username' id='lblUser'>Nom d'Utilisateur:</label> <input class='form-control' id='username' name='username' readonly type='text' value='$username'><br>
		<label for='newusername'>Nouveau Nom d'Utilisateur:</label> <input class='form-control' id='newusername' maxlength='15' name='newusername' required='required' type='newusername'>
		<br>
		"; if(isset($_SESSION['errorNewusername'])&&$_SESSION['errorNewusername']==true) echo"<p>Le nom d'utilisateur est invalide</p>"; echo"
		<input class='btn btn-danger' id='usernameSubmit' type='submit' value='Changer'>
	</form>
	<form id='changePassword' method='post' name='changePassword' action='/CentreDEnergie/Controllers/Cchangepassword.php'>
		<div id='passwordHeader'>
			<h3>Mot de Passe</h3>
			<p>Changez votre mot de passe ici.</p>
		</div>
		<input class='form-control' id='username' name='username' readonly type='hidden' value='$username'>
		<label for='password' id='lblPassword'>Mot de Passe Actuel:</label> <input class='form-control' id='password' name='password' required='required' type='password'>
		<br>
		"; if(isset($_SESSION['errorPassword'])&&$_SESSION['errorPassword']==true) echo"<p>Le mot de passe actuel est invalide</p>"; echo"
		<label for='newPassword'>Nouveau Mot de Passe:</label> <input class='form-control' id='newPassword' name='newPassword' required='required' type='password'><br>
		<label for='rnewPassword'>Répétez Nouveau Mot de Passe:</label> <input class='form-control' id='rnewPassword' name='rnewPassword' required='required' type='password'>
		<br>
		"; if(isset($_SESSION['errorNewPassword'])&&$_SESSION['errorNewPassword']==true) echo"<p>Le nouveau mot de passe est invalide</p>"; echo"
		<input class='btn btn-danger' id='passwordSubmit' type='submit' value='Changer'>
	</form>
</div>
<div class='row'>
	<form id='changeRank' method='post' name='changeRank' action='/CentreDEnergie/Controllers/Cupgrade.php'>
		<div id='rankHeader'>
			<h3>Couleur de Ceinture</h3>
			<p>Si vous voulez changer le niveau de votre ceinture, vous<br>
			devez demander le code à votre instructeur et l'écrire ici.</p>
		</div>
		<input class='form-control' id='username' name='username' readonly type='hidden' value='$username'>
		<label for='curBelt' id='lblCur'>Ceinture Actuelle:</label> <input class='form-control' id='curBelt' name='curBelt' readonly type='text' value='$rank'><br>
		<label for='code'>Code de Ceinture:</label> <input type='code' class='form-control' id='code' name='code' required='required' >
		<br>
		"; if(isset($_SESSION['errorCode'])&&$_SESSION['errorCode']==true) echo"<p>Le code est invalide</p>"; echo"
		<input class='btn btn-danger' id='rankSubmit' type='submit' value='Mettre à Niveau'>
	</form>
</div>";
	
}
}
else//if user is not logged in
{
	echo "<h2>Mon Profil</h2>
		<p style='color:red'>Vous n'êtes pas connectés. Cliquez <a href='/CentreDEnergie/Pages/connexion.php'>ici </a>pour vous connecter.</p>";
}
?>


<?php

include("footerLayout.php");

?>