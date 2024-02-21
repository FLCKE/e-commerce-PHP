<?php
session_start();
// a modifier pour l'instant je garde ca comme ca comme vos deucx base de donné ne sont pas identique 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basewahab";
$product_info;
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// finnn
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
    echo '<a href="cart.php" class="btn btn-primary">panier</a>';
    echo '<a href="product.php" class="btn btn-dark">menu</a>';
    echo '</body>';
    echo '</html>';
}else{
    echo "error : ". $conn->error;
}
echo $product_id;