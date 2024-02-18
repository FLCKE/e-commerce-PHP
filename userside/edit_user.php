<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input (add your validation logic here)

    $editedUser = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'phone_number' => $_POST['phone_number'],
        'registration_date' => $_POST['registration_date'], // Include registration date
    ];

    $apiUrl = 'http://localhost:8080/api/v1/getuser?id'.$_SESSION['user_id'];
    $options = [
        'http' => [
            'method' => 'PUT',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($editedUser),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($apiUrl, false, $context);

    if ($result === FALSE) {
        // Handle error, e.g., display an error message
        echo "Error updating user.";
    } else {
        // Redirect to the members page or display success message
        header("Location: members.php");
        exit();
    }
} else {
    // Fetch user data to pre-fill the form for editing
    $apiUrl = 'http://localhost:8080/api/v1/getuser?id='.$_SESSION['user_id'] ;
    $userData = json_decode(file_get_contents($apiUrl), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User</title>
    <!-- Add your CSS stylesheets or include Bootstrap if needed -->
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>

        <form action="edit_user.php?id=<?php echo $_SESSION['user_id']; ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $userData['username']; ?>" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $userData['email']; ?>" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $userData['password']; ?>" required>
            <br>

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo $userData['first_name']; ?>" required>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $userData['last_name']; ?>" required>
            <br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo $userData['phone_number']; ?>" required>
            <br>

            <label for="registration_date">Registration Date:</label>
            <input type="text" name="registration_date" value="<?php echo $userData['registration_date']; ?>" required>
            <br>
            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>
