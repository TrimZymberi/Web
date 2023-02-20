<?php

session_start();
session_unset();
session_destroy();


header("location: /web/Kartell.php?error=none");