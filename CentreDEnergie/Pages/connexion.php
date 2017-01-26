<?php
session_start();
include("headerLayout.php");

?>


<div class="row">
	<h2>Connexion</h2>
</div>
<div class="row">

	<form method="POST" action="/CentreDEnergie/Controllers/Clogin.php">
	<label for="username" id="lblUser" >Nom d'Utilisateur: </label>
	<input type="text" name="username" class="form-control" id="username" required="required" maxlength="15" autofocus>
	<br>
	<label for="password">Mot de Passe: </label>
	<input type="password" name="password" class="form-control"  id="password" required="required">
	<p><?php if(isset($_SESSION["error"]))echo $_SESSION["error"]; ?></p>
	<input type="submit" class="btn btn-danger" value="Connexion">
	</form>
</div>


<?php


include("footerLayout.php");


?>