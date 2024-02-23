<?php
session_start();

// Include your database connection file
include 'database.php';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
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

            // Extract user information
            $username = $row['username'];
            $email = $row['email'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $phone_number = $row['phone_number'];

            // Check if the user has a custom profile picture
            $profilePicture = !empty($row['profile_picture']) ? $row['profile_picture'] : 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=626&ext=jpg&uid=R124982824&ga=GA1.2.883124554.1703534148&semt=ais';

        } else {
            // User not found
            $errorMessage = "User not found.";
        }
    } else {
        // Database error
        $errorMessage = "Database error: " . mysqli_error($conn);
    }
} else {
    // Non-connected user
    $errorMessage = "User not logged in.";
    // You may want to redirect to a login page or handle this case differently
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Add your custom styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            max-width: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-info">
            <img src="<?= $profilePicture ?>" alt="Profile Picture" class="profile-image">
            <h2><?= $username ?></h2>
            <p>Email: <?= $email ?></p>
            <p>First Name: <?= $first_name ?></p>
            <p>Last Name: <?= $last_name ?></p>
            <p>Phone Number: <?= $phone_number ?></p>
        </div>
    </div>
</body>

</html>
