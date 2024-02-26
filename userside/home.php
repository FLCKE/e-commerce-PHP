<?php
// Set session cookie parameters
$cookieParams = session_get_cookie_params();
session_set_cookie_params([
    'lifetime' => 0, // Valid until the user closes the browser or logs out
    'path' => $cookieParams['path'],
    'domain' => '', // Set to an empty string or 'localhost' for local environment
    'secure' => false, // Set to false if not using HTTPS in the local environment
    'httponly' => true,
    'samesite' => 'Lax',
]);

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ./back-end/temp/login.php");
    exit();
}

// Check if the user has the 'user' role
if ($_SESSION['role'] !== 'user') {
    header("Location: access_denied.php"); // Redirect to an access denied page
    exit();
}

// Include your database connection file
include './back-end/temp/database.php';

// Query to retrieve user information
$query = "SELECT * FROM user WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    // Check if there is a matching user
    if ($row = mysqli_fetch_assoc($result)) {
        // User information found
        // ... Your code to display user information ...

        // Example: Display username
        $welcomeMessage = "Welcome, " . $row['username'];

    } else {
        // User not found
        $errorMessage = "User not found.";
    }
} else {
    // Database error
    $errorMessage = "Database error: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="products/product.css">

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
                        <a class="nav-link active  text-white fw-bold" aria-current="page" href="#">Acceuil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="./products/product.php">Nos produits</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="./order/order_history.php">Commande</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  text-white fw-bold" href="./contact/contact_us.php">Contactez-nous</a>
                        </li>
                    </ul>
                    <div >
                        <a href="./cart/cart.php" class="text-decoration-none mx-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </a>
                        <a href="./profil/user_profil.php" class="text-decoration-none">
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
             <form action="./products/product.php" method="post" class="d-flex">
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
<div>

</div>
<div class="mt-5 ">
    <div class=" text-center ">
        <!-- Inclusion du contenu de get1.php -->
        <?php include 'get1.php'; ?>
        <div class="text-center ">
                        <a class="btn btn-primary mt-2" href="./products/product.php">Voir plus</a>
        </div>
 
    </div>
</div>


<div class=" mt-5">
    <div class=" text-center">
       <div class="container custom-bg-white"> <!-- Inclusion du contenu de get1.php -->
        <?php include 'get2.php'; ?>
        <div class="text-center">
                       <a class="btn btn-primary mt-2" href="./products/product.php">Voir plus</a>
                    </div>
 
    </div>
    </div>

</body>
</html>
