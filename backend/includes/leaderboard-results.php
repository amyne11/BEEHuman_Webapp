<?php


include "backend/db.php";
include "backend/models/leaderboards.php";
$leaderboards = new Leaderboards();
$leaderboardResults = $leaderboards->selectResults();

$typingScores = $leaderboardResults[0];
$barioScores = $leaderboardResults[1];
$reactionTimes = $leaderboardResults[2];




?>