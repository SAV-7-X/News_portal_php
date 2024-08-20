<?php
// Include database connection
include('db_connection.php'); // Adjust the path if needed

// Check if category_id is provided
if (isset($_GET['category_id'])) {
    $category_id = intval($_GET['category_id']);

    // Prepare the SQL query
    $query = "SELECT id, name FROM subcategories WHERE category_id = ?";
    
    // Initialize the response array
    $response = [];

    if ($stmt = $conn->prepare($query)) {
        // Bind parameters and execute
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the results
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }

        // Free the result and close the statement
        $result->free();
        $stmt->close();
    } else {
        // Error preparing the statement
        echo json_encode(['error' => 'Failed to prepare statement']);
        exit;
    }

    // Close the database connection
    $conn->close();

    // Return the response in JSON format
    echo json_encode($response);
} else {
    // Invalid request
    echo json_encode(['error' => 'Category ID not provided']);
}
?>
