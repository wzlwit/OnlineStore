<?php
session_start();
include 'conn.php';

if (isset($_POST['clearsbmt'])) {
    unset($_SESSION['pid'], $_SESSION['qty'],$_SESSION['prc']);
    header("location:product.php");
}

if (isset($_POST['save'])) {
    unset($_SESSION['pid'], $_SESSION['qty'],$_SESSION['prc']);
}



if (isset($_POST['qty'])) {
    $len = count($_POST['qty']);


    if (isset($_SESSION['pid']) === false) {
        for ($i = 0; $i < $len; $i++) {
            if ($_POST['qty'][$i] > 0) {
                $_SESSION['qty'][] = $_POST['qty'][$i];
                $_SESSION['pid'][] = $_POST['pid'][$i];
                $_SESSION['prc'][] = $_POST['prc'][$i];
                $leng = count($_SESSION['pid']);
                //echo $_SESSION['pid'][$leng - 1] . " has qty: " . $_SESSION['qty'][$leng - 1] . "<br>";
            }
        }
    } else {
        for ($i = 0; $i < $len; $i++) {
            if ($_POST['qty'][$i] > 0) {
                $d = 1;//put into a new element; 0 means same product id already exists and updated.
                $pidlen = count($_SESSION['pid']);
                for ($j = 0; $j < $pidlen; $j++) {
                    if ($_POST['pid'][$i] == $_SESSION['pid'][$j]) {
                        $_SESSION['qty'][$j] += $_POST['qty'][$i];
                        //echo $_SESSION['pid'][$j] . " has qty: " . $_SESSION['qty'][$j] . "<br>";
                        $d = 0;
                    }
                }
                if ($d == 1) {
                    $_SESSION['qty'][] = $_POST['qty'][$i];
                    $_SESSION['pid'][] = $_POST['pid'][$i];
                    $_SESSION['prc'][] = $_POST['prc'][$i];
                    $l = count($_SESSION['pid']);
                    echo $_SESSION['pid'][$l - 1] . " has qty: " . $_SESSION['qty'][$l - 1] . "<br>";
                }
            }
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
        <div class="divmain" >
            <form action="cart.php" method="POST">
                <center>
                    <?php
                    if (isset($_SESSION['pid'])) { ?>
                    <table class='bd'><th class='bd'>Product</th><th class='bd'>Price</th><th class='bd'>picture</th><th class='bd'>Quanty</th><th class='bd'>Total</th>
                        <?php
                        $len = count($_SESSION['pid']);
                        for ($i = 0; $i < $len; $i++) {
                            $pid = $_SESSION['pid'][$i];
                            $query = "SELECT * FROM products WHERE productid ='$pid'";
                            $result = mysqli_query($connect, $query);
                            if ($row = mysqli_fetch_assoc($result)) {
                                $pid = $row["productid"];
                                $name = $row["productname"];
                                $price = $row["price"];
                                $_SESSION['prc'][]=$price;
                                $url = htmlspecialchars($row["url"]);
                                $total = $price * $_SESSION['qty'][$i];
                                $qty = $_SESSION['qty'][$i];
                                echo "<tr><td class='bd'>$name</td><td class='bd'><label>\$</label><input class='num' type='text' readonly name='prc[]' value='$price'><td class='bd'><img class='pic' src='$url'></td><td class='bd'><input type='number' min='0' class='num' name ='qty[]' value='$qty'><input type='hidden' name='pid[]' value='$pid'></td><td class='bd'><label>$</label><input type='text' readonly id='ipt$i' value='$total' class='num'></td></tr>";
                            }
                        }
                        ?>
                    </table>
                       <!-- <input type="reset" name="reset" value="Reset" class="margin">-->
                        <input type="submit" name="save" value="Save" class="margin">
                        <input type="button" name="ordersbmt" value="Order" class="margin" onclick="order()">
                    <?php
                      } else { ?> 
                    <script>
                        alert("Nothing in Cart, please select and put them in cart.");
                        document.location="http://localhost/onlinestore/product.php"
                    </script>
                <?php 
            } ?>
            </form>
        </div>
        <?php
        include "profile.php"
        ?>
    </div>
</body>

</html>
