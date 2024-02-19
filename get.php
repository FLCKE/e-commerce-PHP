<?php
$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "e_commerce2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Récupérer la catégorie sélectionnée
$category = $_POST['category'];


if($category === '') {
    $sql = "SELECT product_name, photo_data, price FROM product";
} else {
// Requête pour récupérer les produits de la catégorie spécifiée
$sql = "SELECT product_name, photo_data, price FROM product WHERE category = '$category'";
$result = $conn->query($sql);

}
$result = $conn->query($sql);

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
        echo '<img src="' . $row['photo_data'] . '" class="card-img-top" alt="Product Image" style="max-width: 150px;">';
        echo '<p class="card-text">' . $row['price'] . '<strong>$</strong>' . '</p>';
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


