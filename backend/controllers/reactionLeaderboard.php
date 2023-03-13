<?php

class ReactionLeaderboard extends Leaderboards {
    private $newTime;
    private $recordTime;
    private $username;

    public function store($username, $time)
    {
        // compare recordtime and run update func if new record
        // if no record time run store

        $this->insertScore("reaction", $username, $time);
        $_SESSION['reactionHighScore'] = $time;
    }

    public function update($username, $time)
    {
        $this->updateScore("reaction", $username, $time);
        $_SESSION['reactionHighScore'] = $time;
    }

    public function recordTime()
    {
        // fetch result from leaderboard eg $this->findReactionResult($username)
    }
}

?>