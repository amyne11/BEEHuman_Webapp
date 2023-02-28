<?php

class Login extends User {
    private $username;
    private $password;
    private $errorMsg;
    
    public function create($username, $password) 
    {
        $this->username = $username;
        $this->password = $password;

        if ($this->valid() && $this->passwordsMatch()) {
            $this->startSession();
        } else {
            header("Location: ../login-page.php?error=" . $this->errorMsg);
            exit();
        }
    }

    public function startSession()
    {
        session_start();
        $_SESSION["logged"] = True;
        die("You have logged in");
    }

    private function valid()
    {
        if (empty($this->username) || empty($this->password)) {
            $this->errorMsg = "Please enter a username and password";
        } elseif (strlen($this->username) > 20) {
            $this->errorMsg = "Please enter a username that is less than 20 characters";
        } elseif (preg_match('/^\S.*\s.*\S$/', $this->username) || preg_match('/^\S.*\s.*\S$/', $this->password)) {
            $this->errorMsg = "Usernames and passwords cannot contain any whitespace";
        } elseif (!$this->findUser($this->username)) {
            $this->errorMsg = "Username does not exist";
        } else {
            return True;
        }
        return False;
    }

    private function passwordsMatch()
    {
        $user = $this->findUser($this->username);
        // die($this->password);
        if (password_verify($this->password, $user['password'])) {
            return True;
        } else {
            $this->errorMsg = "Incorrect Password";
            return False;
        }
    }
}

?>