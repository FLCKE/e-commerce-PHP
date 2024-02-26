<?php 
session_start();
include ("../back-end/temp/database.php");
// Récupérer la catégorie sélectionnée


$sql = "SELECT  product.product_id, product_name, quantity, price, photo_data  FROM cart INNER JOIN product ON cart.product_id=product.product_id WHERE user_id=".$_SESSION['user_id'];
$user_id= $_SESSION['user_id'];

$result = $conn->query($sql);   
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $product_id= $row['product_id'];
        $quantity=$row['quantity'];
        $date_to_add=date("Y-m-d H:i:s");
        
        $sql2 = "INSERT INTO `command`( `user_id`, `product_id`, `quantity`, `order_date`, `status`) VALUES ('$user_id','$product_id','$quantity','$date_to_add','pending')";
        
        if($conn->query($sql2)==TRUE){
            header('Location: order_history.php');
            
        } else{
              echo 'error'.$conn->error;
        }
    }
    // $sql='DELETE FROM `cart` WHERE user_id='. $_SESSION['user_id'].'';
    // $conn->query($sql);
    if($conn->query($sql)) {
    } else {
        echo 'error : '.$conn->error;
    }   
}         
$conn->close();