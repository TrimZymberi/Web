<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartell | Products</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/myK.png">
    <link rel="stylesheet" href="products-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <div class="homeback">
        <a href="/web/Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>

    
    <div id="container">
        <div class="header">
            <h1>Products</h1>
        </div>
        
        <form method="GET">
            <input type="text" name="product_name" placeholder="Search for a product" class="search-bar">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
    <!-- <div class="container-divider"> </div> -->
    <div class="second-container">
    
        <div id="product-containers">
            <?php
            try {
                $username = "root";
                $password = "";
                $pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if (isset($_GET["product_name"]) && !empty($_GET["product_name"])) {
                    $product_name = "%{$_GET['product_name']}%";
                    $sql = "SELECT * FROM products WHERE products_header LIKE :product_name";
                    $params = array("product_name" => $product_name);
                    $arg = $pdo->prepare($sql);
                    $arg->execute($params);
                    $searched = true;
                    $search_term = $_GET["product_name"];
                } else {
                    $arg = $pdo->prepare("SELECT * FROM products");
                    $arg->execute();
                    $searched = false;
                }

                if ($arg->rowCount() == 0) {
                    $product_name="{$_GET['product_name']}";
                    echo "<p class='comment'>No products was found named ". $product_name . "</p>";
                } else {
                    while ($row = $arg->fetch(PDO::FETCH_ASSOC)) {
                        $header = $row['products_header'];
                        $image = $row['products_image'];
                        $price = $row['products_price'];
                        $link = $row['products_link'];

                        if ($searched && stripos($header, $search_term) === false) {
                            continue;
                        }
                        ?>

                        <?php
                        if (isset($_SESSION["userid"])) {
                            if ($_SESSION['usrtype'] == "admin") {
                                ?>
                                <div class="product">
                                    <a href="product-links/<?php echo $link; ?>">
                                        <img src="../images/<?php echo $image; ?>" alt="">
                                        <h1>
                                            <?php echo $header; ?>
                                        </h1>
                                        <p>
                                            <?php echo $price; ?>$
                                        </p>
                                    </a>
                                    <div class="icon-container">
                                        <form action="../auth/products-delete.php" method="post">
                                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                            <button type="submit" name="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <a href="../user/sections/products-edit-section.php?id=<?php echo $row['product_id']; ?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="product">
                                    <a href="product-links/<?php echo $link; ?>">
                                        <img src="../images/<?php echo $image; ?>" alt="">
                                        <h1>
                                            <?php echo $header; ?>
                                        </h1>
                                        <p>
                                            <?php echo $price; ?>$
                                        </p>
                                    </a>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="product">
                                <a href="product-links/<?php echo $link; ?>">
                                    <img src="../images/<?php echo $image; ?>" alt="">
                                    <h1>
                                        <?php echo $header; ?>
                                    </h1>
                                    <p>
                                        <?php echo $price; ?>$
                                    </p>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $pdo = null;
            if (isset($_SESSION["userid"])) {
            
            if ($_SESSION['usrtype'] == "admin") {
                ?>
                <div class="product">
                    <a href="../user/sections/products-add-section.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <?php
            }
        }
            ?>

        </div>
</body>

</html>