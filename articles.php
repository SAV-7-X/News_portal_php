<?php
// session_start();
include('check_session.php');
include('db_connection.php'); // Make sure to include your database connection file

// Fetch total articles count
$totalArticlesQuery = "SELECT COUNT(*) as total FROM articles";
$totalArticlesResult = mysqli_query($conn, $totalArticlesQuery);
$totalArticles = mysqli_fetch_assoc($totalArticlesResult)['total'];
$totalcategoryQuery = "SELECT COUNT(*) as total FROM categories";
$totalcategoryResult = mysqli_query($conn, $totalcategoryQuery);
$totalcategory = mysqli_fetch_assoc($totalcategoryResult)['total'];
$sql = "SELECT * FROM articles WHERE status = 'published'  ORDER BY date DESC  ";
$result = $conn->query($sql);

$news_articles = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news_articles[] = $row;
    }
}

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
        .input-group textarea,
        .input-group select {
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

        #messageBox {
            margin-top: 20px;
        }

        .success-message {
            color: green;
            /* font-weight: bold; */
        }

        .error-message {
            color: red;
            /* font-weight: bold; */
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
                
                <!-- <li><a href="subcategory.php">
                    <i class="uil uil-layer-group"></i>
                    <span class="link-name">Add Sub Category</span>
                </a></li> -->
                
                <li><a href="articles.php">
                    <i class="uil uil-newspaper"></i>
                    <span class="link-name"> News Articles</span>
                </a></li>
                
                <!-- <li><a href="users.php">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Users</span>
                </a></li> -->
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
        <span class="number"><?php echo number_format($totalArticles); ?></span>
    </div>
    <div class="box box2">
        <i class="uil uil-newspaper"></i>
        <span class="text">Total Articles</span>
        <span class="number"><?php echo number_format($totalcategory); ?></span>
    </div>
    <div class="box box3">
        <i class="uil uil-newspaper"></i>
        <span class="text">Admins</span>
        <span class="number">1</span>
    </div>

</div>

            <div class="article-editor">
                <div class="title">
                    <i class="uil uil-eye"></i>
                    <span class="text">Article Editor</span>
                </div>
                <form id="articleForm">
                    <div class="input-group" data-aos="fade-up">
                        <label for="articleTitle">Title</label>
                        <input type="text" id="articleTitle" name="title" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="100">
                        <label for="articleImage">Image URL</label>
                        <input type="file" id="articleImage" name="image" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="200">
                        <label for="articleDate">Date</label>
                        <input type="date" id="articleDate" name="date" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="300">
                        <label for="articlePara1">Paragraph 1</label>
                        <textarea id="articlePara1" name="para1" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="400">
                        <label for="articlePara2">Paragraph 2</label>
                        <textarea id="articlePara2" name="para2" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="500">
                        <label for="articleSubtitle">Subtitle</label>
                        <input type="text" id="articleSubtitle" name="subtitle" required>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="600">
                        <label for="articlePara3">Paragraph 3</label>
                        <textarea id="articlePara3" name="para3" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="700">
                        <label for="articlePara4">Paragraph 4</label>
                        <textarea id="articlePara4" name="para4" required></textarea>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="800">
                        <label for="articleCategory">Category</label>
                        <select id="articleCategory" name="category" required>
                            <option value="" disabled selected>Select Category</option>
                            <!-- Categories will be populated here -->
                        </select>
                    </div>
                    <div class="input-group" data-aos="fade-up" data-aos-delay="900">
                        <label for="articleStatus">Status</label>
                        <select id="articleStatus" name="status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <button type="submit">Submit Article</button>
                </form>
                <div id="messageBox"></div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="dashboard.js"></script>
    <script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true
    });

    // Fetch and populate categories on page load
    document.addEventListener('DOMContentLoaded', () => {
        fetch('get_categories.php')
            .then(response => response.json())
            .then(categories => {
                const categorySelect = document.getElementById('articleCategory');
                categorySelect.innerHTML = '<option value="" disabled selected>Select Category</option>'; // Reset options
                categories.forEach(category => {
                    categorySelect.add(new Option(category.name, category.id));
                });
            })
            .catch(error => console.error('Error fetching categories:', error));
    });

    // Form submission handler
    document.getElementById('articleForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const messageBox = document.getElementById('messageBox');

        try {
            const response = await fetch('add_news.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (response.ok) {
                messageBox.innerHTML = `<div class="success-message">${result.message}</div>`;
                this.reset(); // Clear the form after successful submission
            } else {
                messageBox.innerHTML = `<div class="error-message">${result.message || 'Failed to submit the article. Please try again.'}</div>`;
            }
        } catch (error) {
            messageBox.innerHTML = `<div class="error-message">An error occurred: ${error.message}</div>`;
        }
    });
</script>

    <script src="logout.js"></script>
</body>
</html>
