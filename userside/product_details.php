<?php
session_start();

require_once 'database.php';

function getProductDetails($conn, $productId) {
    $query = "SELECT * FROM product WHERE product_id = $productId";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return null;
    }
}

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

$productId = isset($_GET['product_id']) ? $_GET['product_id'] : null;
$productDetails = getProductDetails($conn, $productId);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    /* Add your custom styles here */
    body {
        padding-top: 60px; /* Adjust based on your navbar height */
    }

    .container {
        margin-top: 40px;
    }

    .product-photo {
        width: 55%;
        float: left;
        margin-right: 5%;
    }

    .product-details {
        width: 40%;
        float: left;
    }

    .size-box {
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 20px;
    }

    .add-to-cart-button {
        margin-top: 20px;
        margin-bottom: 20px; /* Add margin to the bottom */
    }

    .delivery-info {
        display: flex;
        justify-content: space-between;
        border: 1px solid #ccc;
        padding: 20px;
        margin-top: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .inner-div {
        flex: 1;
        border: 1px solid #ccc;
        padding: 20px;
        text-align: center;
        margin: 10px;
        border-radius: 8px;
        background-color: #fff;
    }

    .inner-div p {
        margin-bottom: 10px;
    }

    /* Adjusted style for the fixed-bottom footer */
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Your Brand</a>
        <!-- Add your navigation links if needed -->
    </nav>

    <div class="container">
        <?php if ($productDetails): ?>
            <div class="product-photo">
                <img src="<?= $productDetails['photo_data'] ?>" alt="Product Photo" class="img-fluid">
            </div>
            <div class="product-details">
                <h2><?= $productDetails['product_name'] ?></h2>
                <p><strong>Price:</strong> $<?= $productDetails['price'] ?></p>
                <div class="size-box">
                    <p><strong>Available Sizes:</strong></p>
                    <label><input type="checkbox" value="S"> S</label>
                    <label><input type="checkbox" value="M"> M</label>
                    <label><input type="checkbox" value="L"> L</label>
                    <label><input type="checkbox" value="XS"> XS</label>
                    <label><input type="checkbox" value="XL"> XL</label>
                </div>
                <button class="btn btn-primary add-to-cart-button">Add to Cart</button>
                <br>

                <div class="delivery-info">
    <div class="inner-div">
        <p><i class="fa fa-home"></i>Enlèvement en magasin<strong>Gratuit</strong></p>
        <p>sous 24heures</p>

    </div>
    <div class="inner-div">
        <p><i class="fa fa-car"></i>Livraison standard à domicile <strong>Gratuit</strong></p>
        <p>Pour toute commande supérieure à 45 €</p>
    </div>
</div>

        <?php else: ?>
            <p>Product not found.</p>
        <?php endif; ?>
    </div>

    <footer class="footer fixed-bottom">
            <div class="row">
                <div class="col-md-12">
                    <p>Conditions générales d'achat • Politique de confidentialité • Politique de cookies • Mentions légales • Configurer les cookies • SiteMap</p>
                    <p>France | Français | © 2024 BERSHKA.</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
