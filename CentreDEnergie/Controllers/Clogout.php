<?php
session_start();

$_SESSION["loginStatus"]=null;
$_SESSION["student"]=null;
setcookie("rememberStudent", "", time() - 3600, "/");
setcookie("rememberTeacher", "", time() - 3600, "/");
header("Location:/CentreDEnergie/Pages/connexion.php");

?>