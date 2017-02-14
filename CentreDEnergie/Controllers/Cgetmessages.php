<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");
include("dbConnect.php");
if(isset($_SESSION["loginStatus"]))
{
if($_SESSION["loginStatus"]!=null)//check if user is logged in
{
$student=unserialize($_SESSION["student"]);

$username = $student->getUsername();


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
}
else
	header("Location:/CentreDEnergie/Pages/index.php");
}
else
	header("Location:/CentreDEnergie/Pages/index.php");

$conn->close();

?>