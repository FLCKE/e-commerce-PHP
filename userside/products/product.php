<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
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
        <div class=" text-center text-white" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" >
            <span class="fs-3">Livraison sur 14 jours ouvrés</span>
        </div>
       
</header>

<div class="banniere">
 <nav class="navbar navbar-expand-lg  " >
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="../home.php">E-maillot</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav text-center me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active  text-white fw-bold" aria-current="page" href="../home.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="#">Nos produits</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="../order/order_history.php">Commande</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="../contact/contact_us.php">Contactez-nous</a>
                        </li>
                    </ul>
                    <div >
                        <a href="../cart/cart.php" class="text-decoration-none mx-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </a>
                        <a href="../user/user_profil.php" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
                </nav>

<!-- Boîte de recherche -->
<div class="container mt-5 custom-search-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group custom-search-input ">
                <form action="./product.php" method="post" class="d-flex">
                    <select class="form-select" name="category" aria-label="Default select example">
                        <option selected>Choisisez votre catégories</option>
                        <option value="Premier League">Premier League jerseys</option>
                        <option value="Serie A">Serie A jerseys</option>
                        <option value="La Liga">Liga</option>
                        <option value="Ligue 1">Ligue 1 jerseys</option>
                        <option value="Pays">Countries jerseys</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary custom-search-button" type="submit" id="button-addon2">Rechercher</button>
                    </div>
                </form>
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
                <button class="dropdown-item " type="submit" name="category" value="Pays">Countries jerseys</button>
                <button class="dropdown-item " type="submit" name="category" >All jerseys</button>
            </div>
        </div>
    </form>
    

    <div class="mt-5">
    <div class=" text-center">
   <?php
    // Vérifier si le formulaire a été soumis
    
    // Inclure le fichier pour afficher les produits
    
    if(isset($_POST['category'])) {
        
        $category = $_POST['category'];
        include 'get.php';
    }else{
        include 'get.php';
    }
    ?>
    
    </div>

<footer>
    <div class=" text-center text-white" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" >
            <span class="fs-5">E-maillot  -  2024</span>
        </div>
</footer>
 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
