<?php

session_start();
include("dbConnect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

$username=$_POST["username"];
$password=$_POST["password"];
$newPassword=$_POST["newPassword"];
$rnewPassword=$_POST["rnewPassword"];
//$_SESSION["errorPassword"]=false;

$_SESSION['errorNewusername']=false;
$_SESSION['errorPassword']=false;
$_SESSION['errorNewPassword']=false;
$_SESSION['errorCode']=false;

if(strlen($password)>50||strlen($password)<7||!preg_match('#[0-9]#',$password)||$password==null||$newPassword!=$rnewPassword)//validate basic password entry
{
	$_SESSION["errorNewPassword"]=true;
	
	header("Location:/CentreDEnergie/Pages/profil.php");
}
else
{
$_SESSION["errorNewPassword"]=false;
$userType=$_SESSION["loginStatus"];

if($userType=='S')
{
	
	$checkPassword = $conn->prepare("SELECT * FROM student WHERE username=? and pass=?");
	$checkPassword->bind_param("ss", $username,$password);
	$checkPassword->execute();
	$checkPassword->store_result();
	
	$checkPassword->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
	$checkPassword->fetch();
	
	if($checkPassword->num_rows()>0)
	{
		$_SESSION["errorPassword"]=false;
		
		$updateStudentTable = $conn->prepare("UPDATE student SET pass = ? WHERE username=?");
		$updateStudentTable->bind_param("ss", $newPassword, $username);
		$updateStudentTable->execute();
		
		$getNewData = $conn->prepare("SELECT * FROM student WHERE username=?");
		$getNewData->bind_param("s", $username);
		$getNewData->execute();
		$getNewData->store_result();
	
		$getNewData->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
		$getNewData->fetch();
	
		$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
	
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='S';//type of user
		
		header("Location:/CentreDEnergie/Pages/profil.php");
		
		$getNewData->close();
		$updateStudentTable->close();
	}
	else
	{
		$_SESSION["errorPassword"]=true;
		header("Location:/CentreDEnergie/Pages/profil.php");
	}
	
	$checkPassword->close();
}

if($userType=='T')
{
	$checkPassword = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=? and pass=?");
	$checkPassword->bind_param("ss", $username,$password);
	$checkPassword->execute();
	$checkPassword->store_result();
	
	$checkPassword->bind_result($username,$password,$beltLevel,$FName,$LName);
	$checkPassword->fetch();
	
	if($checkPassword->num_rows()>0)
	{
	
		$_SESSION["errorPassword"]=false;
		
		$updateTeacherTable = $conn->prepare("UPDATE teacher SET pass = ? WHERE teacherUsername=?");
		$updateTeacherTable->bind_param("ss", $newPassword, $username);
		$updateTeacherTable->execute();
		
		$getNewData = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=?");
		$getNewData->bind_param("s", $username);
		$getNewData->execute();
		$getNewData->store_result();
	
		$getNewData->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
		$getNewData->fetch();
	
		$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
	
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='T';//type of user
		
		header("Location:/CentreDEnergie/Pages/profil.php");
		echo "good";
		$getNewData->close();
		$updateTeacherTable->close();
	}
	else
	{
		//echo "wrong password";
		$_SESSION["errorPassword"]=true;
		header("Location:/CentreDEnergie/Pages/profil.php");
	}
	$checkPassword->close();
}
}



?>