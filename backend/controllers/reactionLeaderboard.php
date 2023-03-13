<?php

class ReactionLeaderboard extends Leaderboards {
    
    public function store($username, $time)
    {
        $this->insertScore("reaction", $username, $time);
        $_SESSION['reactionHighScore'] = $time;
    }

    public function update($username, $time)
    {
        $this->updateScore("reaction", $username, $time);
        $_SESSION['reactionHighScore'] = $time;
    }
}

?>