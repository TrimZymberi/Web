<?php

class regControl extends Register
{
    private $username;
    private $email;
    private $password;
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public function userRegister()
    {
        if($this->emptyInput() == false) {
            header("location: /web/joinus/accountType/individualaccount.php?error=Please fill in all the fields.");
            exit();
        }
        if($this->regexUsername() == false) {
            header("location: /web/joinus/accountType/individualaccount.php?error=Username should start with a capital letter,and be between 4 and 15 characters long.");
            exit();
        }
        if($this->regexEmail() == false) {
            header("location: /web/joinus/accountType/individualaccount.php?error=Invalid email");
            exit();
        }
        if($this->regexPassword() == false) {
            header("location: /web/joinus/accountType/individualaccount.php?error=Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one digit");
            exit();
        }
        if($this->nameCheck() == false) {
            header("location: /web/joinus/accountType/individualaccount.php?error=This user already exists");
            exit();
        }

        $this->setUser($this->username, $this->password, $this->email);
    }
    private function nameCheck()
    {
        if(!$this->authUser($this->username, $this->email)) {
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }

    private function emptyInput()
    {
        if(empty($this->username) || empty($this->email) || empty($this->password))
        {
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }

    private function regexUsername()
    {
        if(!preg_match("/^[A-Z][A-Za-z]{3,14}$/", $this->username)){
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }
    private function regexEmail()
    {
        if(!preg_match("/^\w+([.-]?\w+)@\w+([.-]?\w+)(\.\w{2,3})+$/", $this->email)){
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }

    private function regexPassword()
    {
        if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,}$/", $this->password)){
            $arg = false;
        }else {
            $arg = true;
        }
        return $arg;
    }
}