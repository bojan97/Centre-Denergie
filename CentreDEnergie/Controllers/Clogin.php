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

if($stmt->num_rows<1)//incorrect username/password combination >>>FOR STUDENT LOGIN<<<
{
	$stmt2 = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=? AND pass=?");
	$stmt2->bind_param("ss", $username, $password);
	$stmt2->execute();
	$stmt2->store_result();
	
	if($stmt2->num_rows<1)//wrong username/password for student and teacher tables
	{
		$error="Le nom d'utilisateur ou le mot de passe est incorrect";
		$_SESSION["error"]=$error;
		header("Location:/CentreDEnergie/Pages/connexion.php");
	}
	else//TEACHER LOGIN
	{
		$_SESSION["error"]=null;
		$stmt2->bind_result($username,$password,$beltLevel,$FName,$LName);
		$stmt2->fetch();
		echo "Username: ".$username."<br>Password: ".$password;
	
		$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
	
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='T';//type of user
		header("Location:/CentreDEnergie/Pages/profil.php");
	}
}
else//STUDENT LOGIN
{
	$_SESSION["error"]=null;
	$stmt->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
	$stmt->fetch();
	
	$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
	
	$_SESSION["student"]=serialize($student);
	$_SESSION["loginStatus"]='S';//type of user
	header("Location:/CentreDEnergie/Pages/profil.php");
}

//close connection to MSSQL
$stmt->close();
$stmt2->close();
$conn->close();

?>