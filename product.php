<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <!-- Ajout de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="product.css" type="text/css">
   
   <style>
        /* Styles CSS pour la mise en page */
      
    </style>
</head>
<body>

<header>
    Livraison sous 14 jours ouvrés
</header>

<div class="banniere">
<nav>
    <span class="emaiillot">E-maillot</span>
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Nos Produits</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contactez-nous</a></li>
    <!-- </ul> -->
    <a  href="#" class="cart"><i class="bi bi-cart"></i></a>
    <a  href="#" class="user"><i class="bi bi-person"></i></a>
  </ul>
  </nav>

<!-- Boîte de recherche -->
<div class="container mt-5 custom-search-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group custom-search-input">
                <input type="search" class="form-control" placeholder="Entrez le nom de votre équipe" aria-label="Rechercher" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-success custom-search-button" type="button" id="button-addon2">Rechercher</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<!-- Formulaire de catégories -->
    <form method="post" class="mt-3">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Jerseys Category
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
    

    <div class="mt-5">
    <div class=" text-center">
   <?php
    // Vérifier si le formulaire a été soumis
    if(isset($_POST['category'])) {
        
        $category = $_POST['category'];
        
        // Inclure le fichier pour afficher les produits
          
        include 'get.php';
    }
    ?>
    </div>
    </div>

<footer class="mt-5">
<div class="footer-content">
        <!-- Contenu de votre footer ici -->
    </div>
</footer>
  <!-- Votre contenu de page ici -->

<!-- Ajout de Bootstrap JS (optionnel) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
