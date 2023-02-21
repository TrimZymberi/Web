<?php
session_start();

$username = "root";
$password = "";
$pdo = new PDO('mysql:host=localhost;dbname=dbkartell', $username, $password);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $users = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
    $users->execute(array($id));
    $row = $users->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("location: /web/Kartell.php?error=usersnotfound");
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



            <div id="whole-box">
                <div id="main-container">
                    <div class="side-container">
                        <h1>Administrator Tools | User</h1>
                    </div>
                    <div class="menu-section">
                        <form action="../../auth/user-edit.php?id=<?php echo $row['user_id']; ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                            <div class="form-group">
                                <label for="header">
                                    <p>Username</p>
                                </label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['user_username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    <p>Email</p>
                                </label>
                                <input type="text" name="email" class="form-control" value="<?php echo $row['user_email']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="usertype">
                                    <p>User Type (admin/user)</p>
                                </label>
                                <input type="text" name="usertype" class="form-control" value="<?php echo $row['usertype']; ?>">
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