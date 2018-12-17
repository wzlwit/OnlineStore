<?php
$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect, "olstore");

function myalert($msg)
{
    echo "<html><body><script>alert('$msg')</script></body></html>";
}


function bck($link, $page)
{
    if ($link == $page) {
        echo "focus";
        return "focus";
    } else {
        echo "norm";
        return "norm";
    }

}
function sel()
{
    $connect = mysqli_connect("localhost", "root", "");
    mysqli_select_db($connect, "olstore");
    echo "<select name='slct[]'><option>select</option>";

    $sql = "SELECT name from accounts where type='employee';";

    $r = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($r)) {
        $emp=$row['name'];
        echo "<option value='$emp'>$emp</option>";
    }
    echo "</select>";
}
?>


<script>
    function order() {
        if (confirm("Confirm to order them and clear the cart?")) {
            document.location = "http://localhost/onlinestore/order.php?ordered=1";
        }
    }

    function clear() {
        if (confirm("Clear them?")) document.location = "http://localhost/onlinestore/cart.php";
    }
    function existed($lk){
        var link= "http://localhost/onlistore/"+$lk;
        confirm("Account already exits, try again"); document.location=$link;
    }
</script>