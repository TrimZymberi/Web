<?php
class Login extends Database
{

    protected function getUser($username, $password) {
        $arg = $this->connect()->prepare('SELECT * FROM users WHERE user_username = ? OR user_email = ?;');

        if(!$arg->execute(array($username,$username)))
        {
            $arg = null;
            header("location: /web/Kartell.php?error=argfailed");
            exit();
        }
        
        if($arg->rowCount() == 0)
        {
            $arg = null;
            header("location: /web/joinus/login.php?error=User was not found.");
            exit();
        }

        $passwordHashed = $arg->fetchAll(PDO::FETCH_ASSOC);

        $checkPassword = password_verify($password, $passwordHashed[0]["user_password"]);
        
        if($checkPassword == false)
        {
            $arg = null;
            header("location: /web/joinus/login.php?error=Wrong password.");
            exit();
        }
        elseif ($checkPassword == true)
        {
            $arg = $this->connect()->prepare('SELECT * FROM users WHERE (user_username = ? OR user_email = ?) AND user_password = ?;');

            if(!$arg->execute(array($username, $username, $passwordHashed[0]['user_password']))) {
                $arg = null;
                header("location: /web/Kartell.php?error=argsfailed");
                exit();
            }

            $user = $arg->fetchAll(PDO::FETCH_ASSOC);
            if($arg->rowCount() == 0)
            {
                $arg = null;
                header("location: /web/joinus/login.php?error=Profile was not found.");
                exit();
            }

            session_start();
            
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["uiusername"] = $user[0]["user_username"];
            $_SESSION["usrtype"] = $user[0]["usertype"];

            $arg = null;
        }
    }

}
