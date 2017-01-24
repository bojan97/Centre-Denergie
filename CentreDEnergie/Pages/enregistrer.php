<?php

include("headerLayout.php");

?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});


</script>
<div class="row">
	<h2>Enregistrement</h2>
</div>
<div class="row">
	<form method="POST">
		<div id="div_Username">
			<label for="username" id="lblUser" >Nom d'Utilisateur: </label>
			<input type="text" name="username" class="form-control" id="username" required="required" maxlength="15" autofocus>
			<span id="usernameTip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="auto right" title="Le nom d'utilisateur peut avoir jusqu'à 15 charactères et doit être unique."></span>			
		</div>
		<br>
		<div id="div_Password">
			<label for="password">Mot de Passe: </label>
			<input type="password" name="password" class="form-control"  id="password" required="required">
			<span id="passwordTip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="auto right" title="insert password requirements here"></span>
		</div>
		<br>
		<div id="div_RPassword">
			<label for="rpassword">Répétez Mot de Passe: </label>
			<input type="password" name="rpassword" class="form-control"  id="rpassword" required="required">
			<br>
		</div>
		<br>
		<div id="div_Name">
			<label for="fname">Prénom: </label>
			<input type="text" name="fname" class="form-control"  id="fname" required="required">
			<span id="nameTip" class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="auto right" title="Votre nom ne sera pas visible publiquement"></span>
		</div>
		<br>
		<div>
			<label for="lname">Nom: </label>
			<input type="text" name="lname" class="form-control"  id="lname" required="required">
			<br>
		</div>
		<br><br>
		<input type="submit" class="btn btn-danger" value="Enregistrer">
	</form>
</div>

<?php
include("footerLayout.php");
?>