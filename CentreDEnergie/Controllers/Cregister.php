<?php
session_start();
include("dbConnect.php");

$username=$_POST["username"];
$password=$_POST["password"];
$rpassword=$_POST["rpassword"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];

if(!isset($_SESSION["username"])) $_SESSION["username"]=$username; else $_SESSION["username"]=$username;
if(!isset($_SESSION["fname"])) $_SESSION["fname"]=$fname; else $_SESSION["fname"]=$fname;;
if(!isset($_SESSION["lname"])) $_SESSION["lname"]=$lname; else $_SESSION["lname"]=$lname;;


	$stmt3 = $conn->prepare("SELECT * FROM student WHERE username=?");
	$stmt3->bind_param("s", $username);
	$stmt3->execute();
	$stmt3->store_result();
	
	$stmt3->fetch();



if(strlen($username)>15||$username==null||$stmt3->num_rows>0)//validate basic username entry and if username is taken
{
	$_SESSION["errorUsername"]=true;
	$_SESSION["errorPassword"]=false;
	$_SESSION["errorRpassword"]=false;
	$_SESSION["errorName"]=false;
	$stmt3->close();
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else if(strlen($password)>50||strlen($password)<7||!preg_match('#[0-9]#',$password)||$password==null)//validate basic password entry
{
	$_SESSION["errorUsername"]=false;
	$_SESSION["errorPassword"]=true;
	$_SESSION["errorRpassword"]=false;
	$_SESSION["errorName"]=false;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else if(strcmp($password,$rpassword)!=0||$rpassword==null)//check if password fields match
{
	$_SESSION["errorUsername"]=false;
	$_SESSION["errorPassword"]=false;
	$_SESSION["errorRpassword"]=true;
	$_SESSION["errorName"]=false;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else if($fname==null||strlen($fname)>50||$lname==null||strlen($lname)>50)//first name and last name validation
{
	$_SESSION["errorUsername"]=false;
	$_SESSION["errorPassword"]=false;
	$_SESSION["errorRpassword"]=false;
	$_SESSION["errorName"]=true;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else
{
	include("Student.php");
	

	$username=$_POST["username"];
	$password=$_POST["password"];
	$stmt = $conn->prepare("INSERT INTO student (studentID, username, pass, FName, LName, postedMessages, dateRegistered) VALUES(NULL, ?, ?, ?, ?, 0, '".date("Y-m-d")."')");
	$stmt->bind_param("ssss", $username, $password, $fname, $lname);
	$stmt->execute();
	
	
	
	$stmt2 = $conn->prepare("SELECT * FROM student WHERE username=? AND pass=?");
	$stmt2->bind_param("ss", $username, $password);
	$stmt2->execute();
	$stmt2->store_result();
	
	$stmt2->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
	$stmt2->fetch();
	
	$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
	
	$_SESSION["student"]=serialize($student);
	$_SESSION["loginStatus"]='S';//type of user
	header("Location:/CentreDEnergie/Pages/profil.php");
	
	
	$stmt->close();
	$stmt2->close();
	$conn->close();
}

?>