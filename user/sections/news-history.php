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
    if
    (isset($_SESSION["userid"])) {
        if
        ($_SESSION['usrtype'] == "admin") { ?>
            <div class="homeback">
                <a href="../../Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <ul class="users-list">
                <h1>News History</h1>
            </ul>

            <?php
            try {

                $username = "root";
                $password = "";
                $pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT n.news_id, n.news_header, n.created_date, u.user_username FROM news n INNER JOIN users u ON n.user_id = u.user_id");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $admin_name = $row['user_username'];
                    $header = $row['news_header'];
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

        } else {
            header("location: /web/Kartell.php?error=usernotfound");
        }
    } else {
        header("location: /web/Kartell.php?error=usernotfound");
    }
    ?>

</body>

</html>