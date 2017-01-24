<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content="width=device-width,initial-scale=1.0">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/CentreDEnergie/Content/CSSlayout.css">
	<link rel="icon" href="/CentreDEnergie/Content/favicon.ico" />
<?php
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$currentPage="index";
	if (strpos($url,'index') !== false||strcmp($_SERVER['REQUEST_URI'],'/CentreDEnergie/Pages/')==0) 
	{
		echo "<title>Centre d'Énergie Michel Sylvain</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSSindex.css'>";
		$currentPage="index";
	} 
	else if(strpos($url,'styles') !== false)
	{
		echo "<title>Styles de Combat</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSSstyles.css'>";
		$currentPage="styles";
	}
	else if(strpos($url,'cours') !== false)
	{
		echo "<title>Le Cours</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSScours.css'>";
		$currentPage="cours";
	}
	else if(strpos($url,'salle') !== false)
	{
		echo "<title>Salle de Discussion</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSSsalle.css'>";
		$currentPage="salle";
	}
	else if(strpos($url,'contact') !== false)
	{
		echo "<title>Contactez-nous</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSScontact.css'>";
		$currentPage="contact";
	}
	else if(strpos($url,'enregistrer') !== false)
	{
		echo "<title>Enregistrement</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSSenregistrer.css'>";
		$currentPage="enregistrer";
	}
	else if(strpos($url,'connexion') !== false)
	{
		echo "<title>Connexion</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSSconnexion.css'>";
		$currentPage="connexion";
	}
	else if(strpos($url,'profil') !== false)
	{
		echo "<title>Mon Profil</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSSprofil.css'>";
		$currentPage="profil";
	}
	else if(strpos($url,'techniques') !== false)
	{
		echo "<title>Techniques</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSStechniques.css'>";
		$currentPage="techniques";
	}
	
	
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7" id="banner">
	
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-2" id="login-links">
			 <a href="/CentreDEnergie/Pages/enregistrer.php">Enregistrer</a>&nbsp;&nbsp;<div id="brbr"><br></div><a href="/CentreDEnergie/Pages/connexion.php">Connexion</a>
		</div>
		<div class="col-md-1" id="title">
			<h1>Le Centre d'Energie de Chambly</h1>
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
	
	
	
	
	
	
	
	
	
	
	
	