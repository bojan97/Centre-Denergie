<?php

session_start();
include("dbConnect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

	$username=$_POST["username"];
	$username = strip_tags($username);
	$username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
	
	$newusername=$_POST["newusername"];
	$newusername = strip_tags($newusername);
	$newusername = filter_var($newusername, FILTER_SANITIZE_SPECIAL_CHARS);
	

	$checkStudentTable = $conn->prepare("SELECT * FROM student WHERE username=?");
	$checkStudentTable->bind_param("s", $newusername);
	$checkStudentTable->execute();
	$checkStudentTable->store_result();
	
	$checkStudentTable->fetch();
	
	$checkTeacherTable = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=?");
	$checkTeacherTable->bind_param("s", $newusername);
	$checkTeacherTable->execute();
	$checkTeacherTable->store_result();
	
	$checkTeacherTable->fetch();
	
	
$_SESSION['errorNewusername']=false;
$_SESSION['errorPassword']=false;
$_SESSION['errorNewPassword']=false;
$_SESSION['errorCode']=false;

	


if(strlen($username)>15||$username==null||$checkStudentTable->num_rows>0||$checkTeacherTable->num_rows>0)//validate basic username entry and if username is taken
{
	$_SESSION["errorNewusername"]=true;
	$checkStudentTable->close();
	$checkTeacherTable->close();
	header("Location:/CentreDEnergie/Pages/profil.php");
}
else
{
	$_SESSION["errorNewusername"]=false;
	$checkStudentTable->close();
	$checkTeacherTable->close();
	
	$userType='';
	
	$checkStudent = $conn->prepare("SELECT * FROM student WHERE username=?");
	$checkStudent->bind_param("s", $username);
	if($checkStudent->execute())
	{
		$checkStudent->store_result();
	
		$checkStudent->fetch();
		if($checkStudent->num_rows()>0)$userType='S';
	}
	$checkStudent->close();
	
	$checkTeacher = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=?");
	$checkTeacher->bind_param("s", $username);
	if($checkTeacher->execute())
	{
		
		$checkTeacher->store_result();
	
		$checkTeacher->fetch();
		if($checkTeacher->num_rows()>0)$userType='T';
	}
	$checkTeacher->close();
	
	if($userType=='S')
	{
		$updateStudentTable = $conn->prepare("UPDATE student SET username = ? WHERE username=?");
		$updateStudentTable->bind_param("ss", $newusername, $username);
		$updateStudentTable->execute();
		$updateStudentTable->close();
		
		$getNewData = $conn->prepare("SELECT * FROM student WHERE username=?");
		$getNewData->bind_param("s", $newusername);
		$getNewData->execute();
		$getNewData->store_result();
	
		$getNewData->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
		$getNewData->fetch();
		$getNewData->close();
		$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
	
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='S';//type of user
		setcookie("rememberStudent", $student->getUsername(), time() + (10 * 365 * 24 * 60 * 60), "/");
		header("Location:/CentreDEnergie/Pages/profil.php");
		
	}
	if($userType=='T')
	{
		$updateTeacherTable = $conn->prepare("UPDATE teacher SET teacherUsername = ? WHERE teacherUsername=?");
		$updateTeacherTable->bind_param("ss", $newusername, $username);
		$updateTeacherTable->execute();
		$updateTeacherTable->close();
		
		$getNewData = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=?");
		$getNewData->bind_param("s", $newusername);
		$getNewData->execute();
		$getNewData->store_result();
	
		$getNewData->bind_result($username,$password,$beltLevel,$FName,$LName);
		$getNewData->fetch();
		$getNewData->close();
	
		$student = new Student(0, $username,$password,$beltLevel,$FName,$LName);
	
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='T';//type of user
		setcookie("rememberTeacher", $student->getUsername(), time() + (10 * 365 * 24 * 60 * 60), "/");
		header("Location:/CentreDEnergie/Pages/profil.php");

	}
	
	
	
	
}
$conn->close();
?>