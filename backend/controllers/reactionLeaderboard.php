<?php

class ReactionLeaderboard extends Leaderboards {
    private $username;
    private $newTime;
    private $recordTime;

    function __construct($name, $time)
    {
        $this->username = $name;
        $this->newTime = $time;
    }

    public function store()
    {
        // compare recordtime and run update func if new record
        // if no record time run store
    }

    public function update()
    {

    }

    public function recordTime()
    {
        // fetch result from leaderboard eg $this->findReactionResult($username)
    }
}

?>