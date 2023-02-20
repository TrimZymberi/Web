<?php
if(isset($_POST["submit"]))
{
    
    $header = $_POST["header"];
    $image = $_POST["image"];
    $price = $_POST["price"];
    $link = $_POST["link"];

    move_uploaded_file($_FILES["image"]["tmp_name"], "/images/" . $image);
    
    include "../packages/database-pkg.php";
    include "../packages/products-add-pkg.php";
    include "../packages/products-add-control.php";

    $news = new productControl($header, $image, $price, $link);

    $news->addProduct();

    header("location: /web/Kartell.php?error=none");
}