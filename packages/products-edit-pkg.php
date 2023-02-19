<?php
class productEdit extends Database
{
    protected function modifyItem($header, $price, $image, $link, $productid)
    {
        session_start();
        if (isset($_GET['id'])) {
            $user_id = $_SESSION["userid"];
            $productid = $_GET["id"];
            $arg = $this->connect()->prepare('UPDATE products SET products_header = :header, products_image = :image, products_id = :price, products_link = :link, user_id = :user_id WHERE product_id = :product_id;');
            $arg->bindParam(':header', $header);
            $arg->bindParam(':price', $price);
            $arg->bindParam(':image', $image);
            $arg->bindParam(':link', $link);
            $arg->bindParam(':user_id', $user_id);
            $arg->bindParam(':product_id', $productid);
            if ($arg->execute()) {
                header("location: /web/pages/news.php?error=none");
                exit();
            } else {
                header("location: /web/user/sections/news-section.php?error=argfailed");
                exit();
            }
        } else {
            header("location: /web/Kartell.php?error=noID");
        }
    }
}
