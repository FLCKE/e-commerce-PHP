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

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include 'database.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    // Query to retrieve user information (including role) for the given email
    $query = "SELECT user_id, username, password, role FROM user WHERE email = ?";
    
    // Use prepared statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Check if there is a matching user
        if ($row = mysqli_fetch_assoc($result)) {
            // Verify the entered password against the hashed password in the database
            if (password_verify($password, $row['password'])) {
                // Password is correct
                // Set session variables
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                // Redirect based on the user's role
                if ($row['role'] == 'user') {
                    header("Location: home.php");
                } elseif ($row['role'] == 'admin') {
                    header("Location: admin.php");
                } else {
                    // Handle other roles as needed
                    header("Location: login.php");
                }
                exit();
            } else {
                // Incorrect password
                $_SESSION['login_error'] = "Incorrect email or password";
                header("Location: login.php");
                exit();
            }
        } else {
            // User not found
            $_SESSION['login_error'] = "Incorrect email or password";
            header("Location: login.php");
            exit();
        }
    } else {
        // Database error
        $_SESSION['login_error'] = "Database error: " . mysqli_error($conn);
        header("Location: login.php");
        exit();
    }
} else {
    // Invalid request method
    header("Location: login.php");
    exit();
}
?>
