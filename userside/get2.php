<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <!-- Ajout de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="product.css" type="text/css">
   
</head>
<body>

<div class="container mt-2 ">
    <span class="promotion mt-5 ">Nos meilleurs maillots</span>
    <div class="row justify-content-center">
    <?php
    include("./back-end/temp/database.php");
    $limit = 3; // Limite de produits à afficher
    
    $sql = "SELECT product_name, photo_data, price FROM product LIMIT $limit";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
       
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4">
                <div class="card  " style="background-color:#D7D1FF">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <img src="<?php echo $row['photo_data']; ?>" class="card-img-top" alt="Product Image" style="max-width: 200px;">
                        <p class="card-text"><?php echo $row['price']; ?> <strong>$</strong></p>
                    </div>
                    
                </div>
            </div>
            <?php
        }
    } else {
        echo 'No products found.';
    }
    $conn->close();
   
    ?>
    </div>
</div>

<!-- Ajout de Bootstrap JS (optionnel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
