<?php
// Include database connection
include('db_connection.php'); // Ensure you have this file for your database connection

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data
    $parentCategory = $_POST['category'] ?? null;
    $subcategoryName = $_POST['name'] ?? '';
    $subcategoryDescription = $_POST['description'] ?? '';

    // Validate inputs
    if (empty($parentCategory) || empty($subcategoryName) || empty($subcategoryDescription)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO subcategories (name, description, parent_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $subcategoryName, $subcategoryDescription, $parentCategory);

    // Execute statement and check result
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Subcategory added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add subcategory.']);
    }

    // Close statement
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// Close database connection
$conn->close();
?>
