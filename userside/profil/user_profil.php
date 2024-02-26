<?php
session_start();
include ("../back-end/temp/database.php");

    $user_id = $_SESSION['user_id'];
    

    // requette sql pour récuperer l'address de l'utilisateur 
    $query = "SELECT * FROM address WHERE user_id = ?";
    
    // Use prepared statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        
        if ($row = mysqli_fetch_assoc($result)) {
            
            if ($row) {
                
                $_SESSION['street_address'] = $row['street_address'];
                $_SESSION['city'] =$row['city'];
                $_SESSION['state'] = $row['state'];
                $_SESSION['postale_code'] = $row['postale_code'];
                $_SESSION['country'] = $row['country'];
            } else {
                exit();
            }
        } else {
            // addresse not found
            $_SESSION['street_address'] = 'None';
            $_SESSION['city'] ='None';
            $_SESSION['state'] = 'None';
            $_SESSION['postale_code'] = 'None';
            $_SESSION['country'] = 'None';
           
            // exit();
        }
    } else {
        // Database error
        $_SESSION['login_error'] = "Database error: " . mysqli_error($conn);
       
        exit();
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
     <header>
        <div class=" text-center text-white" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" >
            <span class="fs-3">Livraison sur 14 jours ouvrés</span>
        </div>
        <nav class="navbar navbar-expand-lg bg-light  " style="background:url(../assets/wp6374416-football-pc-wallpapers.jpg) 50% 50%;">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#">E-maillot</a>
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
                        <a href="#" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
                </nav>
    </header>
    <section class=" row m-5">
        <div class="col-3  shadow w-25 text-center p-1">
           <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>
            <button class="btn btn-primary w-75">
                Modifier
            </button>
        </div>
        <div class="col">
            <div class=" w-75 p-5 m-auto shadow ">
                <div class="d-flex fs-5 justify-content-between ">
                    <div class=" d-flex ">
                        <h4 class="me-2">Firstname :</h4>
                        <?php
                        $first_name=$_SESSION['first_name'] ;
                        echo "<span>$first_name</span>";
                        ?>
                    </div>
                    <div class="d-flex">
                        <h4 class="me-2">Lastname :</h4>
                        <?php
                        $last_name=$_SESSION['last_name'] ;
                        echo "<span>$last_name</span>";
                        ?>
                    </div>
                    <!-- <div class="d-flex fs-5 "> -->
                </div>
                <div class="d-flex fs-5 justify-content-between my-3 ">
                    <div class="d-flex ">
                        <h4 class="me-2">Email :</h4>
                        <?php
                        $email=$_SESSION['email'] ;
                        echo "<span>$email</span>";
                        ?>
                    </div>
                    <div class="d-flex ">
                        <h4 class="me-2">Username :</h4>
                       <?php
                        $username=$_SESSION['username'] ;
                        echo "<span>$username</span>";
                        ?>
                    </div>
                    <!-- <div class="d-flex fs-5 "> -->
                </div>
                <div class="fs-5 my-3 d-flex">
                    <h4 class="me-2">Phone Number :</h4>
                       <?php
                        $phone_number=$_SESSION['phone_number'] ;
                        echo "<span>$phone_number</span>";
                        ?>
                </div>
                <div class="text-center mt-4 pt-2">
                    <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#exampleModal">
                           Modifier
                    </button>
                </div>
                <!-- Button trigger modal -->
               
    
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification du profil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <form action="update_user.php" method="post">
                                 <div class="d-flex fs-5 justify-content-between my-2">
                                    <div class=" d-flex mx-5">
                                        <label for="username">Username:</label>
                                        <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required>
                                    
                                    </div>
                                    <div class="d-flex mx-4 ">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
                                        
                                    </div>
    
                                </div>
                                 <div class="d-flex fs-5 justify-content-between px-5 my-5">
                                    <div class=" d-flex ">
                                        <label for="first_name" class=" me-4">First Name:</label>
                                        <input type="text" class="ms-2" name="first_name" value="<?php echo $_SESSION['first_name']; ?>" required>
                                       
                                    </div>
                                    <div class="d-flex mx-5">
                                        <label for="last_name" class=" me-4">Last Name:</label>
                                        <input type="text" class="ms-2" name="last_name" value="<?php echo $_SESSION['last_name']; ?>" required>
                                        
                                    </div>
                                </div>
                                 <div class="fs-5 my-2 text-center ">
                                     <label for="phone_number">Phone Number:</label>
                                     <input type="text" name="phone_number" value="<?php echo $_SESSION['phone_number']; ?>" required>
                                     <br>
                                    
    
                                </div>
                                
    
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-75 my-3">Update User</button>
                                </div>
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>
            </div>
            <div class=" w-75 p-5 m-auto shadow mt-5">
                <div class="d-flex fs-5 justify-content-between my-3 ">
                    <div class="d-flex ">
                        <h4 class="me-2">Street Address :</h4>
                        <?php
                        $street_address=$_SESSION['street_address'] ;
                        echo "<span>$street_address</span>";
                        ?>
                    </div>
                    <div class="d-flex  ">
                        <h4 class="me-2">City :</h4>
                       <?php
                        $city=$_SESSION['city'] ;
                        echo "<span>$city</span>";
                        ?>
                    </div>
                    <!-- <div class="d-flex fs-5 "> -->
                </div>
                <div class="d-flex fs-5 justify-content-between my-3 ">
                    <div class="d-flex ">
                        <h4 class="me-2">State :</h4>
                        <?php
                        $state=$_SESSION['state'] ;
                        echo "<span>$state</span>";
                        ?>
                    </div>
                    <div class="d-flex  ">
                        <h4 class="me-2">City :</h4>
                       <?php
                        $postale_code=$_SESSION['postale_code'] ;
                        echo "<span>$postale_code</span>";
                        ?>
                    </div>
                    <!-- <div class="d-flex fs-5 "> -->
                </div>
                <div class="text-center mt-4 pt-2">
                    <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#addressModal">
                           Modifier
                    </button>
                </div>
                <!-- Button trigger modal -->
               
    
                <!-- Modal -->
                <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addressModalLabel">Modification de l'adresse</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <form action="update_address.php" method="post" >
                                 <div class="d-flex  justify-content-between  my-2">
                                    <div class=" d-flex mx-5">
                                        <label for="street_address">Street Address:</label>
                                        <input type="text" name="street_address" value="<?php echo $_SESSION['street_address']; ?>" required>
                                    
                                    </div>
                                    <div class="d-flex mx-5 ">
                                        <label for="city">City:</label>
                                        <input type="city" name="city" value="<?php echo $_SESSION['city']; ?>" required>
                                        
                                    </div>
    
                                </div>
                                 <div class="d-flex  justify-content-between ">
                                    <div class=" d-flex mx-5">
                                        <label for="state" class="me-5">State:</label>
                                        <input type="text"class="ms-3" name="state" value="<?php echo $_SESSION['state']; ?>" required>
                                       
                                    </div>
                                    <div class="d-flex mx-5">
                                        <label for="postale_code">Postal Code:</label>
                                        <input type="text" name="postale_code" value="<?php echo $_SESSION['postale_code']; ?>" required>
                                        
                                    </div>
    
                                </div>
                                
    
                                <div class="text-center">
    
                                    <button type="submit" class=" btn btn-primary w-75 my-3">Update Address</button>
                                </div>
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>
            </div>
            
        </div>
    </section>
    <div class="text-center my-5">
        <a href="../back-end/temp/logout.php" class="btn btn-danger"> Déconnexion</a>
    </div>
     <footer>
    <div class=" text-center text-white" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" >
            <span class="fs-5">E-maillot  -  2024</span>
        </div>
   </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</body>
</html>
