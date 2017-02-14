<?php

include("headerLayout.php");
if(isset($_SESSION['success'])&&$_SESSION['success']==true)
{
	echo "<script type=text/javascript>";
	echo "alert('Le message a été envoyé')";
	echo "</script>";
	
	$_SESSION['success']=false;
}

if(isset($_SESSION['success'])&&$_SESSION['success']==false)
{
	echo "<script type=text/javascript>";
	echo "alert('Une erreur est survenue. Le message n'a pas été envoyé.')";
	echo "</script>";
	
	$_SESSION['success']=false;
}

?>

<div class="row" id="message_Post">
		<h2>Laissez un Message</h2>
		<p>Si vous avez des questions, vous pouvez nous envoyer un message par courriel</p>
		<br>
		<form action="/CentreDEnergie/Controllers/Ccontact.php" method="POST">
		<p>Adresse Courriel: <input type="email" name="email" id="email"class="form-control"required="required" id="email"></p>
		<br>
		<p>Message:</p>
		<textarea name="message" id="message" class="form-control" rows="7" cols="70" maxlength="1000" required="required"></textarea>
		
		<br>
		<input type="submit" class="btn btn-danger" value="Envoyer">
		</form>
</div>
<br>
<div class="row" id="coord">
	<h2>Nos Coordonnées</h2>
	<p>(514)231-5222<br>
	   250 boulevard Fréchette, J3L 2Z5 Chambly, Canada<br>
	   test@hotmail.com
	</p>
</div>













<?php

include("footerLayout.php");


?>