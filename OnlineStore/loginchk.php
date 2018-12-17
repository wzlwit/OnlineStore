<?php
session_start();
include 'conn.php';
$un = $_POST['un'];
$pwd = $_POST['pwd'];
$sql = "SELECT * from accounts where username='$un' And pwd='$pwd'";
$result = mysqli_query($connect, $sql);
//print_r($result);
$num = mysqli_num_rows($result);
//echo $num;
if ($num == 1) {
    $_SESSION['un'] = $_POST['un'];
    echo $_SESSION['un'];
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['userid'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['type'] = $row['type'];
    $_SESSION['tel'] = $row['tel'];
    $_SESSION['address'] = $row['email'];
    $_SESSION['email'] = $row['address'];
    //print_r($_SESSION['type']);
    header("location:homepage.php");
} else {
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="onlinestore.css">
    </head>

    <body>
        <?php
        include "head.php";
        ?>
        <div class="main">
            <div class="divmain">
                <center>
                    <form>
                        <?php

                    }
                    ?>
                    <script>
                        alert("Incorrect, please try again");document.location="http://localhost/onlinestore/login.php";
                        //else document.location="http://localhost/onlinestore/homepage.php";
                    </script>
                    </form>
                </center>
            </div>

            <?php
            include 'profile.php';
            ?>
        </div>
    </body>

</html>
