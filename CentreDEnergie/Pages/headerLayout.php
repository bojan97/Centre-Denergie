<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content="width=device-width,initial-scale=1.0">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/CentreDEnergie/Content/CSSlayout.css">
	<link rel="icon" href="/CentreDEnergie/Content/favicon.ico" />
<?php
	session_start();
	include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");
	
	if(isset($_COOKIE["rememberStudent"])&&$_COOKIE["rememberStudent"]!="")
	{
		include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");
		
		$getPostInfo = $conn->prepare("SELECT * FROM student WHERE username = ?");
		$getPostInfo->bind_param("s", $_COOKIE["rememberStudent"]);
		$getPostInfo->execute();
		$getPostInfo->bind_result($studentId,$username,$password, $beltLevel, $FName, $LName, $postedMessages, $dateRegistered);
		$getPostInfo->fetch();
		$getPostInfo->close();
		$student = new Student($studentId, $username,$password,$beltLevel,$FName,$LName);
		$student->setPostedMessages($postedMessages);
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='S';//type of user
	}
	
	if(isset($_COOKIE["rememberTeacher"])&&$_COOKIE["rememberTeacher"]!="")
	{
		include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");
		
		$getPostInfo = $conn->prepare("SELECT * FROM teacher WHERE teacherUsername = ?");
		$getPostInfo->bind_param("s", $_COOKIE["rememberTeacher"]);
		$getPostInfo->execute();
		$getPostInfo->bind_result($username,$hashPassword,$beltLevel,$FName,$LName);
		$getPostInfo->fetch();
		$getPostInfo->close();
		
		$student = new Student(0, $username,$hashPassword,$beltLevel,$FName,$LName);
		$_SESSION["student"]=serialize($student);
		$_SESSION["loginStatus"]='T';//type of user
	}
	
	
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
	else if(strpos($url,'article') !== false)
	{
		echo "<title>Nouveau Article</title>";
		echo "<link rel='stylesheet' href='/CentreDEnergie/Content/CSSarticle.css'>";
		$currentPage="article";
	}
	
	/*if (strcmp($currentPage,"connexion")!=0){
		$_SESSION['error']=null;
	}*/
	
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
		var fixedWidth=120;
		while($("#header_dropbtn").width()>fixedWidth){
			var divider = $("#header_dropbtn").width()/fixedWidth;
			var size = parseInt($("#header_dropbtn").css('font-size'));
			var newSize=size/divider+"px";
			$("#header_dropbtn").css('font-size', newSize);
			alert("123");
		}
	});
	
	
	
	
	</script>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7 col-md-offset-3" id="banner">
	
		</div>
		<div class="col-md-1" id="login-links">
			<?php
				if(isset($_SESSION["loginStatus"]))//when a user is looged in
				{
					$student=unserialize($_SESSION["student"]);
					$username = $student->getUsername();
					echo "<div class='dropdown' id='header_dropdown'>
							  <button class='dropbtn' id='header_dropbtn'>$username</button>
							  <div class='dropdown-content' id='header_dropdown-content'>";
								if ($_SESSION["loginStatus"]=="T")echo"<a href='/CentreDEnergie/Pages/article.php'>Nouveau Article</a>";
							echo"<a href='/CentreDEnergie/Pages/techniques.php'>Mes Techniques</a>
								<a href='#'>Rapports</a>
								<a href='/CentreDEnergie/Pages/profil.php'>Mon Profil</a>								
								<a href='/CentreDEnergie/Controllers/Clogout.php'>Déconnexion</a>
							  </div>
							</div>";
				}
				else //if user is not logged in
				{
					echo "<a href='/CentreDEnergie/Pages/enregistrer.php'>Enregistrer</a>&nbsp;&nbsp;<div id='brbr'><br></div><a href='/CentreDEnergie/Pages/connexion.php'>Connexion</a>";
				}
			?>
			 
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
	
	
	
	
	
	
	
	
	
	
	
	