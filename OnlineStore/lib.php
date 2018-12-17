<?php
/*

function sel($em)
{
    echo "<select name='select[]'><option value=''>select</option>";
    $sql = "SELECT username from accounts where type='employee'";
    $r = mysqli_query($connect, $sql);
    echo 'good';
    while (mysqli_fetch_assoc($r)) {
        $emp = $r['username'];
        echo $r['username'];
        if($emp==$em){
            echo "<option value='$emp' selected>$emp</option>";

        }else{
            echo "<option value='$emp'>$emp</option>";
        }

    }

    echo "</select>";
}
*/


/*
function nav($page)
{
    ?>
<nav style="padding-left:25%">
    <ul>
        <li><a href="homepage.php" class="<?php bk('homepage', $page); ?>">Home</a></li>
        <li><a href="product.php" class="<?php bk('product', $page); ?>">Products</a></li>
        <?php
if (isset($_SESSION['type'])) {
    switch ($_SESSION['type']) {
        case "admin":
            echo "
                <li ><a href='order.php' class='bk('order', $page)'>Orders</a></li>
                <li><a href='Acc.php'class='bk('Acc', $page)'>Accounts</a></li>
                ";
            break;
        case "customer":
        case "employee":
            echo "
                <li><a href='cart.php'class='bk('cart', $page)'>Cart</a></li>
                <li><a href='order.php' class='bk('order', $page)'>Orders</a></li>";
            break;
    }
}
echo "</ul></nav><hr class='dot2'>";
?>
*/