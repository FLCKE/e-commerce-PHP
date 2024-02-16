<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database.php file
    include 'database.php';

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

    $userId = $_GET['id'];

    // Function to update a user by user ID using prepared statements
    function updateUser($userId, $editedUser) {
        global $conn;

        $sql = "UPDATE user SET
                username = ?,
                email = ?,
                password = ?,
                first_name = ?,
                last_name = ?,
                phone_number = ?,
                registration_date = ?
                WHERE user_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi",
            $editedUser['username'],
            $editedUser['email'],
            $editedUser['password'],
            $editedUser['first_name'],
            $editedUser['last_name'],
            $editedUser['phone_number'],
            $editedUser['registration_date'],
            $userId
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // Update the user in the database
    $updateResult = updateUser($userId, $editedUser);

    if ($updateResult) {
        // Redirect to the members page or display success message
        header("Location: Members.php");
        exit();
    } else {
        // Handle error, e.g., display an error message
        echo "Error updating user: " . $conn->error;
    }
} else {
    // Fetch user data to pre-fill the form for editing
    // Include the database.php file
    include 'database.php';

    $userId = $_GET['id'];

    // Function to retrieve user information by user ID
    function getUserInfo($userId) {
        global $conn;

        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Fetch user data
    $userData = getUserInfo($userId);
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

        <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="post">
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
