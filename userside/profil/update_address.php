<?php
    session_start();
    include ("../back-end/temp/database.php");
        $street_address =$_POST['street_address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postale_code = $_POST['postale_code'];


        // requette sql pour changer les informations  de l'utilisateur 
        $user_id=$_SESSION['user_id'];
    $query = "UPDATE `address` SET `street_address`=?,`city`=?,`state`=?,`postale_code`=? WHERE user_id=$user_id";
    
    // Use prepared statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss",$street_address,$city,$state,$postale_code);
    mysqli_stmt_execute($stmt);
    if (mysqli_affected_rows( $conn )==0) {
        
    } else {
        
        // Database error
        header("Location: ../back-end/temp/logout.php");
        
    }
   exit();
    