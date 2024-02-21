<?php
$cart_id=$_GET['id'];
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
$sql='DELETE FROM `cart` WHERE cart_id='. $cart_id.'';
$conn->query($sql);
if($conn->query($sql)) {
   header('Location:cart.php');
} else {
    echo 'error : '.$conn->error;
}