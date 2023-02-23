<?php
session_start();

include "../../packages/database-pkg.php";
$news = new Database();
$pdo = $news->connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $news = $pdo->prepare('SELECT * FROM products WHERE product_id = ?');
    $news->execute(array($id));
    $row = $news->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("location: /web/Kartell.php?error=productnotfound");
    }
} else {
    header("location: /web/Kartell.php?error=noID");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartell | Administrator Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/myK.png">
    <link rel="stylesheet" href="tools-section-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    if (isset($_SESSION["userid"])) {
        if ($_SESSION['usrtype'] == "admin") {
    ?>

            <div class="homeback">
                <a href="/web/Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>

            <div id="whole-box">
                <div id="main-container">
                    <div class="side-container">
                        <h1>Administrator Tools | Products</h1>
                    </div>
                    <div class="menu-section">
                        <form action="../../auth/products-edit.php?id=<?php echo $row['product_id']; ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
                            <div class="form-group">
                                <label for="header">
                                    <p>Header</p>
                                </label>
                                <input type="text" name="header" class="form-control" value="<?php echo $row['products_header']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="summary">
                                    <p>Price</p>
                                </label>
                                <input type="text" name="price" class="form-control" value="<?php echo $row['products_price']; ?>">
                            </div>

                            <div class="form-group image">
                                <label for="image">
                                    <p>Image</p>
                                </label>
                                <input type="file" name="image" alt="" accept="image/*" value="<?php echo $row['products_image']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="link">
                                    <p>Link</p>
                                </label>
                                <input type="text" name="link" class="form-control" value="<?php echo $row['products_link']; ?>">
                            </div>

                            <div id="submit">
                                <button type="submit" name="submit" class="submit-button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    <?php
        } else {
            header("location: /web/Kartell.php?error=usernotfound");
        }
    } else {
        header("location: /web/Kartell.php?error=usernotfound");
    }
    ?>

</body>

</html>