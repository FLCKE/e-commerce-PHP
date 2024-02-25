<?php
session_start();
include ("../database.php");
// Récupérer la catégorie sélectionnée


$sql = "SELECT  product_name, quantity, order_date, status, price, photo_data, order_id FROM command INNER JOIN product ON command.product_id=product.product_id WHERE user_id=".$_SESSION['user_id'];

$result = $conn->query($sql);
$total=0;
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
        echo '<div class="d-flex ">';
        echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';
        echo '<p class="badge bg-primary ms-2"> ' . $row['status']  . ' </p>';
        echo '</div>';
        echo '<img class="card-img-top" src="'.$row['photo_data'] . '">';
        echo '<h5> Quantité : '.$row['quantity'] . ' </h5>';
        echo '<p class="card-text"> Prix : ' . $row['price']*$row['quantity']  . ' &#8364</p>';
        echo '<h6 class="card-text"> Du ' . $row['order_date'] . ' </h6>';
        echo '<h6 class="card-text"> Commande#' . $row['order_id'] . ' </h6>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        $count++; // Incrémenter le compteur
    }

} else {
    echo '<div class="text-center fs-1 my-5">';
    echo '<p>historique vide </p>';
    echo '</div>';
}
echo '</div>';
echo '</div>';


$conn->close();