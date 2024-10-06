<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "user_profiles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $conn->connect_error]));
}

// Fetch user data based on ID
if (isset($_GET['id'])) {
    $userId = (int)$_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Return user data in JSON format
        echo json_encode($user);
    } else {
        echo json_encode(['error' => "User not found."]);
    }
} else {
    echo json_encode(['error' => "No user ID provided."]);
}

// Close database connection
$conn->close();
?>
