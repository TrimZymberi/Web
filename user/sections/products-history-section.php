<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartell | Administrator Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/myK.png">
    <link rel="stylesheet" href="history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    if (isset($_SESSION["userid"])) {
        // ADMIN
        if ($_SESSION['usrtype'] == "admin") { ?>
            <div class="homeback">
                <a href="../../Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <ul class="users-list">
                <h1>Products History</h1>
            </ul>

            <?php
            try {

                include "../../packages/database-pkg.php";
                $products = new Database();
                $pdo = $products->connect();

                $products = $pdo->prepare("SELECT p.product_id, p.products_header, p.created_date, u.user_username FROM products p INNER JOIN users u ON p.user_id = u.user_id");
                $products->execute();

                while ($row = $products->fetch(PDO::FETCH_ASSOC)) {
                    $admin_name = $row['user_username'];
                    $header = $row['products_header'];
                    $createdDate = $row['created_date'];
            ?>


                    <ul class="users-list">
                        <h2><span>Created By:</span>
                            <?php echo $admin_name; ?>
                        </h2>
                        <p><span>News:</span>
                            <?php echo $header; ?>
                        </p>
                        <p><span>Last Created/Modified:</span>
                            <?php echo $createdDate; ?>
                        </p>
                    </ul>

    <?php
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $pdo = null;
            // USER
        } else {
            header("location: /web/Kartell.php?error=usernotfound");
        }
        // GUEST
    } else {
        header("location: /web/Kartell.php?error=usernotfound");
    }
    ?>

</body>

</html>