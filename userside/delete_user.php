<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $apiUrl = 'http://localhost:8283/api/v1/users/' . $_GET['id'];
    $options = [
        'http' => [
            'method' => 'DELETE',
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($apiUrl, false, $context);

    if ($result === FALSE) {
        // Handle error, e.g., display an error message
        echo "Error deleting user.";
    } else {
        // Redirect to the members page or display success message
        header("Location: members.php");
        exit();
    }
}
?>
