<?php
session_start();

$_SESSION["loginStatus"]=null;
$_SESSION["student"]=null;

header("Location:/CentreDEnergie/Pages/connexion.php");

?>