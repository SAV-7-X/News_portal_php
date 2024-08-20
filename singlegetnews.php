<?php
require 'db_connection.php';

// Fetch the specific news article
$news_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->bind_param("i", $news_id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

// Fetch categories
$categories = $conn->query("SELECT * FROM categories LIMIT 10")->fetch_all(MYSQLI_ASSOC);

// Fetch older news
$trending_news = $conn->query("SELECT * FROM articles ORDER BY date DESC ")->fetch_all(MYSQLI_ASSOC);
$older_news = $conn->query("SELECT * FROM articles WHERE id != $news_id ORDER BY date DESC LIMIT 4")->fetch_all(MYSQLI_ASSOC);
?>