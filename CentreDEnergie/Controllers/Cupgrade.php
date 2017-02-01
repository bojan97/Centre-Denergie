<?php

session_start();
include("dbConnect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");

$username=$_POST["username"];
$code=$_POST["code"];
if($code==null)//validate basic code entry
{
	$_SESSION["errorCode"]=true;
	
	header("Location:/CentreDEnergie/Pages/profil.php#changeRank");
}
else
{
	$userType=$_SESSION["loginStatus"];

	$checkCode = $conn->prepare("SELECT * FROM rank WHERE beltCode=?");
	$checkCode->bind_param("s", $code);
	$checkCode->execute();
	$checkCode->store_result();

	$checkCode->bind_result($beltIndex,$beltLevel,$beltCode,$combinations,$kempo,$kicks,$punches,$blocks,$forms,$elbows,$knees);
	$checkCode->fetch();
	
	if($checkCode->num_rows<1)//check if code entered exists in rank table
	{
		$_SESSION["errorCode"]=true;
		header("Location:/CentreDEnergie/Pages/profil.php#changeRank");
	}
	else//code exists
	{
		$_SESSION["errorCode"]=false;
		if($userType=='S')
		{
			$updateStudentTable = $conn->prepare("UPDATE student SET beltLevel = ? WHERE username=?");
			$updateStudentTable->bind_param("ss", $beltLevel, $username);
			$updateStudentTable->execute();
			
			$getNewData = $conn->prepare("SELECT * FROM student WHERE username=?");
			$getNewData->bind_param("s", $username);
			$getNewData->execute();
			$getNewData->store_result();
		
			$getNewData->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
			$getNewData->fetch();
		
			$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
		
			$_SESSION["student"]=serialize($student);
			
			header("Location:/CentreDEnergie/Pages/profil.php#changeRank");
			
			$updateStudentTable->close();
			$getNewData->close();
		}

		if($userType=='T')
		{
			$updateTeacherTable = $conn->prepare("UPDATE teacher SET beltLevel = ? WHERE teacherUsername=?");
			$updateTeacherTable->bind_param("ss", $beltLevel, $username);
			$updateTeacherTable->execute();
			
			$getNewData = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=?");
			$getNewData->bind_param("s", $username);
			$getNewData->execute();
			$getNewData->store_result();
		
			$getNewData->bind_result($studentID,$username,$password,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
			$getNewData->fetch();
		
			$student = new Student($studentID, $username,$password,$beltLevel,$FName,$LName);
		
			$_SESSION["student"]=serialize($student);
			
			header("Location:/CentreDEnergie/Pages/profil.php#changeRank");
			
			$updateTeacherTable->close();
			$getNewData->close();
		}
	}


}
?>