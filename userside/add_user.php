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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add User</title>
    <!-- Add your CSS stylesheets or include Bootstrap if needed -->
</head>
<body>
    <div class="container mt-5">
        <h2>Add User</h2>
        
        <form action="add_user.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>
            <br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" required>
            <br>

            <button type="submit">Add User</button>
        </form>
    </div>
</body>
</html>
