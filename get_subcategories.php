<?php
// Include database connection
include('db_connection.php');

// Get category_id from query parameter
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Fetch subcategories
$query = "SELECT id, name FROM subcategories WHERE category_id = $category_id";
$result = $conn->query($query);

$subcategories = array();
while($row = $result->fetch_assoc()) {
    $subcategories[] = $row;
}

// Output as JSON
header('Content-Type: application/json');
echo json_encode($subcategories);
?>
