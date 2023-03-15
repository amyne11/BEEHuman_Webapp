<?php
if (isset($_POST)) {
    session_start();
    include "db.php";
    include "models/leaderboards.php";
    include "controllers/reactionLeaderboard.php";
    
    $encodedData = file_get_contents("php://input");
    $data = json_decode($encodedData, true);

    if ($_SESSION['reactionHighScore'] == "N/A") {
        $leaderboard = new reactionLeaderboard();
        $leaderboard->store($data['username'], $data['time']);
    } elseif ($data['time'] < $_SESSION['reactionHighScore']) {
        $leaderboard = new reactionLeaderboard();
        $leaderboard->update($data['username'], $data['time']);
    } else {
        die(json_encode([
            'newHighScore' => false,
        ]));
    }
    die(json_encode([
        'newHighScore' => true,
    ]));
}
?>