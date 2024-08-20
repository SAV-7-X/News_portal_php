<?php
require 'db_connection.php';

// Fetch articles from the database
$sql = "SELECT * FROM articles WHERE status = 'published' ORDER BY date DESC LIMIT 5";
$result = $conn->query($sql);

$articles = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}
$trending_sql = "SELECT title FROM articles WHERE status = 'published' ORDER BY date DESC ";
$trending_result = $conn->query($trending_sql);

$trending_title = "Instagram's big redesign goes live with black-and-white app"; // Default title
if ($trending_result->num_rows > 0) {
    $trending_row = $trending_result->fetch_assoc();
    $trending_title = $trending_row['title'];
}

// Fetch the latest trending news
$trending_sql = "SELECT id, title, image, date FROM articles WHERE status = 'published' ORDER BY date DESC, date DESC LIMIT 1";
$trending_result = $conn->query($trending_sql);

$trending_article = null;
if ($trending_result->num_rows > 0) {
    $trending_article = $trending_result->fetch_assoc();
}

$latest_sql = "SELECT id, title, image, date FROM articles 
               WHERE status = 'published' 
               AND id != ? 
               ORDER BY date DESC 
               LIMIT 4";
$stmt = $conn->prepare($latest_sql);
$stmt->bind_param('i', $trending_article['id']);
$stmt->execute();
$latest_result = $stmt->get_result();

$latest_articles = [];
while ($row = $latest_result->fetch_assoc()) {
    $latest_articles[] = $row;
}

$sql = "SELECT * FROM articles WHERE status = 'published' ORDER BY date DESC LIMIT 5, 5";
$result = $conn->query($sql);

$trending_news = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $trending_news[] = $row;
    }
}


$sql = "SELECT * FROM articles WHERE category_id = 8 AND status = 'published' ORDER BY date DESC LIMIT 4";
$result = $conn->query($sql);

$tech_news = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tech_news[] = $row;
    }
}


$sql = "SELECT * FROM articles WHERE category_id = 2 AND status = 'published' ORDER BY date DESC LIMIT 4";
$result = $conn->query($sql);

$education_news = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $education_news[] = $row;
    }
}

$sql = "SELECT * FROM articles WHERE status = 'published' AND category_id = 1 ORDER BY date  LIMIT 4";
$result = $conn->query($sql);

$news_articles = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news_articles[] = $row;
    }
}


// Fetch categories
$sql = "SELECT * FROM categories ORDER BY name DESC LIMIT 10";
$result = $conn->query($sql);

$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch recommended news
$sql = "SELECT * FROM articles  ORDER BY date DESC LIMIT 4";
$result = $conn->query($sql);

$recommended_news = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recommended_news[] = $row;
    }
}

$conn->close();
?>