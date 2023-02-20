<?php
session_start();

if(isset($_SESSION["userid"]) && $_SESSION['usrtype'] == "admin") {
        $username = "root";
        $password = "";
        $pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);

        $product_id = $_POST['product_id'];

        $arg = $pdo->prepare("DELETE FROM products WHERE product_id = :product_id");
        $arg->bindParam(':product_id', $product_id);
        $arg->execute();

        header("location: /web/pages/products.php?error=none");
}