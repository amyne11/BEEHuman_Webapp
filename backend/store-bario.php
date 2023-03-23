<?php
if (isset($_POST)) {
    session_start();
    include "db.php";
    include "models/leaderboards.php";
    include "controllers/barioLeaderboard.php";
    
    $encodedData = file_get_contents("php://input");
    $data = json_decode($encodedData, true);

    if ($_SESSION['barioHighScore'] == "N/A") {
        $leaderboard = new BarioLeaderboard();
        $leaderboard->store($data['username'], $data['score']);
    } elseif ($data['score'] > $_SESSION['barioHighScore']) {
        $leaderboard = new BarioLeaderboard();
        $leaderboard->update($data['username'], $data['score']);
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