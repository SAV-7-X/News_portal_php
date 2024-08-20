<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Article deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete article']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}