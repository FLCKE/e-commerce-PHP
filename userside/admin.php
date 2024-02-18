<?php
// Set session cookie parameters
$cookieParams = session_get_cookie_params();
session_set_cookie_params([
    'lifetime' => 0, // Valid until the user closes the browser or logs out
    'path' => $cookieParams['path'],
    'domain' => '', // Set to an empty string or 'localhost' for the local environment
    'secure' => false, // Set to false if not using HTTPS in the local environment
    'httponly' => true,
    'samesite' => 'Lax',
]);

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if the user has admin role
if ($_SESSION['role'] !== 'admin') {
    header("Location: home.php"); // Redirect to home.php if not an admin
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
    <title>JerseyClub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><span>JerseyClub</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Adminhome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Members.php">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shipping</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Carts</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                   </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <div class="signup-form">
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <h2><?php echo isset($welcomeMessage) ? $welcomeMessage : "Admin Dashboard"; ?></h2>
            <br>
            <?php
                // Display welcome message or error
                if (isset($welcomeMessage)) {
                    echo "<p>$welcomeMessage</p>";
                } elseif (isset($errorMessage)) {
                    echo "<p>$errorMessage</p>";
                }
            ?>
            <!-- Rest of your HTML code for the admin page -->
        </form>
    </div>
</body>
</html>
