
<!DOCTYPE html>
<html>
<head>
    <?php
    include "backend/includes/auth-user.php";
    ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reaction Test</title>
	<link rel="stylesheet" type="text/css" href="css/reactionTest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Nova Flat' rel='stylesheet'>
    <style>
        body {
            font-family: 'Nova Flat';font-size: 22px;
        }
    </style>
    <!-- <link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'>
    <style>
        body {
            font-family: 'Gruppo';font-size: 22px;
        }
    </style> -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/reactionTest.js"></script>
</head>
<body>
	<div id="titleDiv">
        <h1>Reaction Test!</h1><br>
        <!-- <h3>Tap when all lights go green</h3><br> -->
        <div id="lab1" class="lights"></div>
        <div id="lab2" class="lights"></div>
        <div id="lab3" class="lights"></div>
        <div id="lab4" class="lights"></div>
        <div id="lab5" class="lights"></div>
    </div>
    <div id="playDiv">
        <button id="clickButton" onclick=stopGame()></button>
    </div>
    <div id="timerDiv">
        <h1 id="timer">00.00</h1>
        <button class="btn" onclick=resetGame() id="resetButton"><i class="fa fa-refresh"></i></button>
        <button class="btn" onclick=startGame() id="startButton"><i class="fa fa-play"></i></button>
        <!-- <button onclick=startGame() id="startButton"><i class="fa fa-cloud">Start</i></button> -->
    </div>
</body>
</html>