<?php
include "db.php";
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

    public static function selectResult($game, $username)
    {
        
    }
}

?>