<?php

include("headerLayout.php");

?>


<div class="row">
	<div class="col-md-12"><h2>Connexion</h2></div>
</div>
<div class="row">

	<div class="col-md-3"></div>
	<div class="col-md-5">
	<form method="POST">
	<label for="username" id="lblUser" >Nom d'Utilisateur: </label>
	<input type="text" name="username" class="form-control" id="username" required="required" maxlength="15" autofocus>
	<br>
	<label for="password">Mot de Passe: </label>
	<input type="password" name="password" class="form-control"  id="password" required="required">
	<br>
	<input type="submit" class="btn btn-danger" value="Connexion">
	</form>
	</div>
	<div class="col-md-4"></div>
</div>



























<?php


include("footerLayout.php");


?>