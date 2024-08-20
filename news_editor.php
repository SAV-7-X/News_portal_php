<?php
// session_start();
include('check_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <title>News Portal Admin Dashboard</title>
    <style>
        .article-editor {
    background-color: var(--panel-color);
    border-radius: 12px;
    padding: 20px;
    margin-top: 20px;
}

.article-editor .title {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.article-editor .title i {
    font-size: 24px;
    color: var(--primary-color);
    margin-right: 10px;
}

.article-editor .title .text {
    font-size: 24px;
    font-weight: 500;
    color: var(--text-color);
}

#articleForm {
    display: grid;
    gap: 20px;
}

.input-group {
    display: flex;
    flex-direction: column;
}

.input-group label {
    font-size: 16px;
    color: var(--text-color);
    margin-bottom: 5px;
}

.input-group input,
.input-group textarea {
    padding: 10px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    background-color: var(--panel-color);
    color: var(--text-color);
    font-size: 14px;
}

.input-group textarea {
    resize: vertical;
    min-height: 100px;
}

#articleForm button {
    padding: 10px 20px;
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#articleForm button:hover {
    background-color: #2980b9;
}
    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/news_logo.png" alt="">
            </div>
            <span class="logo_name">NewsAdmin</span>
        </div>

        <div class="menu-items">
        <ul class="nav-links">
    <li><a href="dashboard.php">
        <i class="uil uil-tachometer-fast-alt"></i>
        <span class="link-name">Dashboard</span>
    </a></li>
    
    <li><a href="category.php">
        <i class="uil uil-folder-plus"></i>
        <span class="link-name">Add Category</span>
    </a></li>
    
    <li><a href="subcategory.php">
        <i class="uil uil-layer-group"></i>
        <span class="link-name">Add Sub Category</span>
    </a></li>
    
    <li><a href="articles.php">
        <i class="uil uil-newspaper"></i>
        <span class="link-name">Articles</span>
    </a></li>
    
    <li><a href="users.php">
        <i class="uil uil-users-alt"></i>
        <span class="link-name">Users</span>
    </a></li>
</ul>
            
            <ul class="logout-mode">
            <li onclick="logout()" style="cursor: pointer;"><a>
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search articles...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-newspaper"></i>
                        <span class="text">Total Articles</span>
                        <span class="number">1,520</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-eye"></i>
                        <span class="text">Total Views</span>
                        <span class="number">2,120,456</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Active Users</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>

           

            <div class="article-editor">
                <div class="title">
                    <i class="fas fa-edit"></i>
                    <span class="text">Article Editor</span>
                </div>
                <form id="articleForm">
                    <div class="input-group" data-aos="fade-up">
                        <label for="articleTitle">Title</label>
                        <input type="text" id="articleTitle" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="100">
                        <label for="articleImage">Image URL</label>
                        <input type="url" id="articleImage" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="200">
                        <label for="articleDate">Date</label>
                        <input type="date" id="articleDate" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="300">
                        <label for="articlePara1">Paragraph 1</label>
                        <textarea id="articlePara1" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="400">
                        <label for="articlePara2">Paragraph 2</label>
                        <textarea id="articlePara2" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="500">
                        <label for="articleSubtitle">Subtitle</label>
                        <input type="text" id="articleSubtitle" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="600">
                        <label for="articlePara3">Paragraph 3</label>
                        <textarea id="articlePara3" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="700">
                        <label for="articlePara4">Paragraph 4</label>
                        <textarea id="articlePara4" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="800">
                        <label for="articleCategory">Category</label>
                        <input type="text" id="articleCategory" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="900">
                        <label for="articleSubCategory">Sub Category</label>
                        <input type="text" id="articleSubCategory" required>
                    </div>
                    <button type="submit" data-aos="fade-up" data-aos-delay="1000">Submit Article</button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="dashboard.js"></script>
    <script>
        // Article form submission
document.getElementById('articleForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Collect form data
    const formData = {
        title: document.getElementById('articleTitle').value,
        image: document.getElementById('articleImage').value,
        date: document.getElementById('articleDate').value,
        para1: document.getElementById('articlePara1').value,
        para2: document.getElementById('articlePara2').value,
        subtitle: document.getElementById('articleSubtitle').value,
        para3: document.getElementById('articlePara3').value,
        para4: document.getElementById('articlePara4').value,
        category: document.getElementById('articleCategory').value,
        subCategory: document.getElementById('articleSubCategory').value
    };

    // Here you would typically send this data to your server
    console.log('Article submitted:', formData);

    // Clear form after submission
    this.reset();

    // Show a success message (you can replace this with a more sophisticated notification)
    alert('Article submitted successfully!');
});

// Initialize AOS
AOS.init({
    duration: 1000,
    once: true
});
    </script>
    <script src="logout.js"></script>
</body>
</html>