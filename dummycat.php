<?php
// Include database connection file
include('db_connection.php');

// Array of dummy categories and descriptions
$categories = [
    ['Technology', 'Latest news and updates in technology.'],
    ['Health', 'Tips and news on health and wellness.'],
    ['Sports', 'All about your favorite sports and teams.'],
    ['Entertainment', 'Movies, music, and celebrity news.'],
    ['Travel', 'Destinations, tips, and travel guides.'],
    ['Finance', 'Financial news, advice, and tips.'],
    ['Education', 'News and updates about education.'],
    ['Science', 'Discoveries and advancements in science.'],
    ['Politics', 'Political news and analysis.'],
    ['Business', 'Business news and insights.'],
    ['Lifestyle', 'Trends and advice on lifestyle topics.'],
    ['Food', 'Recipes, food news, and dining tips.'],
    ['Culture', 'Cultural events and news.'],
    ['Art', 'Latest news in the art world.'],
    ['Fashion', 'Fashion trends and style tips.'],
    ['Music', 'Music news and artist updates.'],
    ['Movies', 'Latest movie releases and reviews.'],
    ['Gaming', 'Video game news and reviews.'],
    ['Fitness', 'Workouts, fitness tips, and health advice.'],
    ['Environment', 'News and updates about the environment.'],
    ['Home', 'Home improvement and decor tips.'],
    ['Automotive', 'Latest news in the automotive industry.'],
    ['Books', 'Book reviews and literary news.'],
    ['Gardening', 'Tips and news on gardening and plants.'],
    ['Tech Gadgets', 'New tech gadgets and reviews.'],
    ['Pets', 'Pet care tips and news.']
];

// Prepare SQL query
$query = "INSERT INTO categories (name, description) VALUES (?, ?)";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

// Bind parameters and execute for each category
foreach ($categories as $category) {
    $name = $category[0];
    $description = $category[1];
    
    $stmt->bind_param("ss", $name, $description);
    
    if (!$stmt->execute()) {
        echo "Error inserting category '$name': " . htmlspecialchars($stmt->error) . "<br>";
    }
}

// Close statement and connection
$stmt->close();
$conn->close();

echo "Categories inserted successfully!";
?>
