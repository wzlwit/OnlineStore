<?php
session_start();
include "conn.php";
?>
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
                <form action="registerchk.php" method="POST" class="mg">
                    <fieldset>
                        <legend>Register Form</legend>
                        <br>
                        <table style="margin:0 auto;">
                            <tr><td>User Name:</td><td><input type="text" name="un" required></td></tr>
                            <tr><td>Password:</td><td><input type="password" name="pwd" value="1111" required></td></tr>
                            <tr><td>Name:</td><td><input type="text" name="name" required></td></tr>
                            <tr><td>Email:</td><td><input type="email" name="email" value="z@gmail.com" required></td></tr>
                            <tr><td>Tel:</td><td><input type="tel" name="tel" value="6146668888"></td></tr>
                            <tr><td>Address:</td><td><input type="address" name="address" value="h4b 1m3"></td></tr>
                            <tr>
                                <td class="btn"><input type="submit" value="Register" name="regsubmit" ></td>
                                <td class="btn"><input type="reset" value="Reset" ></td>
                            </tr>
                        </table>
                        
                    </fieldset>
                </form>
            </center>
        </div>

        <?php
        include "profile.php"
        ?>
    </div>
</body>

</html>