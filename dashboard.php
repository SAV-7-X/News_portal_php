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
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>News Portal Admin Dashboard</title>
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
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Articles</span>
                </div>
                <div class="container mx-auto  p-6 rounded-lg ">
                <div class="overflow-x-auto">
                <h2 class="text-2xl text-blue-900 mb-6 logo_name">Existing Articles</h2>
        <table class="w-full shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Category</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($news_articles as $category): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($category['title']); ?></td>
                    <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($category['date']); ?></td>
                    <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($category['status']); ?></td>
                    <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($category['category_id']); ?></td>
                   
                    <td class="px-4 py-3 text-sm flex">
                      
                        <button onclick="deleteCategory(<?php echo $category['id']; ?>)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>

            </div>
        </div>
    </section>

    <script src="dashboard.js"></script>
    <script src="logout.js"></script>
    <script>
function deleteCategory(id) {
    if (confirm('Are you sure you want to delete this category?')) {
        fetch(`delete_article.php?id=${id}`, { method: 'DELETE' })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    alert(result.message);
                    location.reload();
                } else {
                    alert(result.message);
                }
            })
            .catch(error => alert('There was an error deleting the category.'));
    }
}
</script>

</body>
</html>