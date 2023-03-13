<?php
class Leaderboards extends Db {
    
    protected function insertScore($game, $username, $score)
    {
        $table = ucfirst($game) . "Table";
        $columnName = $game . "Score";

        $sql = "INSERT INTO {$table} (userName, {$columnName})
                VALUES (?, ?)";
        
        $stmt = $this->db->prepare($sql);

        $stmt->execute([$username, $score]);
    }

    protected function updateScore($game, $username, $score)
    {
        $table = ucfirst($game) . "Table";
        $columnName = $game . "Score";

        $sql = "UPDATE {$table} 
                SET {$columnName} = ? 
                WHERE userName = ?";
        
        $stmt = $this->db->prepare($sql);

        $stmt->execute([$score, $username]);
    }

    public function selectResult($game, $username)
    {
        $table = ucfirst($game) . "Table";
        $columnName = $game . "Score";

        $sql = "SELECT {$columnName} FROM {$table} WHERE userName=?";
        
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
            $table = $tables[$i];
            $columnName = $columns[$i];

            $sql = "SELECT {$columnName} FROM {$table} ORDER BY {$columnName} LIMIT 10";
            
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