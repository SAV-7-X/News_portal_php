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

    <title>Users - Admin Dashboard</title>
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
                <input type="text" placeholder="Search users...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-users-alt"></i>
                    <span class="text">All Users</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Users</span>
                        <span class="number" id="totalUsers">0</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-user-check"></i>
                        <span class="text">Active Users</span>
                        <span class="number" id="activeUsers">0</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-user-times"></i>
                        <span class="text">Inactive Users</span>
                        <span class="number" id="inactiveUsers">0</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Users List</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <!-- User names will be inserted here by JavaScript -->
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <!-- User emails will be inserted here by JavaScript -->
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined Date</span>
                        <!-- User joined dates will be inserted here by JavaScript -->
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <!-- User statuses will be inserted here by JavaScript -->
                    </div>
                    <div class="data actions">
                        <span class="data-title">Actions</span>
                        <!-- Action buttons will be inserted here by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="users.js"></script>
    <script src="logout.js"></script>
</body>
</html>
