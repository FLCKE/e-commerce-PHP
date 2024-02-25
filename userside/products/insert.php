<?php

// Connexion à la base de données MySQL
$servername = "localhost";
$username = "root"; // Votre nom d'utilisateur MySQL
$password = ""; // Votre mot de passe MySQL
$dbname = "maillot_db"; // Votre nom de base de données MySQL

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lecture du fichier CSV
$csv_file = './test1.csv';
$urls = file($csv_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Lire les lignes du fichier CSV

echo "Contenu du tableau \$urls :<br>";
foreach ($urls as $url) {
    echo "$url<br>";
}

// Préparation de la requête SQL pour la mise à jour
$sql_update = "UPDATE product SET photo_data = ? WHERE category = 'Pays'";

// Préparation de la déclaration SQL
$stmt = $conn->prepare($sql_update);

// Vérification de la préparation de la déclaration
if ($stmt === false) {
    die("Erreur de préparation de la requête: " . $conn->error);
}

// Liaison des paramètres
// $stmt->bind_param("s", $photo_data);

// Exécution de la déclaration pour chaque URL
foreach ($urls as $url) {
    $photo_data = $url;
    $stmt->bind_param("s", $photo_data);
    
    if ($stmt->execute() === TRUE) {
        echo "URL mise à jour pour la catégorie 'Pays' : $url<br>";
    } else {
        echo "Erreur lors de la mise à jour de l'URL pour la catégorie 'Pays' : $url<br>";
    }
}

// Fermeture de la déclaration
$stmt->close();

// Fermeture de la connexion
$conn->close();

