<?php

// Connexion à la base de données MySQL
$servername = "localhost";
$username = "sqluser"; // Votre nom d'utilisateur MySQL
$password = "password"; // Votre mot de passe MySQL
$dbname = "e_commerce2"; // Votre nom de base de données MySQL

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lecture du fichier CSV
$data = fopen('./test1.csv', 'r');

// Lecture du fichier CSV ligne par ligne
$firstLineSkipped = false;
while (($url = fgets($data)) !== FALSE) {
    // Ignorer la première ligne si elle contient des en-têtes
    if (!$firstLineSkipped) {
        $firstLineSkipped = true;
        continue;
    }
    
    // Supprimer les espaces et les sauts de ligne supplémentaires
    $url = trim($url);
    
    // Ajouter l'URL de l'image à la base de données
    $sql_insert = "INSERT INTO product (photo_data) VALUES ('$url')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "URL insérée : $url<br>";
    } else {
        echo "Erreur lors de l'insertion de l'URL : $url<br>";
    }
}

// Fermeture de la connexion
$conn->close();
fclose($data);



