<?php
session_start();


require_once 'database.php';

// Function to fetch products based on category
function getProductsByCategory($conn, $category) {
    $query = "SELECT * FROM product WHERE category = '$category'";
    $result = mysqli_query($conn, $query);

    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Add product details with photo_data as is
        $productDetails = [
            'product_id' => $row['product_id'],
            'product_name' => $row['product_name'],
            'price' => $row['price'],
            'photo_data' => $row['photo_data'],
        ];

        $products[] = $productDetails;
    }

    return $products;
}

// Check the connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Fetch products with category "Premier League"
$premierLeagueProducts = getProductsByCategory($conn, 'Ligue 1');

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Welcome to Finance Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    
    <style>
        .product-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 15px;
            text-align: center;
            display: flex;
            flex-direction: column;
        }

        .product-photo {
            width: 100%;
            height: 33%; /* Set the height to one-third of the box height */
            object-fit: contain; /* Maintain aspect ratio and fit within the container */
            object-position: center; /* Center the image within the container */
            margin-bottom: 10px;
        }

        .product-details {
            height: 67%; /* Set the height for the price and product name */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-name,
        .product-price {
            margin: 5px 0;
        }

  /* Add your custom styles here */
   /* Add your custom styles here */
   .footer {
        background-color: #f8f9fa; /* Bootstrap background color */
        padding: 20px 0;
        text-align: center;
    }

    .footer p {
        margin-bottom: 5px;
    }

    </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <!-- Left side of the navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="service_client.php">
                        <i class="fa fa-phone"></i> Service Client
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-newspaper-o"></i> Newsletter
                    </a>
                </li>
            </ul>

            <!-- Brand logo in the middle -->
            <a class="navbar-brand mx-auto" href="#" style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #fff; text-transform: uppercase;">
                Jersey.Club
            </a>
            <!-- Right side of the navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <i class="fa fa-user"></i> Connexion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-heart"></i> Favoris
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-shopping-cart"></i> Panier
                    </a>
                </li>
                <li class="nav-item">
                    <?php
                        if (isset($_SESSION['user_id'])) {
                            // Display the logout button with an icon for connected users
                            echo '<a href="logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>';
                        }
                    ?>
                </li>

            </ul>
        </div>
    </nav>

     <!-- Categories beneath the navbar -->
     <div class="container mt-3">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="./alluserproduct.php">
                <img src="https://cdn-icons-png.flaticon.com/128/5129/5129670.png" alt="England Flag" width="20" height="20">
All
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Premierleague.php">
                <img src="https://cdn-icons-png.flaticon.com/128/4060/4060230.png" alt="England Flag" width="20" height="20">
Premier League
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./laliga.php">
                <img src="https://cdn-icons-png.flaticon.com/128/13980/13980354.png" alt="England Flag" width="20" height="20">
 La Liga
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./bundesliga.php">
                <img src="https://cdn-icons-png.flaticon.com/128/197/197571.png" alt="England Flag" width="20" height="20">
 Bundesliga
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <img src="https://cdn-icons-png.flaticon.com/128/323/323325.png" alt="England Flag" width="20" height="20">
Serie A
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./ligue1.php">
                <img src="https://cdn-icons-png.flaticon.com/128/323/323315.png" alt="England Flag" width="20" height="20">
Ligue 1
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./liganos.php">
                <img src="https://cdn-icons-png.flaticon.com/128/5372/5372974.png" alt="England Flag" width="20" height="20">
Liga NOS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./eredivise.php">
                <img src="https://cdn-icons-png.flaticon.com/128/323/323275.png" alt="England Flag" width="20" height="20">
Eredivisie
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./pays.php">
                <img src="https://cdn-icons-png.flaticon.com/128/814/814513.png" alt="England Flag" width="20" height="20">
 Pays
                </a>
            </li>
        </ul>
    </div>


   <!-- Fetch and display products based on category -->
   <div class="container mt-4">
        <h2 class="mb-4">Ligue 1 Products</h2>
        <div class="row">
            <?php foreach ($premierLeagueProducts as $product) : ?>
                <div class="col-md-4">
                    <div class="product-box">
                        <img src="<?= $product['photo_data'] ?>" alt="Product Photo" class="product-photo">
                        <div class="product-details">
                            <h4 class="product-name"><?= $product['product_name'] ?></h4>
                            <p class="product-price"><strong>Price:</strong> $<?= $product['price'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer fixed-bottom">
            <div class="row">
                <div class="col-md-12">
                    <p>Conditions générales d'achat • Politique de confidentialité • Politique de cookies • Mentions légales • Configurer les cookies • SiteMap</p>
                    <p>France | Français | © 2024 BERSHKA.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <!-- Use the full version of jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
        // Adjust content padding based on navbar and footer height
        var navbarHeight = $('.navbar').outerHeight();
        var footerHeight = $('.footer').outerHeight();
        $('body').css('padding-top', navbarHeight);
        $('body').css('padding-bottom', footerHeight);
    </script>

</body>
</html>
