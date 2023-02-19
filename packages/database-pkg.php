<?php 

class Database
{

    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);
            return $dbh;
        }catch (PDOException $e){
            print "ERROR!" . $e->getMessage() . "<br/>";
            die();
        }
    }
}

        // CREATE TABLE products (
        //     product_id INT NOT NULL AUTO_INCREMENT,
        //     products_header VARCHAR(255) NOT NULL,
        //     products_image VARCHAR(255) NOT NULL,
        //     products_price DECIMAL(10,2) NOT NULL,
        //     products_link VARCHAR(255) NOT NULL,
        //     created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        //     user_id INT NOT NULL,
        //     PRIMARY KEY (product_id),
        //     FOREIGN KEY (user_id) REFERENCES users(user_id)
        //   );