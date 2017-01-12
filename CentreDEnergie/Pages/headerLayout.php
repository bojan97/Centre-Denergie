<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content="width=device-width,initial-scale=1.0">
	<title>Centre d'Énergie de Chambly'</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/CentreDEnergie/Content/layoutCSS.css">
	<link rel="icon" href="/CentreDEnergie/Content/favicon.ico" />
<?php
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$currentPage="index";
	if (strpos($url,'index') !== false||strcmp($_SERVER['REQUEST_URI'],'/CentreDEnergie/Pages/')==0) 
	{
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/indexCSS.css'>";
		$currentPage="index";
	} 
	else if(strpos($url,'styles') !== false)
	{
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/stylesCSS.css'>";
		$currentPage="styles";
	}
	else if(strpos($url,'cours') !== false)
	{
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/coursCSS.css'>";
		$currentPage="cours";
	}
	else if(strpos($url,'salle') !== false)
	{
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/salleCSS.css'>";
		$currentPage="salle";
	}
	else if(strpos($url,'contact') !== false)
	{
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/contactCSS.css'>";
		$currentPage="contact";
	}
	
	
	
	
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-7" id="banner">
	
		</div>
		<div class="col-md-2" id="login-links">
			 <a>Enregistrer</a>&nbsp;&nbsp;<a>Connexion</a>
		</div>
	</div>
	<div class="row">
		<nav class="col-md-12" >
			<ul class="nav nav-pills">
				<li <?php if(strcmp($currentPage,"index")==0){echo " class='active'";}?>>
					<a href="/CentreDEnergie/Pages/index.php">Acceuil</a>
				</li>
				<li <?php if(strcmp($currentPage,"styles")==0){echo " class='active'";}?>>
					<a href="/CentreDEnergie/Pages/styles.php">Styles de Combat</a>
				</li>
				<li <?php if(strcmp($currentPage,"cours")==0){echo " class='active'";}?>>
					<a href="/CentreDEnergie/Pages/cours.php">Le Cours</a>
				</li>
				<li <?php if(strcmp($currentPage,"salle")==0){echo " class='active'";}?>>
					<a href="/CentreDEnergie/Pages/salle.php">Salle de Discussion</a>
				</li>
				<li <?php if(strcmp($currentPage,"contact")==0){echo " class='active'";}?>>
					<a href="/CentreDEnergie/Pages/contact.php">Contactez-Nous</a>
				</li>
			</ul>
		</nav>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	