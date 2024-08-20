<?php
// Include database connection
include('db_connection.php');

// Fetch categories
$query = "SELECT id, name FROM categories";
$result = $conn->query($query);

$categories = array();
while($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

// Output as JSON
header('Content-Type: application/json');
echo json_encode($categories);
?>
