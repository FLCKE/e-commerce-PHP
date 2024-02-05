<?php


$apiUrl ='http://localhost:8080/api/v1/deleteproduct?id=';

function deleteToApi($url, $id) {
    $options = [
        'http' => [
            // 'header'  => "Content-type: application/json\r\n",
            'method'  => 'DELETE',
            // 'content' => json_encode($id),
            // 'header'  => "Content-Length: " . strlen(json_encode($id)) . "\r\n",     
        ],
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url . $id, false, $context);
    echo $result;
    return $result;
}


// Exemple d'utilisation pour la suppression (DELETE)
if (isset($_POST['action']) && $_POST['action'] === 'deleteProduct') {
    // Récupérer l'ID du produit à supprimer
    $productId = $_POST['product_id'];
    echo $productId;
    // Appeler la fonction pour effectuer la requête DELETE
    deleteToApi($apiUrl, $productId);
}



