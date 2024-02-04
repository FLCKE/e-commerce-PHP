<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate email (you may want to add more validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['reset_error'] = "Invalid email address";
        header("Location: forgot_password.php");
        exit();
    }

    // Check if the email exists in the database
    $query = "SELECT user_id, username FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Update the password in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE user SET password = ? WHERE email = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "ss", $hashed_password, $email);
        mysqli_stmt_execute($updateStmt);

        $_SESSION['reset_success'] = "Password reset successfully. You can now log in with your new password.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['reset_error'] = "Email address not found";
        header("Location: forgot_password.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Reset Password</h2>
                        <?php
                        if (isset($_SESSION['reset_error'])) {
                            echo '<p class="text-danger">' . $_SESSION['reset_error'] . '</p>';
                            unset($_SESSION['reset_error']);
                        }

                        if (isset($_SESSION['reset_success'])) {
                            echo '<p class="text-success">' . $_SESSION['reset_success'] . '</p>';
                            unset($_SESSION['reset_success']);
                        }
                        ?>
                        <form action="forgot_password.php" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
