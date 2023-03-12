<?php
if (isset($_POST)) {
    include "models/leaderboards.php";
    include "controllers/reactionLeaderboard.php";
    
    $encodedData = file_get_contents("php://input");
    $data = json_decode($encodedData, true);
    $leaderboard = new reactionLeaderboard();
    $leaderboard->store($data['username'], $data['time']);
    echo "hello";
    // TODO Display high score on php page so it can be compared client side before storing new result
}
?>