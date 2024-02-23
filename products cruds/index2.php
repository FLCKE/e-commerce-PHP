
<!-- ... Votre code HTML ... -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <!-- <link rel="stylesheet" href="styles.css" type="text/css"> -->
    
    
    <title>Product Dashboard</title>
</head>
<body>

    <h1>Product Dashboard</h1>

    <!-- Form to add a new product -->
    <form method="post" action="add.php">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required>
        <label for="productDescription">Product Description:</label>
        <textarea name="description" required></textarea>
        <label for="productPrice">Product Price:</label>
        <input type="number" name="price" required>
        <label for="category">Category:</label>
        <input type="text" name="category" required>
        <label for="stock_quantity">Instock:</label>
        <input type="number" name="stock_quantity" required>
        <!-- Add more fields as needed -->

        <button type="submit" name="action" value="addProduct">Add Product</button>
    </form>
   
<div> 
  <ul>  
<!-- Formulaire de suppression -->
<form  method="post" action="delete.php">
    <!-- Champs nécessaires pour identifier le produit à supprimer -->
    <!-- <input type="hidden" name="action" value="deleteProduct"> -->
    <label for="product_id">ID du produit à supprimer :</label>
    <input type="number" name="product_id" required>
    <button type="submit" name="action" value="deleteProduct" >Supprimer le produit</button>
</form>
</ul>
</div>



<div> 

Formulaire de mise à jour
<form action="update.php" method="post">
    Champs nécessaires pour identifier le produit à mettre à jour
    <input type="hidden" name="action" value="updateProduct">
    <label for="product_id">ID du produit à mettre à jour :</label>
    <input type="text" name="product_id" required>
    
    Champs pour les nouvelles données
    <label for="product_name">Nouveau nom du produit :</label>
    <input type="text" name="product_name" required>
    <label for="description">Nouvelle description :</label>
    <textarea name="description" required></textarea>
    <label for="price">Nouveau prix :</label>
    <input type="number" name="price" required>
    <label for="category">Nouvelle catégorie :</label>
    <input type="text" name="category" required>
    <label for="stock_quantity">Nouvelle quantité en stock :</label>
    <input type="number" name="stock_quantity" required>

    <button type="submit" name="action" value="updateProduct">Mettre à jour le produit</button>
</form>

</div>


    
    <!-- Product list -->
   <div> 
<?php
    // Include your PHP functions for retrieving products
        include 'add.php';
        $apiUrl = 'http://localhost:8080/api/v1/inventory';
         
        // Display the product list
        $products = getFromApi($apiUrl);
        // $products = readProducts();
        
        if (!empty($products) && is_array($products)) {
            foreach ($products as $product) {
                echo '<div class="container">';
                echo '<div class="row">';
                // echo '<div class="col-md-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $product['product_name'] . '</h5>';
                echo '<p class="card-text">' . $product['price'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No products found.';
        }
        
        
        // 
 ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>



</div>

</body>
</html>
