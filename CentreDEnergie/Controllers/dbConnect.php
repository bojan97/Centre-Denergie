<?php
	//connect to server and select database; you may need it
	$conn = new mysqli('localhost','root','','students');
	//if connection fails, stop script execution
	if ($conn->connect_error) {
		echo("Couldn't make a connection \n".$conn->connect_error);
		exit();
	}
?>