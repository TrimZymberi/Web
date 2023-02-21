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
        if ($_SESSION['usrtype'] == "admin") { ?>
            <div class="homeback">
                <a href="../../Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <ul class="users-list">
                <h1>Users List</h1>
            </ul>

            <?php
            try {

                $username = "root";
                $password = "";
                $pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT * FROM users");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $user_id = $row['user_id'];
                    $user_username = $row['user_username'];
                    $email = $row['user_email'];
                    $createdDate = $row['created_date'];
                    $usertype = $row['usertype'];
                    ?>


                    <ul class="users-list">
                        <h2><span>User:</span>
                            <?php echo $user_username; ?>
                        </h2>
                        <p><span>Email:</span>
                            <?php echo $email; ?>
                        </p>
                        <p><span>User joined since:</span>
                            <?php echo $createdDate; ?>
                        </p>
                        <p><span>User Type:</span>
                            <?php echo $usertype; ?>
                        </p>
                        <div class="icon-container">
                            <form action="../../auth/user-delete.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                <button type="submit" name="submit" class="delete-button">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </button>
                            </form>
                            <a href="user-edit-section.php?id=<?php echo $user_id; ?>" class="edit-button">EDIT</a>
                        </div>
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