<?php
include "db.php";
class User extends Db {
    protected function findUser($username)
    {
        $sql = "SELECT * 
                FROM UserTable 
                WHERE userName=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result;
    }

    protected function insertUser($username, $password)
    {
        $sql = "INSERT INTO UserTable (userName, password)
                VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username, $hashedPassword]);
    }

    // protected function isUsernameUnique($username) 
    // {
    //     $sql = "SELECT * 
    //             FROM UserTable 
    //             WHERE userName=?";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute([$username]);
    //     $result = $stmt->fetch();
    //     return $result;
    // }
}

?>