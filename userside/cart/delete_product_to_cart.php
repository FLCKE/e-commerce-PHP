<?php
$cart_id=$_GET['id'];
include ("../back-end/temp/database.php");
$sql='DELETE FROM `cart` WHERE cart_id='. $cart_id.'';
$conn->query($sql);
if($conn->query($sql)) {
   header('Location:cart.php');
} else {
    echo 'error : '.$conn->error;
}