<?php
session_start();    
$cart_id=$_GET['id'];
include ("../back-end/temp/database.php");
$sql='DELETE FROM `cart` WHERE user_id='. $_SESSION['user_id'].'';
$conn->query($sql);
if($conn->query($sql)) {
   header('Location:cart.php');
} else {
    echo 'error : '.$conn->error;
}