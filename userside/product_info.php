<?php
// a modifier pour l'instant je garde ca comme ca comme vos deucx base de donné ne sont pas identique 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basewahab";
$product_info;
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// finnn
$sql = "SELECT product_name, description, price, category, photo_data FROM Product WHERE product_id=".$_GET['id'];
$result = $conn->query($sql);

// Récupération des informations d'un produit 
if ($row = $result->fetch_assoc()) {
  $product_info=$row;
} else {
    echo 'No products found.';
}

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
    <img src="<?php echo $product_info['photo_data']?>" alt="">
    <h1> Nom du produit :
        <?php  echo $product_info['product_name'] ?>
    </h1>
    <h1>
        Description :
        
    </h1>
        <p><?php echo $product_info['description'] ?></p>
    <h1>
        Price :
        <?php echo $product_info['price'] ?>
    </h1>
    <h1>Category
        <?php echo $product_info['category'] ?>
    </h1>
    <a href="add_cart.php?id=".<?php echo $_GET['id'] ?> > </a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Add to cart
  </button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="add_to_cart.php" method="post">
                    <label for="quantity"> Quantité</label>
                    <input type="number" name="quantity" id="quantity">
                    <input type="number" name="product_id" id="product_id" style="display:none" value=<?php echo $_GET['id'] ?>>
                <div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Annuler</button>
                    <button type="submit" class="btn btn-primary" > Ajouter</button>

                </div>
                </form>
            </div>

            </div>
    </div>
</div>
</body>
</html>