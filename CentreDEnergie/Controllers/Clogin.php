<?php
session_start();
include("Student.php");
include("dbConnect.php");

$username=$_POST["username"];
$password=$_POST["password"];
$stmt = $conn->prepare("SELECT * FROM student WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows<1)//incorrect username/password combination >>>FOR STUDENT LOGIN<<<
{
	$stmt2 = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername=?");
	$stmt2->bind_param("s", $username);
	$stmt2->execute();
	$stmt2->store_result();
	
	if($stmt2->num_rows<1)//wrong username/password for student and teacher tables
	{
		$error="Le nom d'utilisateur ou le mot de passe est incorrect";
		$_SESSION["error"]=$error;
		header("Location:/CentreDEnergie/Pages/connexion.php");
		$stmt2->close();
	}
	else
	{
		$_SESSION["error"]=null;
		$stmt2->bind_result($username,$hashPassword,$beltLevel,$FName,$LName);
		$stmt2->fetch();
		if(password_verify($password,$hashPassword))//TEACHER LOGIN
		{
			if(isset($_POST["remember"])&&$_POST["remember"]=="remember")
			{
				setcookie("rememberTeacher", $username, time() + (10 * 365 * 24 * 60 * 60), "/");
			}
			
			
			$student = new Student(0, $username,$hashPassword,$beltLevel,$FName,$LName);
		
			$_SESSION["student"]=serialize($student);
			$_SESSION["loginStatus"]='T';//type of user
			header("Location:/CentreDEnergie/Pages/techniques.php");
			$stmt2->close();
		}
		else//WRONG PASSWORD
		{
			echo $password;
			$error="Le nom d'utilisateur ou le mot de passe est incorrect";
			$_SESSION["error"]=$error;
			header("Location:/CentreDEnergie/Pages/connexion.php");
			$stmt2->close();
		}
		
	}
}
else
{
	
	$_SESSION["error"]=null;
	
	$stmt->bind_result($studentID,$username,$hashPassword,$beltLevel,$FName,$LName,$postedMessages,$dateRegistered);
	$stmt->fetch();
	if(password_verify($password,$hashPassword))//STUDENT LOGIN
	{
		if(isset($_POST["remember"])&&$_POST["remember"]=="remember")
		{
			setcookie("rememberStudent", $username, time() + (10 * 365 * 24 * 60 * 60), "/");
		}
		
		
		$student = new Student($studentID, $username,$hashPassword,$beltLevel,$FName,$LName);
		$student->setPostedMessages($postedMessages);
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='S';//type of user
		header("Location:/CentreDEnergie/Pages/techniques.php");
	}
	else//WRONG PASSWORD
	{
		$error="Le nom d'utilisateur ou le mot de passe est incorrect";
		$_SESSION["error"]=$error;
		header("Location:/CentreDEnergie/Pages/connexion.php");
	}
	
	
}

//close connection to MSSQL
$stmt->close();

$conn->close();

?>