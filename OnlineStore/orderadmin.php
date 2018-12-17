<?php
session_start();
include 'conn.php';


if (isset($_POST['save'])) {
    //echo "submitted";
    $olen = count($_POST['slct']);
    for ($i = 0; $i < $olen; $i++) {
        if (($_POST['slct'][$i] != 'select') && (!empty($_POST['slct'][$i]))) {
            $oid = $_POST['oid'][$i];
            $emp = $_POST['slct'][$i];
            echo $oid.$emp;
            $sql = "UPDATE orders SET emname='$emp', uptodate=sysdate() where orderid='$oid'";
            //echo $emp;
            mysqli_query($connect, $sql);
        }
    }
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
            <form action="orderadmin.php" method="POST">
                <center>
                    <table class='bd'>
                        <th class='bd'>Product</th>
                        <th class='bd'>Picture</th>
                        <th class='bd'>Price</th>
                        <th class='bd'>Qty</th>
                        <th class='bd'>Total</th>
                        <th class='bd'>Handled By</th>
                        <th class='bd'>Order Date</th>
                        <th class='bd'>Last Update</th>
                        <th class='bd'>Status</th>
                        <?php
                        if ($_SESSION['type'] == 'admin') {

                            $query = "SELECT orderid, o.productid, p.productname, o.price, p.url, o.qty, o.total, o.emname, o.date, o.uptodate, o.status FROM orders o,products p Where o.productid=p.productid order by o.date desc";

                            $result = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                            //echo $row["productid"];
                                $oid = $row["orderid"];
                            //echo $oid;
                                $opname = $row["productname"];
                                $oprice = $row["price"];
                                $ourl = $row['url'];
                                $oqty = $row["qty"];
                                $ototal = $row['total'];
                                $empname = $row['emname'];
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
                                <td class='bd'>";
                                if (isset($row['emname']) && (!empty($row['emname']))) {
                                    echo $empname;
                                } else {
                                    sel();
                                }
                                echo "
                                <td class='bd'>$date</td>
                                <td class='bd'>$uptodate</td>
                                <td class='bd'>$status <input type='hidden' name='oid[]' value='$oid'></td>
                            </tr>
                            ";
                            } ?>
                    </table><input type='submit' name='save' value='Save' class='margin'> </center>
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