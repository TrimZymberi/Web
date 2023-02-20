<?php
if(isset($_POST["submit"]))
{
    
    $header = $_POST["header"];
    $summary = $_POST["summary"];
    $image = $_POST["image"];
    $link = $_POST["link"];
    $newsid = $_GET["id"];

    move_uploaded_file($_FILES["image"]["tmp_name"], "/images/" . $image);
    
    include "../packages/database-pkg.php";
    include "../packages/news-edit-pkg.php";
    include "../packages/news-edit-control.php";

    $news = new editControl($header, $summary, $image, $link, $newsid);

    $news->updateItem();

    header("location: /web/pages/news.php?error=none");
}