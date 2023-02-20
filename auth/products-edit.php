<?php
if(isset($_POST["submit"]))
{
    
    $header = $_POST["header"];
    $price = $_POST["price"];
    $image = $_POST["image"];
    $link = $_POST["link"];
    $productid = $_GET["id"];

    move_uploaded_file($_FILES["image"]["tmp_name"], "/images/" . $image);
    
    include "../packages/database-pkg.php";
    include "../packages/products-edit-pkg.php";
    include "../packages/products-edit-control.php";

    $news = new productEditControl($header, $price, $image, $link, $productid);

    $news->updateItem();

    header("location: /web/pages/news.php?error=none");
}