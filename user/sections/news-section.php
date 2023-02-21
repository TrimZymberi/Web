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
    <link rel="stylesheet" href="section-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    if (isset($_SESSION["userid"])) {
        if ($_SESSION['usrtype'] == "admin") {
            ?>

            <div id="whole-box">
                <div id="main-container">
                    <label for="img">
                        <img src="../../images/dashboard.jpg" alt="images">
                    </label>

                    <div class="side-container">
                        <h1>Adminstrator Tools</h1>
                    </div>
                    <div class="menu-section">

                        <label for="news"><a href="news-add-section.php">
                                News Add Section
                            </a></label>

                        <label for="news"><a href="news-edit-section.php">
                                News Edit Section
                            </a></label>

                        <label for="news"><a href="news-history.php">
                                News History Section
                            </a></label>

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