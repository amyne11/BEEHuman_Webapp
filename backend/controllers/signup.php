<?php

class Signup extends User {
    private $username;
    private $password;
    public function create($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        // Validation checks
        if (empty($this->username) || empty($this->password)) {
            die("Please enter a username and password");
        } elseif (strlen($this->username) > 20) {
            die("Please enter a username that is less than 20 characters");
        } elseif (preg_match('/^\S.*\s.*\S$/', $this->username) || preg_match('/^\S.*\s.*\S$/', $this->password)) {
            die("Usernames and passwords cannot contain any whitespace");
        } else {
            // Details are valid so user is created
            echo "success";
            $this->insertUser($this->username, $this->password);
        }
    }
}

?>