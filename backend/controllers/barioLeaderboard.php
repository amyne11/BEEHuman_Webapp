<?php

class BarioLeaderboard extends Leaderboards {
    
    public function store($username, $time)
    {
        $this->insertScore("bario", $username, $time);
        $_SESSION['barioHighScore'] = $time;
    }

    public function update($username, $time)
    {
        $this->updateScore("bario", $username, $time);
        $_SESSION['barioHighScore'] = $time;
    }
}

?>