<?php
    error_reporting(E_ALL);
   
    $url="http://localhost:8080/api/v1/putproduct?id=".$_POST["product_id"];

    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    $data=array('product_name' => $_POST["product_name"], 'description' => $_POST["description"], 'price' => $_POST["price"], 'category' => $_POST["category"], 'stock_quantity' => $_POST["stock_quantity"]);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    $reponse=curl_exec($curl);

    curl_close($curl);
    echo $reponse;
    echo curl_getinfo($curl, CURLINFO_HTTP_CODE);