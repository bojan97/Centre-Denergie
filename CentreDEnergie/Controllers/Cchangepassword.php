<?php

session_start();
include("dbConnect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

$username=$_POST["username"];
$username = strip_tags($username);
$username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);

$password=$_POST["password"];

$newPassword=$_POST["newPassword"];

$rnewPassword=$_POST["rnewPassword"];
//$_SESSION["errorPassword"]=false;

$_SESSION['errorNewusername']=false;
$_SESSION['errorPassword']=false;
$_SESSION['errorNewPassword']=false;
$_SESSION['errorCode']=false;
$_SESSION['success']=false;
if(strlen($newPassword)>50||strlen($newPassword)<8||!preg_match('#[0-9]#',$newPassword)||$newPassword==null||$newPassword!=$rnewPassword)//validate basic password entry
{
	$_SESSION["errorNewPassword"]=true;
	header("Location:/CentreDEnergie/Pages/profil.php");
	$conn->close();
}
else
{
$_SESSION["errorNewPassword"]=false;
$userType=$_SESSION["loginStatus"];

if($userType=='S')
{
	
	$checkPassword = $conn->prepare("SELECT * FROM student WHERE username=?");
	$checkPassword->bind_param("s", $username);
	$checkPassword->execute();
	$checkPassword->store_result();
	
	$checkPassword->bind_result($studentID,$username,$hashPassword,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
	$checkPassword->fetch();
	
	
	
	if($checkPassword->num_rows()>0&&password_verify($password,$hashPassword))
	{
		$_SESSION["errorPassword"]=false;
		
		$newPassword=password_hash($newPassword,PASSWORD_BCRYPT);
		
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
		$_SESSION['success']=true;
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
	$checkPassword = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=?");
	$checkPassword->bind_param("s", $username);
	$checkPassword->execute();
	$checkPassword->store_result();
	
	$checkPassword->bind_result($username,$hashPassword,$beltLevel,$FName,$LName);
	$checkPassword->fetch();
	
	if($checkPassword->num_rows()>0&&password_verify($password,$hashPassword))
	{
	
		$_SESSION["errorPassword"]=false;
		
		$newPassword=password_hash($newPassword,PASSWORD_BCRYPT);
		
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
		$_SESSION['success']=true;
		header("Location:/CentreDEnergie/Pages/profil.php");
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
$conn->close();


?>