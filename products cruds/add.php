<?php



$apiUrl = 'http://localhost:8080/api/v1/addproduct';

// Fonction pour effectuer une requête POST à l'API
function postToApi($url, $data) {
    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

// Si une action est soumise (ajout de produit)
if (isset($_POST['action']) && $_POST['action'] === 'addProduct') {
    // Récupérer les données du formulaire
    $productName = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $stockQuantity = $_POST['stock_quantity'];

    // Construire les données pour la requête POST
    $postData = [
        'product_name' => $productName,
        'description' => $description,
        'price' => $price,
        'category' => $category,
        'stock_quantity' => $stockQuantity,
    ];

    // Appeler la fonction pour effectuer la requête POST
    postToApi($apiUrl, $postData);
}

// Fonction pour effectuer une requête GET à l'API
function getFromApi($url) {
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// Récupérer la liste des produits depuis l'API
// $products = getFromApi($apiUrl);


     
        // Include your PHP functions for retrieving products
        // include 'products.php';

        // Display the product list
        // $products = readProducts();
        // foreach ($products as $product) {
        //      echo '<li>' . $product->product_name . ' - ' . $product->price . '</li>';
        //  }
        // 
 
