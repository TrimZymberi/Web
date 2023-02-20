<?php
session_start();


if(isset($_SESSION["userid"]) && $_SESSION['usrtype'] == "admin") {
        $username = "root";
        $password = "";
        $pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);

        $user_id = $_POST['user_id'];

        $arg = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
        $arg->bindParam(':user_id', $user_id);
        $arg->execute();

        header("location: /web/user/sections/users-section.php?error=none");
}