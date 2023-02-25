<?php
class userEdit extends Database
{
    protected function modifyUser($username, $email, $usertype, $userid)
    {
        session_start();
        if (isset($_GET['id'])) {
            $userid = $_SESSION["userid"];
            $arg = $this->connect()->prepare('UPDATE users SET user_username = :username, user_email = :email, usertype = :usertype WHERE user_id = :user_id;');
            $arg->bindParam(':username', $username);
            $arg->bindParam(':email', $email);
            $arg->bindParam(':usertype', $usertype);
            $arg->bindParam(':user_id', $userid);
            if ($arg->execute()) {
                header("location: /web/user/sections/users-section.php?error=none");
                exit();
            } else {
                header("location: /web/user/sections/users-section.php?error=argfailed");
                exit();
            }
        } else {
            header("location: /web/user/sections/users-section.php?error=noID");
        }
    }
}
