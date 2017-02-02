<?php
include("headerLayout.php");


if(isset($_SESSION["loginStatus"]))
{
if($_SESSION["loginStatus"]=='T')//check if user is logged in
{
	
	echo"<div class='row' id='message_Post'>
		<h2>Nouveau Article</h2>
		<p>Composez un nouveau article pour la page d'acceuil</p>
		<br>
		<form method='POST' action='/CentreDEnergie/Controllers/Caddpost.php' enctype='multipart/form-data'>
		<p>Titre: <input type='text' name='postTitle' id='postTitle' class='form-control'required='required' maxlength='30'></p>
		<br>
		<p>Image (optionelle):<input type='file' name='image' id='image' accept='image/*'  style='color:white'></p>
		<br>
		<p>Message:</p>
		<textarea name='message' id='message' class='form-control' rows='7' cols='70' required='required' maxlength='740'></textarea>
		<br>
		<input type='submit' class='btn btn-danger' value='Envoyer'>
		</form>
		</div>";

}
else
{
	echo "<br><br><p style='text-align:center;color:red'>Vous n'avez pas la permission d'être ici.</p>";
}
}
else
{
	echo "<br><br><p style='text-align:center;color:red'>Vous n'avez pas la permission d'être ici.</p>";
}
?>













<?php

include("footerLayout.php");


?>