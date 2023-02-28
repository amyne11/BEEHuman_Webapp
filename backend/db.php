<?php

class Db {
    protected $db;
    function __construct() {
        try {
            $database_host = "dbhost.cs.man.ac.uk";
            $database_user = "d86617ce";
            $database_pass = "Y13COMP10120";
            $database_name = "2022_comp10120_y13";
            $this->db = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}



// function showDatabases($pdo)
// {
//     $sql = "SELECT * FROM UserTable";

//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//     $stmt = $pdo->prepare($sql);
//     $stmt->execute();
//     $stmt->setFetchMode(PDO::FETCH_ASSOC);

//     $row = $stmt->fetch();
//     var_dump($row);
//     while ($row = $stmt->fetch())
//     {
//         print("<h3>" . $row['Database'] . "</h3>");
//     }
// }

?>