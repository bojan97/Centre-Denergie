<?php
session_start();
include("dbConnect.php");
require_once "recaptchalib.php";
if(isset($_POST["username"]))
{
$username=$_POST["username"];
$username = strip_tags($username);
$username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);

$password=$_POST["password"];

$rpassword=$_POST["rpassword"];

$fname=$_POST["fname"];
$fname = strip_tags($fname);
$fname = filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS);

$lname=$_POST["lname"];
$lname = strip_tags($lname);
$lname = filter_var($lname, FILTER_SANITIZE_SPECIAL_CHARS);	
	
if(!isset($_SESSION["username"])) $_SESSION["username"]=$username; else $_SESSION["username"]=$username;
if(!isset($_SESSION["fname"])) $_SESSION["fname"]=$fname; else $_SESSION["fname"]=$fname;
if(!isset($_SESSION["lname"])) $_SESSION["lname"]=$lname; else $_SESSION["lname"]=$lname;
	
	

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
	$_SESSION["captchaError"]=false;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else if(strlen($password)>50||strlen($password)<8||!preg_match('#[0-9]#',$password)||$password==null)//validate basic password entry
{
	$_SESSION["errorUsername"]=false;
	$_SESSION["errorPassword"]=true;
	$_SESSION["errorRpassword"]=false;
	$_SESSION["errorName"]=false;
	$_SESSION["captchaError"]=false;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else if(strcmp($password,$rpassword)!=0||$rpassword==null)//check if password fields match
{
	$_SESSION["errorUsername"]=false;
	$_SESSION["errorPassword"]=false;
	$_SESSION["errorRpassword"]=true;
	$_SESSION["errorName"]=false;
	$_SESSION["captchaError"]=false;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else if($fname==null||strlen($fname)>50||$lname==null||strlen($lname)>50)//first name and last name validation
{
	$_SESSION["errorUsername"]=false;
	$_SESSION["errorPassword"]=false;
	$_SESSION["errorRpassword"]=false;
	$_SESSION["errorName"]=true;
	$_SESSION["captchaError"]=false;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else
{
	$_SESSION["errorUsername"]=false;
	$_SESSION["errorPassword"]=false;
	$_SESSION["errorRpassword"]=false;
	$_SESSION["errorName"]=false;
	$_SESSION["captchaError"]=false;
	
	
include("Student.php");
$captchaResponse = $_POST["g-recaptcha-response"];

if($captchaResponse=="")
{
	$_SESSION["captchaError"]=true;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
else
{
	$_SESSION["captchaError"]=false;
$secret = "6LdN_xQUAAAAAHCg5pwwFQVHj-xaDl72Fvujk5zj";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success)
{ 
	$username=$_POST["username"];
	$password=$_POST["password"];
	$password = password_hash($password,PASSWORD_BCRYPT);
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
	$student->setDateCreated($dateRegistered);
	$_SESSION["student"]=serialize($student);
	$_SESSION["loginStatus"]='S';//type of user
	header("Location:/CentreDEnergie/Pages/profil.php");
	
	
	$stmt->close();
	$stmt2->close();
	$conn->close();
	
	
	
	$_SESSION["username"]="";
	$_SESSION["fname"]="";
	$_SESSION["lname"]="";
}
else
{
	$_SESSION["captchaError"]=true;
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
}
}


$stmt3->close();

}
else
{
	header("Location:/CentreDEnergie/Pages/enregistrer.php");
}
$conn->close();
?>