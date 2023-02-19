<?php

class userEditControl extends userEdit
{
    private $username;
    private $email;
    private $usertype;
    private $userid;

    public function __construct($username, $email, $usertype, $userid)
    {
        $this->username = $username;
        $this->email = $email;
        $this->usertype = $usertype;
        $this->userid = $userid;
    }

    public function updateUser()
    {
        if($this->emptyInputCheck() == false)
        {
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

        $this->modifyUser($this->username, $this->email, $this->usertype, $this->userid);
    }


    private function emptyInputCheck()
    {
        if(empty($this->username) || empty($this->email) || empty($this->usertype) || empty($this->userid))
        {
            $arg = false;
        }
        else
        {
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
}