<?php
class Leaderboards extends Db {
    private $username;
    private $table;
    private $columnName;
    
    protected function insertScore($game, $username, $score)
    {
        $this->table = ucfirst($game) . "Table";
        $this->columnName = $game . "Score";

        $sql = "INSERT INTO {$this->table} (userName, {$this->columnName})
                VALUES (?, ?)";
        
        $stmt = $this->db->prepare($sql);

        $stmt->execute([$username, $score]);
    }

    protected function updateScore($game, $username, $score)
    {
        $this->table = ucfirst($game) . "Table";
        $this->columnName = $game . "Score";

        $sql = "UPDATE {$this->table} 
                SET {$this->columnName} = ? 
                WHERE userName = ?";
        
        $stmt = $this->db->prepare($sql);

        $stmt->execute([$score, $username]);
    }

    public function selectResult($game, $username)
    {
        $this->table = ucfirst($game) . "Table";
        $this->columnName = $game . "Score";

        $sql = "SELECT {$this->columnName} FROM {$this->table} WHERE userName=?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $score = $stmt->fetch();
        if ($score == false) {
            return array("reactionScore" => "N/A");
        }
        return $score;
    }

    public function selectResults()
    {
        $tables = array("TypingTable", "BarioTable", "ReactionTest");
        $columns = array("typingScore", "barioScore", "reactionScore");
        $leaderboardArry = array(); //I don't know if we need to define the size of the array beforehand
        for ($i=0; $i<count($tables); $i++){
            $this->table = $tables[$i];
            $this->columnName = $columns[$i];

            $sql = "SELECT {$this->columnName} FROM {$this->table} ORDER BY {$this->columnName} LIMIT 10";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $scores = $stmt->fetch();
            $leaderboardArry[$i] = $scores;
        }
        $leaderboardArry[2] = array_reverse($leaderboardArry[2]); //'2' is the position of the reaction test in the array
        die(var_dump($leaderboardArry));
        // return $leaderboardArry;
    }
}

?>