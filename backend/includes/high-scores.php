<?php
include "backend/db.php";
include "backend/models/leaderboards.php";
$leaderboards = new Leaderboards();
$reactionScore = $leaderboards->selectResult("reaction", $_SESSION['username']);
$typingScore = $leaderboards->selectResult("typing", $_SESSION['username']);
$barioScore = $leaderboards->selectResult("bario", $_SESSION['username']);

$_SESSION['reactionHighScore'] = $reactionScore["reactionScore"];
$_SESSION['typingHighScore'] = $typingScore["typingScore"];
$_SESSION['barioHighScore'] = $barioScore["barioScore"];
?>