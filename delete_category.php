<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete category']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}