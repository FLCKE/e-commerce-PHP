<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class=" text-center text-white" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" >
            <span class="fs-3">Livraison sur 14 jours ouvrés</span>
        </div>
        <nav class="navbar navbar-expand-lg bg-light  " style="background:url(../assets/wp6374416-football-pc-wallpapers.jpg) 50% 50%;">
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
                        <a class="nav-link  text-white fw-bold" href="../products/product.php">Nos produits</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="../order/order_history.php">Commandes</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="../contact/contact_us">Contactez-nous</a>
                        </li>
                    </ul>
                    <div >
                        <a href="#" class="text-decoration-none mx-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </a>
                        <a href="../user_profil.php" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
        </nav>
    </header>
    <main>
        <div>

            <?php include("./cart_items.php");?>
        </div>
        <div class="d-flex justify-content-around border-top">
            <h6>Total :</h6>
            <p><?php echo $total; ?> &#8364</p>
        </div>
       
        <div class="d-flex justify-content-evenly" >
            <a href="./delete_all_product.php" class="btn btn-danger"> Vider</a>
            <a href="../order/add_cart_to_history.php" class="btn btn-primary"> Payer maintenant</a>
        </div>
    </main>
    <footer class="footer mt-auto py-3 bottom-0">
        <div class=" text-center text-white mt-5 " style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" >
            <span class="fs-5">E-maillot  -  2024</span>
        </div>
   </footer>
</body>
</html>