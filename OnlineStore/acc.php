<?php
session_start();
include "conn.php";
?>
<html>

<head>
    <title>product</title>
    <link rel="stylesheet" href="onlinestore.css">
</head>

<body>
    <?php
    include "head.php";

    ?>
    <div class="main">
        <div class="divmain">
            <form action="acc.php" method="POST">
                <input type="text" name="searchtxt">
                <input type="submit" name="searchbtn" value="Search">
            </form>
            <form action="accnew.php" method="post">
                <?php
                //search box
                $p = "";
                if (isset($_POST['searchtxt'])) {
                    $p = $_POST['searchtxt'];
                }
                $query = "select * from accounts where name like '%$p%' order by type, name";
                $result = mysqli_query($connect, $query);

                echo "
                <center>
                    <table class='bd'>
                        <th class='bd'>Account ID</th>
                        <th class='bd'>Name</th>
                        <th class='bd'>Type</th>
                        <th class='bd'>email</th>
                        <th class='bd'>Phone</th>
                        <th class='bd'>Address</th>
                        <th class='bd'>Created Date</th>
                    ";

                while ($row = mysqli_fetch_assoc($result)) {
                    //print_r($row);
                    $un = $row["username"];
                    $name = $row["name"];
                    $type = $row['type'];
                    $email = $row["email"];
                    $tel = $row["tel"];
                    $address = $row["address"];
                    $date=$row['date'];
                    echo "
                    <tr>
                        <td class='bd'>$un</td>
                        <td class='bd'>$name</td>
                        <td class='bd'>$type</td>
                        <td class='bd'>$email</td>
                        <td class='bd'>$tel</td>
                        <td class='bd'>$address</td>
                        <td class='bd'>$date</td>
                    </tr>
                    ";
                }
                ?>
                </table>
                </center>
                <br>
                <input type="submit" value="Create Employee Account">
            </form>
        </div>

        <?php
        include "profile.php"
        ?>
    </div>

</body>

</html>