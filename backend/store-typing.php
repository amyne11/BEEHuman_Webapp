<?php
if (isset($_POST)) {
    session_start();
    include "db.php";
    include "models/leaderboards.php";
    include "controllers/typingLeaderboard.php";
    
    $encodedData = file_get_contents("php://input");
    $data = json_decode($encodedData, true);

    if ($_SESSION['typingHighScore'] == "N/A") {
        $leaderboard = new TypingLeaderboard();
        $leaderboard->store($data['username'], $data['WPM']);
    } elseif ($data['WPM'] > $_SESSION['typingHighScore']) {
        $leaderboard = new TypingLeaderboard();
        $leaderboard->update($data['username'], $data['WPM']);
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