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
    
    <link rel="stylesheet" href="articles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Manage Subcategories - Admin Dashboard</title>
    <style>
        /* Add these styles for the subcategory management page */
.add-subcategory-form {
    margin-bottom: 30px;
}

.add-subcategory-form form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.add-subcategory-form select,
.add-subcategory-form input,
.add-subcategory-form textarea {
    padding: 10px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    font-size: 16px;
}

.add-subcategory-form button {
    padding: 10px 20px;
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: var(--tran-03);
}

.add-subcategory-form button:hover {
    opacity: 0.8;
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
        <span class="link-name">Articles</span>
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
                <input type="text" placeholder="Search subcategories...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-sitemap"></i>
                    <span class="text">Manage Subcategories</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-sitemap"></i>
                        <span class="text">Total Subcategories</span>
                        <span class="number" id="totalSubcategories">0</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-plus-circle"></i>
                    <span class="text">Add New Subcategory</span>
                </div>

                <div class="add-subcategory-form">
                    <form id="subcategoryForm">
                        <select id="parentCategory" name="category" required style="border: 2px solid rgba(252, 92, 0, 0.736); background: rgba(222, 135, 135, 0.05); color: rgba(128, 128, 128, 0.963);">
                            <option value="" >Select Parent Category</option>
                            <!-- Parent categories will be populated by JavaScript -->
                        </select>
                        <input type="text" id="subcategoryName" name="name" placeholder="Subcategory Name" required style="border: 2px solid rgba(252, 92, 0, 0.736); background: rgba(222, 135, 135, 0.05);">
                        <textarea id="subcategoryDescription" name="description" placeholder="Subcategory Description" required style="border: 2px solid rgba(252, 92, 0, 0.736); background: rgba(222, 135, 135, 0.05);"></textarea>
                        <button type="submit">Add Subcategory</button>
                    </form>
                    <div id="message"></div>

                </div>

                <div class="title">
                    <i class="uil uil-list-ul"></i>
                    <span class="text">Existing Subcategories</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <!-- Subcategory names will be inserted here by JavaScript -->
                    </div>
                    <div class="data parent-category">
                        <span class="data-title">Parent Category</span>
                        <!-- Parent category names will be inserted here by JavaScript -->
                    </div>
                    <div class="data description">
                        <span class="data-title">Description</span>
                        <!-- Descriptions will be inserted here by JavaScript -->
                    </div>
                    <div class="data article-count">
                        <span class="data-title">Article Count</span>
                        <!-- Article counts will be inserted here by JavaScript -->
                    </div>
                    <div class="data actions">
                        <span class="data-title">Actions</span>
                        <!-- Action buttons will be inserted here by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="subcategories.js"></script>
    <script src="logout.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        fetch('get_subcategories.php')
            .then(response => response.json())
            .then(categories => {
                const select = document.getElementById('parentCategory');
                categories.forEach(category => {
                    select.add(new Option(category.name, category.id));
                });
            })
            .catch(error => console.error('Error:', error));
    });

//form submission
    document.querySelector('form').addEventListener('submit', async function (event) {
    event.preventDefault();

    // Create a FormData object from the form element
    const formData = new FormData(this);
    console.log(formData)
     // Get the message element to display result messages
     const messageElement = document.getElementById('message');

    try {
        // Send the form data using fetch
        const response = await fetch('add_subcategory.php', {
            method: 'POST',
            body: formData
        });

        // Parse the response as JSON
        const result = await response.json();

        // Show a success or error message based on the result
        // alert(result.message);
        if (result.status === 'success') {
            messageElement.textContent = result.message;
            messageElement.style.color = 'green';
        } else {
            messageElement.textContent = result.message;
            messageElement.style.color = 'red';
        }
        
    } catch (error) {
        alert('Error:', error);
        alert('There was an error submitting the form.');
    }
});
</script>

    <!-- <script src="categories.js"></script> -->
</body>
</html>