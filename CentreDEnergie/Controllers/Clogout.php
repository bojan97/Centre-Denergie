<?php
session_start();

$_SESSION["loginStatus"]=null;
$_SESSION["student"]=null;

if(isset($_SESSION["errorUsername"]))	$_SESSION["errorUsername"]=null;
if (isset($_SESSION["errorPassword"]))	$_SESSION["errorPassword"]=null;
if (isset($_SESSION["errorRpassword"]))	$_SESSION["errorRpassword"]=null;

if(isset($_SESSION["username"]))	$_SESSION["username"]=null;
if(isset($_SESSION["fname"]))	$_SESSION["fname"]=null;
if(isset($_SESSION["lname"]))	$_SESSION["lname"]=null;

if(isset($_SESSION["errorName"]))	$_SESSION["errorName"]=null;
if(isset($_SESSION["error"]))	$_SESSION["error"]=null;


setcookie("rememberStudent", "", time() - 3600, "/");
setcookie("rememberTeacher", "", time() - 3600, "/");
header("Location:/CentreDEnergie/Pages/connexion.php");

?>