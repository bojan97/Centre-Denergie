<?php

include("headerLayout.php");

?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-4"><h2>Enregistrement</h2></div>
	<div class="col-md-3"></div>
</div>
<div class="row">

	<div class="col-md-3"></div>
	<div class="col-md-5">
	<form method="POST">
	<label for="username" id="lblUser" >Nom d'Utilisateur: </label>
	<input type="text" name="username" class="form-control" id="username" required="required" maxlength="15" autofocus><span id="usernameTip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Le nom d'utilisateur peut avoir jusqu'à 15 charactères et doit être unique."></span>
	<br>
	<label for="password">Mot de Passe: </label>
	<input type="password" name="password" class="form-control"  id="password" required="required"><span id="passwordTip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="insert password requirements here"></span>
	<br>
	<label for="rpassword">Répétez Mot de Passe: </label>
	<input type="password" name="rpassword" class="form-control"  id="rpassword" required="required">
	<br>
	<label for="fname">Prénom: </label>
	<input type="text" name="fname" class="form-control"  id="fname" required="required"><span id="nameTip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Votre nom ne sera pas visible publiquement"></span>
	<br>
	<label for="lname">Nom: </label>
	<input type="text" name="lname" class="form-control"  id="lname" required="required">
	<br>
	<input type="submit" class="btn btn-danger" value="Enregistrer" required="required">
	</form>
	</div>
	<div class="col-md-4"></div>
</div>



<?php

include("footerLayout.php");


?>