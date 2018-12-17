<?php
session_start();
include 'conn.php';
if (isset($_POST['qty'])) {
    $len = count($_POST['qty']);


    if (isset($_SESSION['pid']) === false) {
        for ($i = 0; $i < $len; $i++) {
            if ($_POST['qty'][$i] > 0) {
                $_SESSION['qty'][] = $_POST['qty'][$i];
                $_SESSION['pid'][] = $_POST['pid'][$i];
                $leng = count($_SESSION['pid']);
                echo $_SESSION['pid'][$leng - 1] . " has qty: " . $_SESSION['qty'][$leng - 1] . "<br>";
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
                        $_POST['qty'][$i] = 0;
                        $_SESSION['pid'][$j] . " has qty: " . $_SESSION['qty'][$j] . "<br>";
                        $d = 0;
                    }
                }
                if ($d == 1) {
                    $_SESSION['qty'][] = $_POST['qty'][$i];
                    $_SESSION['pid'][] = $_POST['pid'][$i];
                    $l = count($_SESSION['pid']);
                    echo $_SESSION['pid'][$l - 1] . " has qty: " . $_SESSION['qty'][$l - 1] . "<br>";
                }
            }
        }
    }
}
?>
header("location:cart.php");
?>
