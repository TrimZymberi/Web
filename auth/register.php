<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    include "../packages/database-pkg.php";
    include "../packages/register-pkg.php";
    include "../packages/register-controller.php";

    $register = new regControl($username, $email, $password);

    $register->userRegister();
}
