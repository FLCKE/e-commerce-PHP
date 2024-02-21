<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basewahab";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Récupérer la catégorie sélectionnée


$sql = "SELECT product_name, quantity , price, photo_data, cart_id  FROM cart INNER JOIN product ON cart.product_id=product.product_id WHERE user_id=".$_SESSION['user_id'];

$result = $conn->query($sql);

// Affichage des produits
if ($result->num_rows > 0) {
    echo '<div class="container">';
    echo '<div class="row">';
   
    $count = 0; // Initialisation du compteur
    while($row = $result->fetch_assoc()) {
        if ($count % 3 == 0) { // Ouverture d'une nouvelle ligne chaque fois que le compteur est un multiple de 3
            echo '</div><div class="row">';
        }
        echo '<div class="col-md-4">';
        echo '<section class="main py-2">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';
        echo '<img class="card-img-top">'.$row['photo_data'] . ' </img>';
        echo '<h5>'.$row['quantity'] . ' </h5>';
        echo '<p class="card-text">' . $row['price']*$row['quantity']  . '</p>';
        echo '<a class="btn btn-danger" href="delete_product_to_cart.php?id='.$row['cart_id'].'">delete</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        $count++; // Incrémenter le compteur
    }

} else {
    echo 'No products found.';
}
echo '</div>';
echo '</div>';


$conn->close();