<?php 

class Products extends Database
{
    protected function adddbProduct($header, $image, $price, $link)
    {
        session_start();
        $user_id = $_SESSION["userid"];

        $arg = $this->connect()->prepare('INSERT INTO products (products_header, products_image, products_price, products_link, user_id) VALUES (?, ?, ?, ?, ?);');
        if($arg->execute(array($header, $image, $price, $link, $user_id))) {
            header("location: /web/pages/products.php?error=none");
            exit();
        } else {
            header("location: /web/user/sections/products-section.php?error=argfailed");
            exit();
        }

    }

}

        