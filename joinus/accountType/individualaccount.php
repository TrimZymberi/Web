<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartell | Individual Account</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/myK.png">
    <link rel="stylesheet" href="llidvstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="homeback">
        <a href="../login.php"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>

    <div class="complete">
        <form action="../../auth/register.php" method="post" id="account-form">
            <h1 id="header-h1" for="form-group" class="headline">Creating an Individual Account</h1>

            <div class="form-group">
                <label id="name-label" for="name">Username</label>
                <input type="text" name="username" id="first-name" class="form-control" placeholder="Write your first name.">
            </div>

            <div class="form-group">
                <label id="email-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label id="password-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Must be at least 8 characters">
            </div>

            <div class="form-group">
                <div class="ref">
                    <label><a href="../login.php" id="reference-label">You are already registered?</a><label>
                </div>
            </div>

            <div class="form-group">
                <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error-message" id="error-label">' . $_GET['error'] . '</p>';
                }
                ?>
            </div>

            <div id="submit">
                <button type="submit" name="submit" class="submit-button">Submit</button>
            </div>

        </form>

    </div>

</body>

</html>