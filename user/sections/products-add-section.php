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
    <link rel="stylesheet" href="tools-section-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    if (isset($_SESSION["userid"])) {
        //ADMIN
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
                        <form action="../../auth/products-add.php" method="post">
                            <div class="form-group">
                                <label for="header">
                                    <p>Header</p>
                                </label>
                                <input type="text" name="header" class="form-control" placeholder="Write your Product header here!">
                            </div>
                            <div class="form-group">
                                <label for="price">
                                    <p>Price</p>
                                </label>
                                <input type="text" name="price" class="form-control" placeholder="Write your Product price here!">
                            </div>

                            <div class="form-group image">
                                <label for="image">
                                    <p>Image</p>
                                </label>
                                <input type="file" name="image" alt="" accept="image/*" value="Upload Image of the Product">
                            </div>

                            <div class="form-group">
                                <label for="link">
                                    <p>Link</p>
                                </label>
                                <input type="text" name="link" class="form-control" placeholder="Write your link for the chained connection">
                            </div>

                            <div id="submit">
                                <button type="submit" name="submit" class="submit-button">Submit</button>
                            </div>
                        </form>
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