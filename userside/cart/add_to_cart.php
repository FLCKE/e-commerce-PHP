<?php
session_start();
include ("../back-end/temp/database.php");
$product_id=$_POST['product_id'];
$quantity= $_POST['quantity'];
$date_to_add=date("Y-m-d H:i:s");   
$user_id=$_SESSION['user_id'];
$sql= "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`, `date_added`) VALUES ( '$user_id','$product_id','$quantity','$date_to_add' ) ";
if ($conn->query($sql)==TRUE) {
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>';
    echo '<title>Document</title>';
    echo '</head>';
    echo '<body>';
    echo '<div class="mt-5 text-center p-3   " style=" height:25%">';
    echo '<div  style="margin-top:20% " >';
    echo '<h5 class="my-3">Voullez vous allez au :</h5>';
    echo '<a href="cart.php" class="btn btn-primary mx-2">panier</a>';
    echo '<a href="../products/product.php" class="btn btn-dark mx-2">menu</a>';
    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}else{
    echo "error : ". $conn->error;
}