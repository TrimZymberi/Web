<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kartell | Log in</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/myK.png">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="homeback">
    <a href="../Kartell.php"><i class="fa fa-home" aria-hidden="true"></i></a>
</div>

<div class="complete">
    <form action="../auth/login.php" method="post" id="account-form">
            <h1 id="header-h1" for="form-group" class="headline">Log in</h1>

        <div class="form-group">
            <label id="username-label" for="username">Username </label>
            <input type="username" name="username" id="username" class="form-control" placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label id="password-label" for="password">Password </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Must be at least 8 characters">
        </div>

        <div class="form-group">
            <div class="ref">
                <label><a href="accountType/individualaccount.php" id="reference-label">You are not registered?</a><label>
            </div>
        </div>

        <div id="submit">
            <button type="submit" name="submit" class="submit-button">Submit</button>
        </div>
        
    </form>

</div>
</body>
</html>