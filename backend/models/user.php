<?php
include "db.php";
class User extends Db {
    protected function insertUser($username, $password)
    {
        $this->connect();
        $sql = "INSERT INTO UserTable (userName, password)
                VALUES ($username, $password)";
        echo "insert";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}

?>