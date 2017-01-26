<?php
session_start();
include("Student.php");
include("dbConnect.php");

$username=$_POST["username"];
$password=$_POST["password"];
$stmt = $conn->prepare("SELECT * FROM student WHERE username=? AND pass=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows<1)
{
	$error="Le nom d'utilisateur ou le mot de passe est incorrect";
	$_SESSION["error"]=$error;
	header("Location:/CentreDEnergie/Pages/connexion.php");
}
else
{
	$_SESSION["error"]=null;
	$stmt->bind_result($username,$password,$beltLevel,$FName,$LName,$postedMessages,$postedComments,$dateRegistered);
	$stmt->fetch();
	echo "Username: ".$username."<br>Password: ".$password;
	
	$student = new Student($username,$password,$beltLevel,$FName,$LName,$postedMessages,$postedComments,$dateRegistered);
	
	$_SESSION["student"]=serialize($student);
	header("Location:/CentreDEnergie/Pages/profil.php");
}

//close connection to MSSQL
$stmt->close();
$conn->close();

//$stmt->bind_result();
/*if ($stmt->num_rows < 1) {
   echo "No data Found";
}
else{
   while ($cats = $stmt->fetch_array()) 
   {
        $username  = $cats['username'];
        $beltLevel = strtoupper(stripslashes($cats['beltLevel']));
        $name = stripslashes($cats['FName'])." ".stripslashes($cats['LName']);

        echo	"Username: ".$username."<br>".
				"Belt Level: ".ucfirst(strtolower($beltLevel))."<br>".
				"Name: ".$name."<br>".
				"----------------------------------------------------------------<br>";

   }
}*/





//$student = new Student($_POST["username"],$_POST["password"]);



?>