<?php
header('Content-Type: application/json'); // Set the content type to JSON

// Create a response array
$response = [
    "message" => "working"
];

// Encode the array to JSON and output it
echo json_encode($response);
?>
