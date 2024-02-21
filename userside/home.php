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
    header("Location: login.php");
    exit();
}

// Check if the user has the 'user' role
if ($_SESSION['role'] !== 'user') {
    header("Location: access_denied.php"); // Redirect to an access denied page
    exit();
}

// Include your database connection file
include 'database.php';

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
    <title>Welcome to Finance Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="signup-form">
        <form action="home.php" method="post" enctype="multipart/form-data">
            <h2>Welcome (User)</h2>
            <?php
                // Display welcome message or error
                if (isset($welcomeMessage)) {
                    echo "<p>$welcomeMessage</p>";
                } elseif (isset($errorMessage)) {
                    echo "<p>$errorMessage</p>";
                }
            ?>
            <!-- Rest of your HTML code for the home page -->
            <!-- Logout Button -->
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <a href="user_profil.php" class="btn btn-danger">Profil</a>
            <a href="product.php" class="btn btn-danger">Products</a>


        </form>
    </div>
</body>
</html>
