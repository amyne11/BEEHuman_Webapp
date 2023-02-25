<?php
include "db.php";
class User extends Db {
    protected function insertUser($username, $password)
    {
        $this->connect();
        $sql = "INSERT INTO UserTable (userName, password)
                VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo($hashedPassword);
        $stmt->execute([$username, $hashedPassword]);
    }
}

?>