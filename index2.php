
<!-- ... Votre code HTML ... -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                echo '<li>' . $product['product_name'] . ' - ' . $product['price'] . '</li>';
            }
        } else {
            echo 'No products found.';
        }
        // 
 ?>


</div>

</body>
</html>
