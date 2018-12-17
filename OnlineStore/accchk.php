<?php
session_start();
include 'conn.php';
$un = $_POST['un'];
$sql = "select userid from accounts where username='$un'";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
if ($num == 0) {
    $pwd = $_POST['pwd'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $sql = "INSERT into accounts (username,pwd,name,tel,address,email,type,date) values ('$un','$pwd','$name','$tel','$address','$email','employee',sysdate())";
    mysqli_query($connect, $sql);
    header("location:acc.php");
} else {
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Employee Account</title>
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
                    <script>         
                        alert("Already existed");
                        document.location="http://localhost/onlinestore/accnew.php";
                    </script>    

                        <?php

                    }
                    ?>
                    </form>
                </center>
            </div>

            <?php
            include 'profile.php';
            ?>
        </div>
    </body>

</html>
