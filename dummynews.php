<?php
require 'db_connection.php'; // Ensure this file contains the correct database connection setup

// Array of dummy education news articles
$articles = [
    [
        'title' => 'The Future of Online Education',
        'date' => '2024-08-01',
        'para1' => 'Online education is evolving with new technologies and methods...',
        'para2' => 'Virtual classrooms and interactive learning are becoming more prevalent...',
        'subtitle' => 'Transforming Education',
        'para3' => 'Explore the benefits and challenges of online learning...',
        'para4' => 'The future of education is increasingly digital...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e1.jpg'
    ],
    [
        'title' => 'Innovative Teaching Methods in 2024',
        'date' => '2024-08-02',
        'para1' => 'New teaching methods are emerging to enhance student engagement...',
        'para2' => 'Technologies such as AR and VR are being integrated into curricula...',
        'subtitle' => 'Teaching Innovations',
        'para3' => 'Find out how educators are adapting to new tools and techniques...',
        'para4' => 'Education is becoming more interactive and immersive...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e2.jpg'
    ],
    [
        'title' => 'The Impact of AI on Education',
        'date' => '2024-08-03',
        'para1' => 'Artificial Intelligence is transforming the educational landscape...',
        'para2' => 'AI tools are being used to personalize learning experiences...',
        'subtitle' => 'AI in Education',
        'para3' => 'Explore how AI is reshaping teaching and learning processes...',
        'para4' => 'The integration of AI promises significant advancements...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e3.jpg'
    ],
    [
        'title' => 'Advances in Educational Technology',
        'date' => '2024-08-04',
        'para1' => 'Educational technology is advancing with new software and platforms...',
        'para2' => 'From e-books to learning management systems, the tools are evolving...',
        'subtitle' => 'Tech in the Classroom',
        'para3' => 'Learn about the latest technological trends in education...',
        'para4' => 'Technology is enhancing the learning experience for students...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e4.jpg'
    ],
    [
        'title' => 'The Rise of Gamification in Education',
        'date' => '2024-08-05',
        'para1' => 'Gamification is becoming a popular approach to engage students...',
        'para2' => 'Educational games and rewards are being used to motivate learners...',
        'subtitle' => 'Learning Through Play',
        'para3' => 'Discover how gamification is changing the educational landscape...',
        'para4' => 'The approach is making learning more fun and interactive...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e5.jpg'
    ],
    [
        'title' => 'Trends in Student Assessment',
        'date' => '2024-08-06',
        'para1' => 'Student assessment methods are evolving with new evaluation techniques...',
        'para2' => 'There’s a shift towards more comprehensive and continuous assessment...',
        'subtitle' => 'Assessment Evolution',
        'para3' => 'Learn about the new approaches to evaluating student performance...',
        'para4' => 'Assessment practices are becoming more holistic and flexible...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e6.jpg'
    ],
    [
        'title' => 'The Role of Virtual Reality in Education',
        'date' => '2024-08-07',
        'para1' => 'Virtual Reality is offering immersive learning experiences...',
        'para2' => 'From virtual field trips to interactive simulations, VR is enhancing education...',
        'subtitle' => 'VR Learning',
        'para3' => 'Explore how VR is being used to create engaging educational content...',
        'para4' => 'The technology is making learning more engaging and experiential...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e7.jpg'
    ],
    [
        'title' => 'Educational Podcasts and Their Benefits',
        'date' => '2024-08-08',
        'para1' => 'Podcasts are becoming a valuable educational resource...',
        'para2' => 'They offer a flexible way to learn about various topics on the go...',
        'subtitle' => 'Learning Through Podcasts',
        'para3' => 'Discover the advantages of incorporating podcasts into learning...',
        'para4' => 'Educational podcasts are a convenient and engaging way to gain knowledge...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e8.jpg'
    ],
    [
        'title' => 'The Importance of Digital Literacy in Education',
        'date' => '2024-08-09',
        'para1' => 'Digital literacy is crucial for navigating the modern educational environment...',
        'para2' => 'Students need skills to effectively use digital tools and resources...',
        'subtitle' => 'Building Digital Skills',
        'para3' => 'Learn about the importance of digital literacy and how it’s being taught...',
        'para4' => 'Empowering students with digital skills is essential for their success...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e9.jpg'
    ],
    [
        'title' => 'Innovations in E-Learning Platforms',
        'date' => '2024-08-10',
        'para1' => 'E-learning platforms are introducing new features to enhance online education...',
        'para2' => 'These innovations are making learning more accessible and interactive...',
        'subtitle' => 'E-Learning Advancements',
        'para3' => 'Explore the latest updates and features in e-learning platforms...',
        'para4' => 'The platforms are evolving to better meet the needs of learners...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e10.jpg'
    ],
    [
        'title' => 'The Impact of Social Media on Education',
        'date' => '2024-08-11',
        'para1' => 'Social media is influencing education in various ways...',
        'para2' => 'It’s used for communication, collaboration, and learning opportunities...',
        'subtitle' => 'Social Media Trends',
        'para3' => 'Discover how social media is affecting educational practices...',
        'para4' => 'The role of social media in education is expanding and evolving...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e11.jpg'
    ],
    [
        'title' => 'The Role of Artificial Intelligence in Educational Content Creation',
        'date' => '2024-08-12',
        'para1' => 'AI is increasingly being used to create and curate educational content...',
        'para2' => 'It helps in generating personalized learning materials and assessments...',
        'subtitle' => 'AI-Driven Content Creation',
        'para3' => 'Learn about the impact of AI on creating educational resources...',
        'para4' => 'AI is shaping the future of educational content and resource development...',
        'category_id' => 2,
        'status' => 'Published',
        'image' => 'e12.jpg'
    ]
];

// Prepare SQL query
$query = "INSERT INTO articles (title, image, date, para1, para2, subtitle, para3, para4, category_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

// Bind parameters and execute for each article
foreach ($articles as $article) {
    $title = $article['title'];
    $image = $article['image'];
    $date = $article['date'];
    $para1 = $article['para1'];
    $para2 = $article['para2'];
    $subtitle = $article['subtitle'];
    $para3 = $article['para3'];
    $para4 = $article['para4'];
    $category_id = $article['category_id'];
    $status = $article['status'];

    $stmt->bind_param("ssssssssss", $title, $image, $date, $para1, $para2, $subtitle, $para3, $para4, $category_id, $status);
    
    if (!$stmt->execute()) {
        echo "Error inserting article '$title': " . htmlspecialchars($stmt->error) . "<br>";
    }
}

// Close statement and connection
$stmt->close();
$conn->close();

// Print a success message
echo 'All education news articles have been added successfully.';
?>
