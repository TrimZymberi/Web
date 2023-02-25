<?php
class Register extends Database
{

    public function setUser($username, $password, $email) {
        $arg = $this->connect()->prepare('INSERT INTO users(user_username, user_password,user_email) VALUES (?,?,?);');

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $arg;
        if($arg->execute(array($username, $hashedpassword, $email))) {
            header("location: /web/Kartell.php?error=none");
            exit();
        } else {
            header("location: /web/Kartell.php?error=argfailed");
            exit();
        }
        $arg = null;
    }

    public function authUser($username, $email) {
        $arg = $this->connect()->prepare('SELECT user_username FROM users WHERE user_username = ? OR user_email = ?;');
        
        $arg;
        if($arg->execute(array($username, $email))) {
            if ($arg->rowCount() > 0) {
                $rcheck = false;
            } else {
                $rcheck = true;
            }
        } else {
            header("location: /web/Kartell.php?error=argfailed");
            exit();
        }

        $arg = null;
        return $rcheck;
    }

}
