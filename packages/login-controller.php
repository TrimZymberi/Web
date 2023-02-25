<?php

class logControl extends Login
{

    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("location: /web/joinus/login.php?error=Please fill in all the fields.");
            exit();
        }

        $this->getUser($this->username, $this->password);
    }

    private function emptyInput()
    {
        if(empty($this->username) || empty($this->password))
        {
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }

    
}