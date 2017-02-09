<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/Student.php");
include("headerLayout.php");
if(isset($_SESSION["loginStatus"]))
{
if($_SESSION["loginStatus"]!=null)//check if user is logged in
{
$student=unserialize($_SESSION["student"]);

$rank = $student->getRank();

$checkIndex = $conn->prepare("SELECT beltIndex FROM rank WHERE beltLevel=?");
$checkIndex->bind_param("s", $rank);
$checkIndex->execute();
$checkIndex->store_result();

$checkIndex->bind_result($beltIndex);
$checkIndex->fetch();
$checkIndex->close();

$getTechniques = $conn->prepare("SELECT * FROM rank WHERE beltIndex<=?");
$getTechniques->bind_param("i", $beltIndex);
$getTechniques->execute();
$getTechniques->store_result();

$getTechniques->bind_result($beltIndex,$beltLevel,$beltCode,$combinations,$kempo,$kicks,$punches,$blocks,$forms,$elbows,$knees);

$colors=array(	"<th class='tg-amwm'><font color='white'>Blanche</font></th>",
				"<th class='tg-amwm'><font color='#ddd840'>Jaune</font></th>",
				"<th class='tg-amwm'><font color='orange'>Orange</font></th>",
				"<th class='tg-amwm'><font color='#d365cf'>Violette</font></th>",
				"<th class='tg-amwm'><font color='#4286f4'>Bleue</font></th>",
				"<th class='tg-amwm'><font color='#5dd13a'>Verte</font></th>",
				"<th class='tg-amwm'><font color='#db7f3d'>Brune</font></th>",
				"<th class='tg-amwm'><font color='black'>Noire</font></th>");
				
$arrpunches=array(	"<td class='tg-baqh'>7</td>",
					"<td class='tg-baqh'>7</td>",
					"<td class='tg-baqh'>7</td>",
					"<td class='tg-baqh'>7</td>",
					"<td class='tg-baqh'>7</td>",
					"<td class='tg-baqh'>7</td>",
					"<td class='tg-baqh'>7</td>",
					"<td class='tg-baqh'>7</td>");
					
$arrkicks=array("<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>5</td>");

$arrblocks=array("<td class='tg-baqh'>8</td>",
				"<td class='tg-baqh'>8</td>",
				"<td class='tg-baqh'>8</td>",
				"<td class='tg-baqh'>3</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>3</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>");

$arrknees=array("<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>1</td>",
				"<td class='tg-baqh'>1</td>",
				"<td class='tg-baqh'>1</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>1</td>");

$arrelbows=array("<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>7</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>0</td>",);

$arrcombinations=array("<td class='tg-baqh'>3,6,7</td>",
					"<td class='tg-baqh'>12,18</td>",
					"<td class='tg-baqh'>2,3</td>",
					"<td class='tg-baqh'>8,9</td>",
					"<td class='tg-baqh'>10,15,16</td>",
					"<td class='tg-baqh'>11,13,14</td>",
					"<td class='tg-baqh'>1,21,19,26</td>",
					"<td class='tg-baqh'>22</td>");

$arrkempo=array("<td class='tg-baqh'>0</td>",
				"<td class='tg-baqh'>3</td>",
				"<td class='tg-baqh'>3</td>",
				"<td class='tg-baqh'>4</td>",
				"<td class='tg-baqh'>6</td>",
				"<td class='tg-baqh'>10</td>",
				"<td class='tg-baqh'>12</td>",
				"<td class='tg-baqh'>5</td>");

$arrforms=array("<td class='tg-baqh'>Pinan 1</td>",
				"<td class='tg-baqh'>Pinan 2</td>",
				"<td class='tg-baqh'>Kata 1</td>",
				"<td class='tg-baqh'>Kata 2</td>",
				"<td class='tg-baqh'>Pinan 3, Pinan 4, Forme de Bloques</td>",
				"<td class='tg-baqh'>Pinan 5, Forme de la Grue</td>",
				"<td class='tg-baqh'>Kata 3, Kata 4, Kata 5, Forme du Prunier, Two Man Fist Set A</td>",
				"<td class='tg-baqh'>Kata 6, Ansuki, Two Man Fist Set B</td>");

		
$index=0;
?>



<div class="row">
	<h2>Mes Techniques</h2>
</div>
<div class="col-md-12" id="table">
	<table class="tg">
		<tr>
			<th class="tg-amwm">Techniques</th>
			<?php
				while($getTechniques->fetch())
				{
					echo $colors[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
			<td class='tg-amwm'>Coups de Poing</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrpunches[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
			<td class='tg-amwm'>Coups de Pied</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrkicks[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
		<td class='tg-amwm'>Bloques</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrblocks[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
		<td class='tg-amwm'>Coups de Genou</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrknees[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
			<td class='tg-amwm'>Coups d&#39;Épaule</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrelbows[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
			<td class='tg-amwm'>Combinaisons</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrcombinations[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
			<td class='tg-amwm'>Kempos</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrkempo[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
		<tr>
			<td class='tg-amwm'>Formes</td>
			<?php
				while($getTechniques->fetch())
				{
					echo $arrforms[$index];
					$index++;
				}
				$getTechniques->data_seek(0);
				$index=0;
			?>
		</tr>
	
	</table>
	<?php  $getTechniques->close();?>
</div>


<?php echo"
<div class='col-md-4'></div>
<div class='col-md-4' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseWhite' aria-expanded='false' aria-controls='collapseExample' id='btn_white'>Blanche</button>
	<div class='collapse' id='collapseWhite'>
		<div class='well' id='well_white'>
			<p>Coups de Poing: 7</p>
			<p>Coups de Pied: 4</p>
			<p>Bloques: 8</p>
			<p>Combinaisons: 3,6,7</p>
			<p>Formes: Pinan 1</p>
		</div>
	</div>
</div>
<div class='col-md-4'></div>";

if($beltIndex>=2)
{
echo"
<div class='col-md-12' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseYellow' aria-expanded='false' aria-controls='collapseExample' id='btn_yellow'>Jaune</button>
	<div class='collapse' id='collapseYellow'>
		<div class='well' id='well_yellow'>
				<p>Coups de Poing: 7</p>
				<p>Coups de Pied: 4</p>
				<p>Bloques: 8</p>
				<p>Coups de Genou: 1</p>
				<p>Coups d'Épaule: 7</p>
				<p>Combinaisons: 12,18</p>
				<p>Kempos: 3</p>
				<p>Formes: Pinan 2</p>
		</div>
	</div>
</div>";
}
if($beltIndex>=3)
{
echo"
<div class='col-md-12' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseOrange' aria-expanded='false' aria-controls='collapseExample' id='btn_orange'>Orange</button>
	<div class='collapse' id='collapseOrange'>
		<div class='well' id='well_orange'>
				<p>Coups de Poing: 7</p>
				<p>Coups de Pied: 4</p>
				<p>Bloques: 8</p>
				<p>Coups de Genou: 1</p>
				<p>Coups d'Épaule: 7</p>
				<p>Combinaisons: 2,4</p>
				<p>Kempos: 3</p>
				<p>Formes: Kata 1</p>
		</div>
	</div>
</div>";
}
if($beltIndex>=4)
{
echo"
<div class='col-md-12' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapsePurple' aria-expanded='false' aria-controls='collapseExample' id='btn_purple'>Purple</button>
	<div class='collapse' id='collapsePurple'>
		<div class='well' id='well_purple'>
				<p>Coups de Poing: 7</p>
				<p>Coups de Pied: 4</p>
				<p>Bloques: 3</p>
				<p>Coups de Genou: 1</p>
				<p>Combinaisons: 8,9</p>
				<p>Kempos: 4</p>
				<p>Formes: Kata 2</p>
		</div>
	</div>
</div>";
}
if($beltIndex>=5)
{
echo"
<div class='col-md-12' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseBlue' aria-expanded='false' aria-controls='collapseExample' id='btn_blue'>Bleue</button>
	<div class='collapse' id='collapseBlue'>
		<div class='well' id='well_blue'>
				<p>Coups de Poing: 7</p>
				<p>Coups de Pied: 4</p>
				<p>Combinaisons: 10,15,16</p>
				<p>Kempos: 6</p>
				<p>Formes: Pinan 3, Pinan 4, Forme de Bloques</p>
		</div>
	</div>
</div>";
}
if($beltIndex>=6)
{
echo"
<div class='col-md-12' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseGreen' aria-expanded='false' aria-controls='collapseExample' id='btn_green' >Verte</button>
	<div class='collapse' id='collapseGreen'>
		<div class='well' id='well_green'>
				<p>Coups de Poing: 7</p>
				<p>Coups de Pied: 4</p>
				<p>Bloques: 3</p>
				<p>Combinaisons: 11,13,14</p>
				<p>Kempos: 10</p>
				<p>Formes: Pinan 5, Forme de la Grue</p>
		</div>
	</div>
</div>";
}
if($beltIndex>=7)
{
echo"
<div class='col-md-12' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseBrown' aria-expanded='false' aria-controls='collapseExample' id='btn_brown'>Brune</button>
	<div class='collapse' id='collapseBrown'>
		<div class='well' id='well_brown'>
				<p>Coups de Poing: 7</p>
				<p>Coups de Pied: 4</p>
				<p>Combinaisons: 1,19,21,26</p>
				<p>Kempos: 12</p>
				<p>Formes: Kata 3, Kata 4, Kata 5, Forme du Prunier, Two Man Fist Set A</p>
		</div>
	</div>
</div>";
}
if($beltIndex>=8)
{
echo"
<div class='col-md-12' id='btnRows'>
	<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseBlack' aria-expanded='false' aria-controls='collapseExample' id='btn_black'>Noire</button>
	<div class='collapse' id='collapseBlack'>
		<div class='well' id='well_black'>
				<p>Coups de Poing: 7</p>
				<p>Coups de Pied: 5</p>
				<p>Coups de Genou: 1</p>
				<p>Combinaisons: 22</p>
				<p>Kempos: 5</p>
				<p>Formes: Kata 6, Ansuki, Two Man Fist Set B</p>
		</div>
	</div>
</div>
";
}
}
else//if user is not logged in
{
	echo "<h2>Mes Techniques</h2>
		<p style='color:red;text-align:center'>Vous n'êtes pas connectés. Cliquez <a href='/CentreDEnergie/Pages/connexion.php'>ici </a>pour vous connecter.</p>";
}
}
else//if user is not logged in
{
	echo "<h2>Mes Techniques</h2>
		<p style='color:red;text-align:center'>Vous n'êtes pas connectés. Cliquez <a href='/CentreDEnergie/Pages/connexion.php'>ici </a>pour vous connecter.</p>";
}

include("footerLayout.php");
?>