<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $raw_password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $registration_date = date("Y-m-d H:i:s"); // Current date and time

    // Hash the password
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

    // Generate a unique verification token
    $verification_token = md5(uniqid(rand(), true));

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO user (username, password, email, first_name, last_name, phone_number, registration_date, verification_token, is_verified, role) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0, 'user')"; // Default role set to 'user'

    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssss", $username, $hashed_password, $email, $first_name, $last_name, $phone_number, $registration_date, $verification_token);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Registration successful
        echo "Registration successful! Please copy the verification token below and keep it safe.";
        echo "<br>";
        echo "Verification token: $verification_token";

        // Redirect to another page after a delay (40 seconds in this case)
        echo '<script>
                setTimeout(function() {
                    window.location.href = "verification_form.php?email=' . $email . '";
                }, 40000);
              </script>';
    } else {
        // Registration failed
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
