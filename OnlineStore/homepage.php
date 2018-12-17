<?php
session_start();
include "conn.php";
?>

<html>
    <head>
        <title>Bluetooth Online Store</title>
        <link rel="stylesheet" type="text/css" href="onlinestore.css">
    </head>
    <body>
        <?php
        include "head.php";
        ?>

        <div class="main">
        <?php
        include "maindiv.php";
        include "profile.php";
        ?>

        </div>

    </body>
</html>