<?php
require 'db_connection.php'; // Ensure this file contains the correct database connection setup

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $para1 = filter_input(INPUT_POST, 'para1', FILTER_SANITIZE_STRING);
    $para2 = filter_input(INPUT_POST, 'para2', FILTER_SANITIZE_STRING);
    $subtitle = filter_input(INPUT_POST, 'subtitle', FILTER_SANITIZE_STRING);
    $para3 = filter_input(INPUT_POST, 'para3', FILTER_SANITIZE_STRING);
    $para4 = filter_input(INPUT_POST, 'para4', FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        // Ensure the 'uploads' directory exists and is writable
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Image upload successful
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to upload the image.'];
            echo json_encode($response);
            exit;
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Image upload error.'];
        echo json_encode($response);
        exit;
    }

    // Prepare and execute SQL statement
    $sql = "INSERT INTO articles (title, image, date, para1, para2, subtitle, para3, para4, category_id, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        $response = ['status' => 'error', 'message' => 'Failed to prepare the SQL statement.'];
        echo json_encode($response);
        exit;
    }

    $stmt->bind_param("ssssssssss", $title, $target_file, $date, $para1, $para2, $subtitle, $para3, $para4, $category_id, $status);

    if ($stmt->execute()) {
        $response = ['status' => 'success', 'message' => 'Article added successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to submit the article.'];
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
}
?>
