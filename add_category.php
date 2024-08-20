<?php
// Include database connection file
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $categoryName = $_POST['name'];
    $categoryDescription = $_POST['description'];

    // Insert data into the database
    $query = "INSERT INTO categories (name, description) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $categoryName, $categoryDescription);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Category added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error adding category']);
    }

    $stmt->close();
}

$conn->close();
?>
