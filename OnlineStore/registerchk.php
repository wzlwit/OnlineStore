<?php
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
    $sql = "INSERT into accounts (username,pwd,name,tel,address,email,type,date) values ('$un','$pwd','$name','$tel','$address','$email','customer',sysdate())";
    mysqli_query($connect, $sql);
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

                    <script>
                        alert("Account is already registered, please try again");
                        document.location="http://localhost/onlinestore/register.php";
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
