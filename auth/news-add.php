<?php
if(isset($_POST["submit"]))
{
    
    $header = $_POST["header"];
    $summary = $_POST["summary"];
    $image = $_POST["image"];
    $link = $_POST["link"];

    move_uploaded_file($_FILES["image"]["tmp_name"], "/images/" . $image);
    
    include "../packages/database-pkg.php";
    include "../packages/news-add-pkg.php";
    include "../packages/news-add-control.php";

    $news = new newsControl($header, $summary, $image, $link);

    $news->makeNews();

    header("location: /web/Kartell.php?error=none");
}