<?php

$apiUrl1 ='http://localhost:8080/api/v1/putproduct?id=';


function putToApi($url, $id, $data) {
    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'PUT',
            'content' => json_encode($data),
        ],
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url . $id, false, $context);
    return $result;
}


// Exemple d'utilisation pour la mise à jour (PUT)
if (isset($_POST['action']) && $_POST['action'] === 'updateProduct') {
    // Récupérer l'ID du produit à mettre à jour
    $productId = $_POST['product_id'];

    // Récupérer les nouvelles données du formulaire
    $updatedData = [
        'product_name' => $_POST['product_name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'category' => $_POST['category'],
        'stock_quantity' => $_POST['stock_quantity'],
    ];

    // Appeler la fonction pour effectuer la requête PUT
    putToApi($apiUrl1, $productId, $updatedData);
}
