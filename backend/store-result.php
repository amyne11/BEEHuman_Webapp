<?php
if (isset($_POST)) {
    include "models/leaderboard.php";
    include "controllers/reactionLeaderboard.php";
    
    $encodedData = file_get_contents("php://input");
    $data = json_decode($encodedData, true);
    $leaderboard = new reactionLeaderboard($data['username'], $data['time']);
}
?>