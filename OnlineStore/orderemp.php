<?php
session_start();
include 'conn.php';


if (isset($_POST['done'])) {
    if (!isset($_SESSION['type'])) {
        ?>
<script>
    alert("you have not logged in, please login");
    document.location = "http://localhost/onlinestore/login.php";
</script>
<?php
    }
    $oid=$_POST['done'];
    $sql = "UPDATE orders set status='done', uptodate=sysdate() where orderid='$oid'";

    mysqli_query($connect, $sql);
}



?>

<!--display cart-->
<html>

<head>
    <title>Carts</title>
    <link rel="stylesheet" href="onlinestore.css">
</head>

<body>
    <?php
    include "head.php";
    ?>
    <div class="main">
        <div class="divmain">
            <form action="orderemp.php" method="POST">
                <center>
                    <label>* After processing an order, please click on 'done!' button to finish it! </label><br><br>
                    <?php
                    if (isset($_SESSION['id']) && $_SESSION['type'] == 'employee') { ?>
                    <table class='bd'>
                        <th class='bd'>Product</th>
                        <th class='bd'>Picture</th>
                        <th class='bd'>Price</th>
                        <th class='bd'>Quantity</th>
                        <th class='bd'>Total</th>
                        <th class='bd'>Handler</th>
                        <th class='bd'>Order Date</th>
                        <th class='bd'>Last Update</th>
                        <th class='bd'>Status</th>
                        <?php

                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM products inner join orders o using (productid) where emid ='$id' order by o.date desc";
                        $result = mysqli_query($connect, $query);
                        $rownum = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_assoc($result)) {
                            //echo $row["productid"];
                            $oid=$row['orderid'];
                            $opid = $row["productid"];
                            //echo $opid;
                            $opname = $row["productname"];
                            $oprice = $row["price"];
                            $ourl = $row['url'];
                            $oqty = $row["qty"];
                            $ototal = $row['total'];
                            $emname = $row['emname'];
                            $date = $row['date'];
                            $uptodate = $row['uptodate'];
                            $status = $row['status'];
                            echo "
                            <tr>
                                <td class='bd'>$opname</td>
                                <td class='bd'><img class='pic' src='$ourl'></td>
                                <td class='bd'>\$ $oprice</td>
                                <td class='bd'>$oqty</td>
                                <td class='bd'>\$ $ototal</td>
                                <td class='bd'>$emname</td>
                                <td class='bd'>$date</td>
                                <td class='bd'>$uptodate</td>
                                <td class='bd'>$status</td>";
                                if ($status=='open'){
                                echo "<td><button type='submit' name='done' value='$oid'>Done!</button></td>";}
                            echo "</tr>";
//<input type="submit" name="save" value="Save" class="margin"><input type="button" value="Order" class="margin" onclick="order()">

                        }
                        echo "</table></center><br><br>";
                    }
                    ?>

                        <?php

                        if ($rownum < 1) { ?>
                        <script>
                            alert("You don't have orders, please go to cart to check out.");
                            document.location = "http://localhost/onlinestore/cart.php"
                        </script>
                        <?php 
                    }
                    ?>
            </form>
        </div>
        <?php
        include "profile.php"
        ?>
    </div>
</body>

</html>