<?php
session_start();
include "conn.php";
if (isset($_POST['createsbmt'])) {
    //print_r($_POST);


        $pname=$_POST['pname'];
        $dsc= $_POST['dsc'];
        $price= $_POST['price'];
        $url= $_POST['url'];    
        $sql= "INSERT into products (productname,description,price,date,url) values ('$pname','$dsc','$price',sysdate(),'$url')";
        mysqli_query($connect,$sql);
        header ("location:productadmin.php");
        myalert("product created");

}


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
                <form action="createprod.php" method="POST" class="mg">
                    <fieldset>
                        <legend>Create Product Form</legend>
                        <br>
                        <table style="margin:0 auto;">
                            <tr><td>Product Name:</td><td><input type="text" name="pname" value="" required></td></tr>
                            <tr><td>Description:</td><td><textarea class="desc" name="dsc">New product, you can add later...</textarea></td></tr>
                            <tr><td>Price: </td><td><label>$</label><input type="number" name="price"  value="999.98" step="10" required></td></tr>
                            <tr><td>Pic Url:</td><td><input type="text" name="url" value="image/" ></td></tr>
                            <tr>
                                <td class="btn"><input type="submit" value="Create" name="createsbmt" ></td>
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