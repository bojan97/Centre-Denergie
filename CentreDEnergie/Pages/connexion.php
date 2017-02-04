<?php
include("headerLayout.php");


if(!isset($_SESSION["loginStatus"])||$_SESSION["loginStatus"]==null)//check if user is logged in
{
	
	
	echo "<div class='row'>
	<h2>Connexion</h2>
</div>
<div class='row'>

	<form method='POST' action='/CentreDEnergie/Controllers/Clogin.php'>
	<label for='username' id='lblUser' >Nom d'Utilisateur: </label>
	<input type='text' name='username' class='form-control' id='username' required='required' maxlength='15' autofocus>
	<br>
	<label for='password'>Mot de Passe: </label>
	<input type='password' name='password' class='form-control'  id='password' required='required'>
	<br>
	<p>"; if(isset($_SESSION['error'])) echo $_SESSION['error'];
	echo"</p>
	<div class='buttonHolder'>
		<input type='submit' class='btn btn-danger' value='Connexion'>
	</div>
	</form>
</div>";
}
else
{
	header("Location:/CentreDEnergie/Pages/profil.php");
}

?>





<?php


include("footerLayout.php");


?>