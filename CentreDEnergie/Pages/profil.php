<?php

include("headerLayout.php");

?>


<div class="row">
	<div class="col-md-12"><h2>Mon Profil</h2></div>
</div>
<div class="row">
	<div class="col-md-12">
	<form method="POST" id="changeUsername">
	<div id="usernameHeader">
			<h3>Nom d'Utilisateur</h3>
			<p>Changez votre nom d'utilisateur ici.</p>
		</div>
	<label for="username" id="lblUser" >Nom d'Utilisateur: </label>
	<input type="text" name="username" class="form-control" id="username" readonly value="thelegend27">
	<br>
	<label for="newusername">Nouveau Nom d'Utilisateur: </label>
	<input type="newusername" name="newusername" class="form-control"  id="newusername" required="required" maxlength="15">
	<br>
	<input type="submit" class="btn btn-danger" id="usernameSubmit" value="Changer">
	</form>
	
	<form method="POST" id="changePassword">
	<div id="passwordHeader">
			<h3>Mot de Passe</h3>
			<p>Changez votre mot de passe ici.</p>
		</div>
	<label for="password" id="lblPassword" >Mot de Passe Actuel: </label>
	<input type="password" name="password" class="form-control" id="password" required="required">
	<br>
	<label for="newPassword">Nouveau Mot de Passe: </label>
	<input type="password" name="newPassword" class="form-control"  id="newPassword" required="required">
	<br>
	<label for="rnewPassword">Répétez Nouveau Mot de Passe: </label>
	<input type="password" name="rnewPassword" class="form-control"  id="rnewPassword" required="required">
	<br>
	<input type="submit" class="btn btn-danger" id="passwordSubmit" value="Changer">
	</form>
	</div>
</div>
<div class="row">
<div class="col-md-12">
<form method="POST" id="changeRank">
	<div id="rankHeader">
			<h3>Couleur de Ceinture</h3>
			<p>Si vous voulez changer le niveau de votre ceinture, vous<br>
			   devez demander le code à votre instructeur et l'écrire ici.</p>
		</div>
	<label for="curBelt" id="lblCur" >Ceinture Actuelle: </label>
	<input type="text" name="curBelt" class="form-control" id="curBelt" readonly value="Violette">
	<br>
	<label for="code">Code de Ceinture: </label>
	<input type="code" name="code" class="form-control"  id="code" required="required">
	<br>
	<input type="submit" class="btn btn-danger" id="rankSubmit" value="Mettre à Niveau">
</form>
</div>

</div>





<?php

include("footerLayout.php");

?>