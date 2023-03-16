<?php

class TypingLeaderboard extends Leaderboards {
    
    public function store($username, $WPM)
    {
        $this->insertScore("typing", $username, $WPM);
        $_SESSION['typingHighScore'] = $WPM;
    }

    public function update($username, $WPM)
    {
        $this->updateScore("typing", $username, $WPM);
        $_SESSION['typingHighScore'] = $WPM;
    }
}

?>