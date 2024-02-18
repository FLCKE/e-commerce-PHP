<?php
    session_start();
    include ("database.php");
        $username =$_POST['username'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];

        // requette sql pour changer les informations  de l'utilisateur 
        $user_id=$_SESSION['user_id'];
    $query = "UPDATE `user` SET `username`=?,`email`=?,`first_name`=?,`last_name`=?,`phone_number`=? WHERE user_id=$user_id";
    
    // Use prepared statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss",$username,$email,$first_name,$last_name,$phone_number);
    mysqli_stmt_execute($stmt);
    if (mysqli_affected_rows( $conn )==0) {
        
    } else {
        
        // Database error
        header("Location:logout.php");
        
    }
   exit();
    