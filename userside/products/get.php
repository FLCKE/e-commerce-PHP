<?php
include ("../back-end/temp/database.php");

if (isset($_POST['category'])) {
    $category = $_POST['category'];

    if($category === '') {
        $sql = "SELECT product_id, product_name, photo_data, price FROM product";
    } else {
    // Requête pour récupérer les produits de la catégorie spécifiée
    $sql = "SELECT product_id, product_name, photo_data, price FROM product WHERE category = '$category'";
    $result = $conn->query($sql);

    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
    
        $count = 0; // Initialisation du compteur pour trois cards parlignes
        while($row = $result->fetch_assoc()) {
            if ($count % 4 == 0) { // Ouverture d'une nouvelle ligne chaque fois que le compteur est un multiple de 3
                echo '</div><div class="row justify-content-center">';
            }
            echo '<div class="col-md-3">';
            echo '<section class="main py-2">';
            echo '<div class="card shadow " style="background-color:#D7D1FF">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';
            echo '<img src="' . $row['photo_data'] . '" class="card-img-top" alt="Product Image" style="max-width: 200px;">';
            echo '<p class="card-text">' . $row['price'] . '<strong>$</strong>' . '</p>';

            
            echo '<a href="product_info.php?id='.$row['product_id'].'" class="btn btn-primary w-75">Voir plus</a>';;
            echo '</div>';
            echo '</div>';
            
            echo '</div>';
            echo '</section>';
            
            $count++; // Incrémenter le compteur
        }

    } else {
        echo 'No products found.';
    }
    echo '</div>';
    echo '</div>';


    $conn->close();


}else  {
     $category = 'Ligue 1';


    if($category === '') {
        $sql = "SELECT product_id, product_name, photo_data, price FROM product";
    } else {
    // Requête pour récupérer les produits de la catégorie spécifiée
    $sql = "SELECT product_id, product_name, photo_data, price FROM product WHERE category = '$category'";
    $result = $conn->query($sql);

    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
    
        $count = 0; // Initialisation du compteur pour trois cards parlignes
        while($row = $result->fetch_assoc()) {
            if ($count % 4 == 0) { // Ouverture d'une nouvelle ligne chaque fois que le compteur est un multiple de 3
                echo '</div><div class="row justify-content-center">';
            }
            echo '<div class="col-md-3">';
            echo '<section class="main py-2">';
            echo '<div class="card shadow " style="background-color:#D7D1FF">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';
            echo '<img src="' . $row['photo_data'] . '" class="card-img-top" alt="Product Image" style="max-width: 200px;">';
            echo '<p class="card-text">' . $row['price'] . '<strong>$</strong>' . '</p>';

            
            echo '<a href="product_info.php?id='.$row['product_id'].'" class="btn btn-primary w-75">Voir plus</a>';;
            echo '</div>';
            echo '</div>';
            
            echo '</div>';
            echo '</section>';
            
            $count++; // Incrémenter le compteur
        }

    } else {
        echo 'No products found.';
    }
    echo '</div>';
    echo '</div>';


    $conn->close();

}
