<?php
session_start();

    if(isset($_SESSION["userid"]) && $_SESSION['usrtype'] == "admin") {
        $username = "root";
        $password = "";
        $pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);

        $news_id = $_POST['news_id'];

        $arg = $pdo->prepare("DELETE FROM news WHERE news_id = :news_id");
        $arg->bindParam(':news_id', $news_id);
        $arg->execute();

        header("location: /web/pages/news.php?error=none");
    }
