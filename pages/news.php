<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartell | News</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/myK.png">
    <link rel="stylesheet" href="news-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="homeback">
        <a href="../Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>

    <div id="container">
        <div class="header">
            <h1>News</h1>
        </div>

        <div id="news-containers">
            <?php
            try {

                $username = "root";
                $password = "";
                $pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT * FROM news");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $news_id = $row['news_id'];
                    $header = $row['news_header'];
                    $summary = $row['news_summary'];
                    $image = $row['news_image'];
                    $link = $row['news_divide'];
            ?>

                    <?php
                    if (isset($_SESSION["userid"])) {

                        // ADMIN
                        if ($_SESSION['usrtype'] == "admin") {
                    ?>
                            <div class="news">
                                <a href="news-links/<?php echo $link; ?>">
                                    <img src="../images/<?php echo $image; ?>" alt="">
                                    <h1>
                                        <?php echo $header; ?>
                                    </h1>
                                    <p>
                                        <?php echo $summary; ?>
                                    </p>
                                </a>
                                <div class="icon-container">
                                    <form action="../auth/news-delete.php" method="post">
                                        <input type="hidden" name="news_id" value="<?php echo $row['news_id']; ?>">
                                        <button type="submit" name="submit">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    </form>
                                    <a href="../user/sections/news-edit-section.php?id=<?php echo $row['news_id']; ?>">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>

                        <?php
                            /// USER
                        } else {
                        ?>
                            <div class="news">
                                <a href="news-links/<?php echo $link; ?>">
                                    <img src="../images/<?php echo $image; ?>" alt="">
                                    <h1>
                                        <?php echo $header; ?>
                                    </h1>
                                    <p>
                                        <?php echo $summary; ?>
                                    </p>
                                </a>
                            </div>
                        <?php
                        }
                    }

                    // GUEST
                    else {
                        ?>
                        <div class="news">
                            <a href="news-links/<?php echo $link; ?>">
                                <img src="../images/<?php echo $image; ?>" alt="">
                                <h1>
                                    <?php echo $header; ?>
                                </h1>
                                <p>
                                    <?php echo $summary; ?>
                                </p>
                            </a>
                        </div>
            <?php
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $pdo = null;
            ?>
            <?php
            if (isset($_SESSION["userid"])) {

                if ($_SESSION['usrtype'] == "admin") {
            ?>
                    <div class="news">
                        <a href="../user/sections/news-add-section.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

</body>

</html>