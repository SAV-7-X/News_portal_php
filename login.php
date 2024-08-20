<?php
session_start(); // Start the session
header('Content-Type: application/json');

// Database connection details
$host = 'localhost';
$dbname = 'newzportal';
$username = 'root';
$password = '';

// Establish database connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    echo json_encode(["message" => "Connection failed: " . $mysqli->connect_error]);
    exit;
}

// Retrieve form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate input
if (empty($email) || empty($password)) {
    echo json_encode(["message" => "Email and password are required"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["message" => "Invalid email format"]);
    exit;
}

// Prepare and execute a statement to fetch user by email
$stmt = $mysqli->prepare("SELECT id, username, password FROM admins WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists and verify password
if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        // Password is correct, start session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        echo json_encode(["message" => "Login successful"]);
    } else {
        echo json_encode(["message" => "Invalid password"]);
    }
} else {
    echo json_encode(["message" => "No user found with that email"]);
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>
