<?php
if(isset($_POST["submit"]))
{
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $usertype = $_POST["usertype"];
    $userid = $_GET["id"];

    
    include "../packages/database-pkg.php";
    include "../packages/user-edit-pkg.php";
    include "../packages/user-edit-controller.php";

    $news = new userEditControl($username, $email, $usertype, $userid);

    $news->updateUser();

    header("location: /web/user/sections/user-section.php?error=none");
}