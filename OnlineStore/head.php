<div class="h">
    <h1>Wireless Connection to Future</h1>
    <h2>--Bluetooth Online Store</h2>
</div>
<br>
    <center>
    <nav style="margin-right:20%">
        <ul>
            <li><a href="homepage.php">Home</a></li>

            <?php
            if (isset($_SESSION['type'])) {
                switch ($_SESSION['type']) {
                    case "admin":
                        echo "
                        <li><a href='productadmin.php'>Products</a></li>
                        <li><a href='orderadmin.php'>Orders</a></li>
                        <li><a href='Acc.php'>Accounts</a></li>
                        ";
                        break;
                    case "customer":
                        echo "
                        <li><a href='product.php'>Products</a></li>
                        <li><a href='cart.php'>Cart</a></li>
                        <li><a href='order.php'>Orders</a></li>
                        ";
                        break;
                    case "employee":
                        echo "
                        <li><a href='productemp.php'>Products</a></li>
                        <li><a href='orderemp.php'>Orders</a></li>
                        ";
                        break;
                }
            } else {
                echo "
                <li><a href='product.php'>Products</a></li>
                <li><a href='cart.php'>Cart</a></li>
                ";
            }
            ?>
        </ul>
    </nav>
</center>
<hr class="dot2">

        