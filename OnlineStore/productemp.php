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
            <form action="productadmin.php" method="POST">
                <input type="text" name="searchtxt">
                <input type="submit" name="searchbtn" value="Search">
            </form>
            <form action="createprod.php" method="post">
                <?php
                //search box
                $p = "";
                if (isset($_POST['searchtxt'])) {
                    $p = $_POST['searchtxt'];
                }
                $query = "select * from products where productname like '%$p%' order by productname";
                $result = mysqli_query($connect, $query);

                echo "
                <center>
                    <table class='bd'>
                        <th class='bd'>Product</th>
                        <th class='bd'>Description</th>
                        <th class='bd'>Price</th>
                        <th class='bd'>picture</th>
                        <th class='bd'>Created Date</th>
                    ";

                while ($row = mysqli_fetch_assoc($result)) {
                    //print_r($row);
                    $pid = $row["productid"];
                    $name = $row["productname"];
                    $d = $row['description'];
                    $price = $row["price"];
                    $url = htmlspecialchars($row["url"]);
                    $date=$row['date'];
                    echo "
                    <tr>
                        <td class='bd'>$name</td>
                        <td class='bd'><textarea readonly cols='50' rows='3'>$d</textarea></td>
                        <td class='bd'><label>\$</label><input class='num' type='text' readonly name='prc[]' value='$price'></td>
                        <td class='bd'><img class='pic' src='$url'></td>
                        <td class='bd'>$date</td>
                    </tr>
                    ";
                }
                ?>
                </table>
                </center>
                <!--<br>
                <input type="submit" value="Create a Product">-->
            </form>
        </div>

        <?php
        include "profile.php"
        ?>
    </div>

</body>

</html>