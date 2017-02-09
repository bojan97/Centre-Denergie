<?php
include("headerLayout.php");

$username="";
$password="";
$rpassword="";
$fname="";
$lname="";

if(isset($_SESSION["username"])) $username=$_SESSION["username"];
if(isset($_SESSION["fname"])) $fname=$_SESSION["fname"];
if(isset($_SESSION["lname"])) $lname=$_SESSION["lname"];

?>
<script>
$(document).ready(function(){
    $("[data-toggle='tooltip']").tooltip(); 
});
</script>
<?php
if(!isset($_SESSION["loginStatus"])||$_SESSION["loginStatus"]==null)//check if user is logged in
{

echo"
<div class='row'>
	<h2>Enregistrement</h2>
</div>
<div class='row'>
	<form method='POST' action='/CentreDEnergie/Controllers/Cregister.php'>
		<div id='div_Username'>
			<label for='username' id='lblUser' >Nom d'Utilisateur: </label>
			<input type='text' name='username' class='form-control' id='username' required='required' maxlength='15' autofocus value='$username'>
			<span id='usernameTip' class='glyphicon glyphicon-question-sign' data-toggle='tooltip' data-placement='auto right' title='Le nom d&#39;utilisateur peut avoir jusqu&#39;à 15 charactères et doit être unique.'></span>
			<br>
			"; if(isset($_SESSION['errorUsername'])&&$_SESSION['errorUsername']==true) echo"<p>Le nom d'utilisateur est invalide</p>"; echo"
		</div>
		<br>
		<div id='div_Password'>
			<label for='password'>Mot de Passe: </label>
			<input type='password' name='password' class='form-control'  id='password' required='required' maxlength='50' >
			<span id='passwordTip' class='glyphicon glyphicon-question-sign' data-toggle='tooltip' data-placement='auto right' title='Le mot de passe doit contenir au moins 8 charactères et un chiffre.'></span>
			<br>
			"; if(isset($_SESSION['errorPassword'])&&$_SESSION['errorPassword']==true) echo"<p>Le mot de passe est invalide</p>"; echo "
		</div>
		<br>
		<div id='div_RPassword'>
			<label for='rpassword'>Répétez Mot de Passe: </label>
			<input type='password' name='rpassword' class='form-control'  id='rpassword' required='required' maxlength='50'>
			<br>
			"; if(isset($_SESSION['errorRpassword'])&&$_SESSION['errorRpassword']==true) echo"<p id='passEqaulity'>Les mots de passe ne sont pas pareilles</p>"; echo"
		</div>
		<br>
		<div id='div_Name'>
			<label for='fname'>Prénom: </label>
			<input type='text' name='fname' class='form-control'  id='fname' required='required'  maxlength='50' value='$fname'>
			<span id='nameTip' class='glyphicon glyphicon-question-sign' data-toggle='tooltip' data-placement='auto right' title='Votre nom ne sera pas visible publiquement.'></span>
		</div>
		<br>
		<div>
			<label for='lname'>Nom: </label>
			<input type='text' name='lname' class='form-control'  id='lname' required='required' maxlength='50' value='$lname'>
			<br>
			"; if(isset($_SESSION['errorName'])&&$_SESSION['errorName']==true) echo"<p>Le prénom ou le nom est invalide</p>"; echo"
		</div>
		<br>
		<br>
		<div class='buttonHolder'>
			<input type='submit' class='btn btn-danger' value='Enregistrer'>
		</div>
		<p>Vous avez déja un compte? <a href='connexion.php' id='link'>Cliquez ici</a> pour vous connecter!</p>
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