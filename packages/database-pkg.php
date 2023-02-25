<?php 

class Database
{

    public function connect() {
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