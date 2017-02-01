<?php
include("headerLayout.php");
include_once($_SERVER['DOCUMENT_ROOT']."/CentreDEnergie/Controllers/dbConnect.php");

?>
	
<div class="row">
	<div class="col-md-12">
			<!-- Insert main-->
		<div id="main">
				
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active" >
					  <img class="slideshow-images"src="/CentreDEnergie/Content/img1.png" >
					</div>

					<div class="item">
					  <img class="slideshow-images"src="/CentreDEnergie/Content/img2.png">
					</div>

					<div class="item">
					  <img class="slideshow-images"src="/CentreDEnergie/Content/img3.png" >
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<?php
				
				$getPosts = $conn->prepare("SELECT * FROM posts ORDER BY postId DESC LIMIT 10");
				$getPosts->execute();
				$getPosts->store_result();

				$getPosts->bind_result($postId,$postTitle,$postImage,$postText,$postDate);
				
				while($getPosts->fetch())
				{
					echo "<br><div class='post'>
							<h2>".$postTitle."</h2>";
							if($postImage!=null) echo "<img src='/CentreDEnergie/PostImages/".$postImage."'>";
							echo "<p class='postContent'>".$postText."</p>
						</div>";
				}
				
				
				$getPosts->close();
				
			?>
			
		</div>
	</div>
</div>


<?php


include("footerLayout.php")


?>