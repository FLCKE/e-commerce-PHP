<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Product Categories</title>
</head>
<body>

<nav class="navbar navbar-expand-lg my-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">JerseyShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index1.html">Home</a>
                <a class="nav-link" href="contact.html" target="_blank">Contact</a>
            </div>
        </div>
    </div>
</nav>

<form method="post">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Category
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button class="dropdown-item" type="submit" name="category" value="Premier League">Premier League jerseys</button>
            <button class="dropdown-item" type="submit" name="category" value="Serie A">Serie A jerseys</button>
            <button class="dropdown-item" type="submit" name="category" value="La Liga">Liga</button>
            <button class="dropdown-item" type="submit" name="category" value="Ligue 1">Ligue 1 jerseys</button>
            <button class="dropdown-item" type="submit" name="category" value="Pays">Countries jerseys</button>
            <button class="dropdown-item" type="submit" name="category">All jerseys</button>
        </div>
    </div>
</form>

<!-- Afficher les produits après soumission du formulaire -->
<?php
// Vérifier si le formulaire a été soumis
if(isset($_POST['category'])) {
    
    $category = $_POST['category'];
    
    // Inclure le fichier pour afficher les produits
      
    include 'get.php';
}
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
