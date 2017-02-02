<?php


include("headerLayout.php");

?>


<div class="post" style="">
	
	
<ul id="chatMessages">	
	<li>bojan97: Hello</li>
	<br>
	<li>123faker: whats up?</li>
	<br>
	<li>bojan97: Hello</li>
	<li>123faker: whats up?</li>
	<li>bojan97: Hello</li>
	<li>123faker: whats up?</li>
	<li>bojan97: Hello</li>
	<li>123faker: whats up?</li>
	<li>bojan97: Hello</li>
	<li>123faker: whats up?</li>
	<li>bojan97: Hello</li>
	<li>123faker: whats up?</li>
	<li>bojan97: Hello</li>
	<li>123faker: whats up?</li>
	<li>bojan97: Hello</li>
	<li>123faker: whats up?</li>
	
</ul>	
<hr id="tareaBorder">
<form method="POST" action='/CentreDEnergie/Controllers/CupdateChat.php'>
	<textarea name="message" rows="3" placeholder="Écrivez votre message ici..."autofocus required="required"></textarea>
	<input type="submit" id="button" class="input_Button" value="Envoyer">

	<input type="submit" id="button" value="Envoyer" class="button_Button"><span class="glyphicon glyphicon-share-alt"></span></input>
</form>
</div>

<?php

include("footerLayout.php");


?>