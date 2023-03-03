<?php

class Signup extends User {
    private $username;
    private $password;
    private $errorMsg;
    public function create($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        if ($this->valid()) { // Validation checks
            $this->insertUser($this->username, $this->password);
        } else {
            header("Location: ../signup-page.php?error=" . $this->errorMsg);
            exit();
        }
    }
    

    private function valid()
    {
        if (empty($this->username) || empty($this->password)) {
            $this->errorMsg = "Please enter a username and password";
        } elseif (strlen($this->username) > 20) {
            $this->errorMsg = "Please enter a username that is less than 20 characters";
        } elseif (preg_match('/^\S.*\s.*\S$/', $this->username) || preg_match('/^\S.*\s.*\S$/', $this->password)) {
            $this->errorMsg = "Usernames and passwords cannot contain any whitespace";
        } elseif ($this->findUser($this->username)) {
            $this->errorMsg = "This username is already taken";
        } else {
            return True;
        }
        return False;
    }
}

?>