<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartell | Home</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/myK.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="navbar">
        <button class="nav-button" id="nav-btn">
            <i class="fa fa-bars"></i>
        </button>

        <a class="logo" href="#">Kartell</a>

        <ul class="nav-container" id="nav">
            <li><a href="Kartell.html" class="home">Home</a></li>
            <li><a href="pages/products.php">Products</a></li>
            <li><a href="pages/projects.html" class="nav-links">Projects</a></li>
            <li><a href="pages/aboutus.html" class="nav-links">About us</a></li>
            <li><a href="pages/news.php" class="nav-links">News</a></li>
            <?php


            if (isset($_SESSION["userid"])) {
                if ($_SESSION['usrtype'] == "admin") {
            ?>
                    <li><a href="auth/logout.php" class="nav-links">Logout</a></li>
                    <li><a href="user/dashboard.php" class="home">Dashboard</a></li>
                <?php
                } else {
                ?>
                    <li><a href="auth/logout.php" class="nav-links">Logout</a></li>
                <?php
                }
            } else {
                ?>
                <li><a href="joinus/accountType/individualaccount.php" class="nav-links">Register</a></li>
                <li><a href="joinus/login.php" class="home">Log in</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>

    <div class="first-container">
        <img src="images/mainpresentation.jpg" alt="">
        <h1>Make it simple but significant</h1>
    </div>

    <div id="main-second-container">
        <div class="title">
        </div>
        <div id="second-container">
            <img src="/images/shrink.jpg" alt="">
        </div>
        <h1>praesentium voluptatum</h1>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,similique sunt in culpa qui officia deserunt mollitia animi,id est laborum et dolorum fuga.Et harum quidem rerum facilis est et expedita distinctio.
            <br><br>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
            <br><br>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus,omnis voluptas assumenda est,omnis dolor repellendus.
            <br><br> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,similique sunt in culpa qui officia deserunt mollitia animi,id est laborum et dolorum fuga.Et harum quidem rerum facilis est et expedita distinctio.
            <br><br>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
        </p>
    </div>

    <div id="main-third-container">

        <h1>sumaru voluptatum</h1>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,similique sunt in culpa qui officia deserunt mollitia animi,id est laborum et dolorum fuga.Et harum quidem rerum facilis est et expedita distinctio.
            <br><br>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
        </p>
    </div>


    <div class="summary">

        <table>
            <tr>
                <th>Services</th>
                <th>Projects</th>
                <th>Why us?</th>
            </tr>

            <tr>
                <td><a href="#">Track your order</a></td>
                <td><a href="#">Louis Ghost 20th</a></td>
                <td><a href="#">Customer reviews</a></td>
            </tr>

            <tr>
                <td><a href="#">Shipments</a></td>
                <td><a href="#">Kartell Eyewear</a></td>
                <td><a href="#">Duratest</a></td>
            </tr>

            <tr>
                <td><a href="#">Payments</a></td>
                <td><a href="#">K70 Play</a></td>
                <td><a href="#"></a></td>
            </tr>

            <tr>
                <td><a href="#">Returns and refunds</a></td>
                <td><a href="#">500 Electric</a></td>
                <td><a href="#"></a></td>
            </tr>
        </table>


    </div>
    <?php
    echo '<script src="js/script.js"></script>';
    ?>
</body>

</html>