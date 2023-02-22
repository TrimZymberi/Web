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
            header("location: /web/Kartell.php?error=emptyinput");
            exit();
        }
        if($this->regexUsername() == false) {
            header("location: /web/Kartell.php?error=username");
            exit();
        }
        if($this->regexEmail() == false) {
            header("location: /web/Kartell.php?error=email");
            exit();
        }
        if($this->regexPassword() == false) {
            header("location: /web/Kartell.php?error=password");
            exit();
        }
        if($this->nameCheck() == false) {
            header("location: /web/Kartell.php?error=sameuser");
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