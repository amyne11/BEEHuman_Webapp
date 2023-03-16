

<!DOCTYPE html>
<html lang="en" >
<head>
	<?php
    include "backend/includes/auth-user.php";
    include "backend/includes/high-scores.php";
    ?>
  <meta charset="UTF-8">

  <link rel="icon" href="images/favicon.png">
  

  <title>Bee Human | Select Your Game</title>
  <link rel="stylesheet" href="./css/gamePage.css">

</head>

<body>
	<!-- <a class="logo-image" href="index.html"><img src="C:\Users\ignat\GitRepos\first_group_project\images\logoproj.png" alt="alternative"></a> -->


		<nav class="navbar">
			<ul>
				<li><a href="index.php" class="homepage">Home</a></li>
				<li class="games">Games</li>

				<li>
					<?php
						echo($_SESSION["username"]);
					?>
				</li>
			</ul>
		</nav>
		<!-- <a href="gamepage\dist\index.html" class="Game">Games</a> -->

<div class="section-fluid-main">
		<div class="section-row">	
			<div class="section-col">
				<div class="section">
					<a href="typingTest.php" class="section-in">
						<img src="https://store-images.s-microsoft.com/image/apps.44553.0ed9f8e3-bf83-4e26-a8bb-f81e6dc3333b.f760a752-bdfb-4e26-ac51-d24f789d25fa.8487445c-a91c-43ff-a258-90757bd94ae6" alt="">
						<p class="highscore">Highest WPM: <?php echo($_SESSION['typingHighScore']); ?> </p>
					</a>
				</div>
			</div>
			<div class="hover-text">
				<h2>Typing Test</h2>
			</div>
			<div class="section-col">
				<div class="section">
					<a href="reactionTest.php" class="section-in">
						<img src="images/reaction.jpg" alt="">
						<p class="highscore">Quickest time: <?php echo($_SESSION['reactionHighScore']); ?> seconds</p>
					</a>
				</div>
			</div>
			<div class="hover-text">
				<h2>Reaction Test</h2>
			</div>
			<div class="section-col">
				<div class="section">
					<div class="section-in">
						<img src="images/mario.jpg" alt="">
						<p class="highscore">High Score: <?php echo($_SESSION['barioHighScore']); ?></p>
					</div>
				</div>
			</div>
			<div class="hover-text">
				<h2>Bario</h2>
			</div>
			<div class="section-col">
				<div class="section">
					<div class="section-in">
						<img src="https://th.bing.com/th/id/R.66103c33715c38f9bb3095e2bfce83fd?rik=TansqnJdUlwgTw&riu=http%3a%2f%2fclipart-library.com%2fimages_k%2fcoming-soon-transparent%2fcoming-soon-transparent-3.png&ehk=CY8mVpInibEmI7HsmCkbWnw4r5SPOSDHT1uAipk2eCI%3d&risl=&pid=ImgRaw&r=0" alt="">
					</div>
				</div>
			</div>
			<div class="hover-text">
				<h2>Coming Soon!</h2>
			</div>
			
	</div>
<!-- partial -->
  <script  src="./js/gamePage.js"></script>

</body>

</html>