<!-- verification_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h2>Verify Your Email</h2>
    <form action="verify_email.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required>
        <br>
        <label for="token">Verification Token:</label>
        <input type="text" id="token" name="token" required>
        <br>
        <button type="submit">Verify Email</button>
    </form>
</body>
</html>
