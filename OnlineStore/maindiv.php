<?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT productid, MAX(qtysum), url, description FROM ordersum WHERE userid=$id";
    $result = mysqli_query($connect, $sql);
//    $rn = mysqli_num_rows($result);
 //   if ($rn > 0) {
    $row = mysqli_fetch_assoc($result);
    if (isset($row['productid'])) {
        $fav = $row['productid'];
        $url[] = $row['url'];
        $dsc[] = $row['description'];
        $sql = "SELECT productid, url, description FROM top3 WHERE productid <> '$fav'";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $dsc[] = $row['description'];
            $url[] = $row['url'];
        }
    } else {
        $result = mysqli_query($connect, "SELECT productid, url, description FROM top3");
        while ($row = mysqli_fetch_assoc($result)) {
            $dsc[] = $row['description'];
            $url[] = $row['url'];
        }
    }

} else {
    $result = mysqli_query($connect, "SELECT productid, url, description FROM top3");
    while ($row = mysqli_fetch_assoc($result)) {
        $dsc[] = $row['description'];
        $url[] = $row['url'];
    }
}
?>
<div class="divmain">
    <div class="dt1">
        <img src="<?php echo $url[0] ?>" >
    </div>
    <div class="dt1">
        <p style="text-align:left"><?php echo $dsc[0] ?></p>
    </div>
    <hr class="s">
    <div class="about">
        <div class="dt1">
            <div class="dt2l">
            <img src="<?php echo $url[1] ?>">
            </div>
            <textarea readonly class="ta"><?php echo $dsc[1] ?>
            </textarea>
        </div>
        <div class="dt1">
            <div class="dt2l">
            <img src="<?php echo $url[2] ?>">
            </div>
            <textarea readonly class="ta"><?php echo $dsc[2] ?></textarea>
        </div>
    </div>
    <div class="about">
        <br>
        <br>
        <h3>About Us</h3>
        <p style="text-align:left">
            Bluetooth Online store is on of Canada's largest and most successful retailers. The Company offers consumers a unique shopping
            experience with the latest technology and entertainment products, plus an expanded assortment of bluetooth products
            offered through <a href="">www.blue.ca</a>, at the right price, with a no-pressure (non-commissioned)
            sales environment
        </p>

    </div>
</div>