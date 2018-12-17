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
                <form action="loginchk.php" method="POST" class="mg" name="loginfrm">
                    <fieldset>
                        <legend>Login</legend>
                        <br>
                        <table style="margin:0 auto;">
                            <tr><td>User Name:</td><td><input type="text" name="un" value="bob" required placeholder="enter account user name"></td></tr>
                            <tr><td>Password:</td><td><input type="password" name="pwd" value="1111" required ></td></tr>
                            <tr>
                                <td class="btn"><input type="submit" value="Login" name="regsubmit" ></td>
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