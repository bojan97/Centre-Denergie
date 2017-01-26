<?php
session_start();
include("headerLayout.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

$student=unserialize($_SESSION["student"]);

$username = $student->getUsername();
$rank = $student->getRank();

?>
<div class="row">
		<h2>Mon Profil</h2>
</div>
<div class="row">
	<form id="changeUsername" method="post" name="changeUsername">
		<div id="usernameHeader">
			<h3>Nom d'Utilisateur</h3>
			<p>Changez votre nom d'utilisateur ici.</p>
		</div>
		<label for="username" id="lblUser">Nom d'Utilisateur:</label> <input class="form-control" id="username" name="username" readonly type="text" value="<?php echo $username ?>"><br>
		<label for="newusername">Nouveau Nom d'Utilisateur:</label> <input class="form-control" id="newusername" maxlength="15" name="newusername" required="required" type="newusername"><br>
		<input class="btn btn-danger" id="usernameSubmit" type="submit" value="Changer">
	</form>
	<form id="changePassword" method="post" name="changePassword">
		<div id="passwordHeader">
			<h3>Mot de Passe</h3>
			<p>Changez votre mot de passe ici.</p>
		</div>
		<label for="password" id="lblPassword">Mot de Passe Actuel:</label> <input class="form-control" id="password" name="password" required="required" type="password"><br>
		<label for="newPassword">Nouveau Mot de Passe:</label> <input class="form-control" id="newPassword" name="newPassword" required="required" type="password"><br>
		<label for="rnewPassword">Répétez Nouveau Mot de Passe:</label> <input class="form-control" id="rnewPassword" name="rnewPassword" required="required" type="password"><br>
		<input class="btn btn-danger" id="passwordSubmit" type="submit" value="Changer">
	</form>
</div>
<div class="row">
	<form id="changeRank" method="post" name="changeRank">
		<div id="rankHeader">
			<h3>Couleur de Ceinture</h3>
			<p>Si vous voulez changer le niveau de votre ceinture, vous<br>
			devez demander le code à votre instructeur et l'écrire ici.</p>
		</div>
		<label for="curBelt" id="lblCur">Ceinture Actuelle:</label> <input class="form-control" id="curBelt" name="curBelt" readonly type="text" value="<?php echo $rank ?>"><br>
		<label for="code">Code de Ceinture:</label> <input class="form-control" id="code" name="code" required="required" type="code"><br>
		<input class="btn btn-danger" id="rankSubmit" type="submit" value="Mettre à Niveau">
	</form>
</div>

<?php

include("footerLayout.php");

?>