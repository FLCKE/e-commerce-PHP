<?php
$apiUrl = 'http://localhost:8283/api/v1/users';
$jsonData = file_get_contents($apiUrl);
$users = json_decode($jsonData, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Members</title>
    <!-- Add your CSS stylesheets or include Bootstrap if needed -->
</head>
<body>
    <div class="container mt-5">
        <h2>Members</h2>

        <!-- Add User Button -->
        <a href="add_user.php" class="btn btn-primary mb-3">Add User</a>

        <?php
        // Display data if available
        if (!empty($users)) {
            echo '<table class="table">';
            echo '<thead><tr><th>User ID</th><th>Username</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Registration Date</th><th>Action</th></tr></thead>';
            echo '<tbody>';
            foreach ($users as $user) {
                echo '<tr>';
                echo "<td>{$user['user_id']}</td>";
                echo "<td>{$user['username']}</td>";
                echo "<td>{$user['email']}</td>";
                echo "<td>{$user['first_name']}</td>";
                echo "<td>{$user['last_name']}</td>";
                echo "<td>{$user['phone_number']}</td>";
                echo "<td>{$user['registration_date']}</td>";
                
                // Add Update and Delete buttons with user_id as parameter
                echo '<td>';
                echo '<a href="edit_user.php?id=' . $user['user_id'] . '" class="btn btn-warning btn-sm">Edit</a>';
                echo ' <a href="delete_user.php?id=' . $user['user_id'] . '" class="btn btn-danger btn-sm">Delete</a>';
                echo '</td>';

                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo '<p>No members found.</p>';
        }
        ?>
    </div>
</body>
</html>
