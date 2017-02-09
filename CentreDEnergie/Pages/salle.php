<?php
include("headerLayout.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");

if(isset($_SESSION["loginStatus"]))
{
if($_SESSION["loginStatus"]!=null)//check if user is logged in
{
	$student=unserialize($_SESSION["student"]);

	$username = $student->getUsername();
	
	echo "<div class='post' style=''>
	
<div id='wrapper'>	
<ul id='chatMessages'>";	
		
echo "	
</ul>
</div>	
<hr id='tareaBorder'>
<iframe style='display:none;' name='target'></iframe>
<form method='POST' action='/CentreDEnergie/Controllers/CupdateChat.php' target='target'>
	<textarea name='message' id='message' rows='3' maxlength='100' placeholder='Écrivez votre message ici...'autofocus required='required' ></textarea>
	<input type='submit' id='button' class='input_Button' value='Envoyer'>

	<input type='submit' id='button' value='Envoyer' class='button_Button'><span class='glyphicon glyphicon-share-alt'></span></input>
</form>
</div>";
	
	
}
else//if user is not logged in
{
	echo "<br><p style='color:red;text-align:center'>Vous n'êtes pas connectés. Cliquez <a href='/CentreDEnergie/Pages/connexion.php'>ici </a>pour vous connecter.</p>";
}
}
else//if user is not logged in
{
	echo "<br><p style='color:red;text-align:center'>Vous n'êtes pas connectés. Cliquez <a href='/CentreDEnergie/Pages/connexion.php'>ici </a>pour vous connecter.</p>";
}
?>
<script>
function auto_load(){
        $.ajax({
          url: "/CentreDEnergie/Controllers/Cgetmessages.php",
          cache: false,
          success: function(data){
             $("#chatMessages").html(data);
			 checkScroll();
          } 
        });
		
		
		
}


function scroll(){
	$('#wrapper').animate({ scrollTop: $('#chatMessages').height() }, 'slow');
	
}




function checkScroll()
{
	var container = $("#wrapper");
	var height = container.height();
	var scrollHeight = container[0].scrollHeight;
	var st = container.scrollTop();
	var calc = scrollHeight - st;
	//alert(	"scrollTop="+st+"/n"+
	//	"height="+scrollHeight+"\n"+
	//	"calc="+(scrollHeight-st));
	//alert("fjowief");
	//var scrollPos = $("#wrapper");
	//scrollPos.scrollTop = scrollPos.scrollHeight;
	
	
	
	if(calc>500&&calc<650)
	{
		var foo = document.getElementById('wrapper');

		foo.scrollTop = foo.scrollHeight;
	}
}

 
$(document).ready(function(){
	auto_load(); //Call auto_load() function when DOM is Ready
	$(this).scrollTop(0);

});
 
setInterval(auto_load,1000);
setTimeout(scroll,1000);


 $('#message').keydown(function(event) {
    if (event.keyCode == 13 ) 
	{
		var enteredText = document.getElementById("message").value;
		var numberOfLineBreaks = (enteredText.match(/\n/g)||[]).length;
		if(this.value=="" || numberOfLineBreaks>0)
		{
			$(this).val('').focus();  
			return false;
		}
		else
		{
			$(this.form).submit();
			$(this).val('').focus();
			return false;			
		}
	}
	
 })


</script>



<?php

include("footerLayout.php");


?>

