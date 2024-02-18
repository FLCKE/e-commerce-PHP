<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $verification_token = mysqli_real_escape_string($conn, $_POST['token']);

    // Check if the email and token exist in the database
    $query = "SELECT * FROM user WHERE email = ? AND verification_token = ? AND is_verified = 0";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $verification_token);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Email and token are valid
        // Update the user's status to indicate they are verified
        $update_query = "UPDATE user SET is_verified = 1 WHERE email = ? AND verification_token = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "ss", $email, $verification_token);
        mysqli_stmt_execute($update_stmt);

        // Close the statements
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($update_stmt);

        // Display success message
        echo "Email verification successful! You can now <a href='login.php'>login</a>.";
        exit();
    } else {
        // Invalid email or token, or user is already verified
        echo "Invalid verification link. Please make sure you entered the correct email and verification token.";
    }

    // Close the statements
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($update_stmt);
}
?>
