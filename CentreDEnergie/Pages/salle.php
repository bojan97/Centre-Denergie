<?php
include("headerLayout.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");

if(isset($_SESSION["loginStatus"]))
{
if($_SESSION["loginStatus"]!=null)//check if user is logged in
{
	$student=unserialize($_SESSION["student"]);

	$username = $student->getUsername();
}
//else  USER NOT LOGGED IN
}
//else  USER NOT LOGGED IN
?>
<script>
$(document).ready(function(){
	$("#wrapper").animate({ scrollTop: $("#chatMessages").height() }, "slow");
});
</script>

<div class="post" style="">
	
<div id="wrapper">	
<ul id="chatMessages">	
	<?php
	
		$array = array(	"blanche"=>"white",
						"jaune"=>"#F5F507",
						"orange"=>"#FFA500",
						"violette"=>"#d365cf",
						"bleue"=>"#4286f4",
						"verte"=>"#37F211",
						"brune"=>"#D2691E",
						"noire"=>"black",);
		
		$getMessages = $conn->prepare("SELECT * FROM chat ORDER BY messageId");
		$getMessages->execute();
		$getMessages->store_result();

		$getMessages->bind_result($messageId,$senderUsername,$senderColor,$message,$dateSent);
		
		while($getMessages->fetch())
		{
			echo "<li "; if($senderUsername==$username)echo"style='margin-left:63%'"; echo "><font style='font-weight:bold;font-family:shanghai;letter-spacing:2px;color:"; echo $array[$senderColor]; echo "'>".$senderUsername."</font><br>
			".$message."</li><br>";
		}
		
		
		$getMessages->close();
	
	?>
	
	<!--
	<li>bojan97: Hello</li>
	<br>
	<li>123faker: whats up?</li>
	<br>
	<li>bojan97: Hello</li>
	<br>
	<li>123faker: whats up?</li>
	<br>
	<li>bojan97: Hello</li>
	<br>
	<li>123faker: whats up?</li>
	<br>
	<li style="margin-left:75%;color:black;">bojan97: testtesttesttesttesttest</li>
	-->
	
	
</ul>
</div>	
<hr id="tareaBorder">
<form method="POST" action='/CentreDEnergie/Controllers/CupdateChat.php'>
	<textarea name="message" rows="3" maxlength="300" placeholder="Écrivez votre message ici..."autofocus required="required" ></textarea>
	<input type="submit" id="button" class="input_Button" value="Envoyer">

	<input type="submit" id="button" value="Envoyer" class="button_Button"><span class="glyphicon glyphicon-share-alt"></span></input>
</form>
</div>

<?php

include("footerLayout.php");


?>