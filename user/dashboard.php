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
    <link rel="icon" type="image/x-icon" href="../images/myK.png">
    <link rel="stylesheet" href="dashboard-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    if (isset($_SESSION["userid"])) {
        // ADMIN
        if ($_SESSION['usrtype'] == "admin") {
    ?>
            <div class="homeback">
                <a href="../Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <div id="whole-box">
                <div id="main-container">
                    <label for="img">
                        <img src="../images/dashboard.jpg" alt="images">
                    </label>

                    <div class="side-container">
                        <h1>Administrator Dashboard</h1>
                    </div>
                    <div class="menu-section">

                        <label for="news"><a href="sections/news-section.php">
                                News Section
                            </a></label>

                        <label for="news"><a href="sections/products-section.php">
                                Products Section
                            </a></label>

                        <label for="news"><a href="sections/users-section.php">
                                Users Section
                            </a></label>

                    </div>
                </div>
            </div>


    <?php
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