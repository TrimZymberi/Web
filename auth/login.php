<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    include "../packages/database-pkg.php";
    include "../packages/login-pkg.php";
    include "../packages/login-controller.php";

    $login = new logControl($username, $password);

    $login->loginUser();
}
