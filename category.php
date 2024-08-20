<?php
include('check_session.php');
require 'db_connection.php';

// Fetch categories
$stmt = $conn->prepare("SELECT id, name, description FROM categories");
$stmt->execute();
$categories = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$category_count = count($categories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="category.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Manage Categories - Admin Dashboard</title>
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
                <input type="text" placeholder="Search categories...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-apps"></i>
                    <span class="text">Manage Categories</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-apps"></i>
                        <span class="text">Total Categories</span>
                        <span class="number" id="totalCategories"><?php echo htmlspecialchars($category_count);?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-plus-circle"></i>
                    <span class="text">Add New Category</span>
                </div>

                <div class="add-category-form">
                    <form id="categoryForm">
                        <input type="text" id="categoryName" name="name" placeholder="Category Name" required style="border: 2px solid rgba(252, 92, 0, 0.736); background: rgba(222, 135, 135, 0.05);">
                        <textarea id="categoryDescription" name="description" placeholder="Category Description" required style="border: 2px solid rgba(206, 98, 15, 0.736); background: rgba(222, 135, 135, 0.05);""></textarea>
                        <button type="submit">Add Category</button>
                    </form>
                    <div id="message" style="margin-top: 10px;"></div>
                </div>
                <div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl text-blue-900 mb-6 logo_name">Existing Categories</h2>
    <div class="overflow-x-auto">
        <table class="w-full  shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Description</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Article Count</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($categories as $category): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($category['name']); ?></td>
                    <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($category['description']); ?></td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        <?php
                        $stmt = $conn->prepare("SELECT COUNT(*) FROM articles WHERE category_id = ?");
                        $stmt->bind_param("i", $category['id']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        echo $result->fetch_row()[0];
                        ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <button onclick="editCategory(<?php echo $category['id']; ?>)" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded mr-2">Edit</button>
                        <button onclick="deleteCategory(<?php echo $category['id']; ?>)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
    
</div>
<div id="editCategoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" style="z-index: 1000;">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Category</h3>
            <form id="editCategoryForm" class="mt-2 text-left">
                <input type="hidden" id="editCategoryId" name="id">
                <div class="mb-4">
                    <label for="editCategoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" id="editCategoryName" name="name" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="editCategoryDescription" class="block text-sm font-medium text-gray-700">Category Description</label>
                    <textarea id="editCategoryDescription" name="description" required
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                              rows="3"></textarea>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="button" onclick="closeEditModal()"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2">
                        Cancel
                    </button>
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    </section>
   

    <script src="categories.js"></script>
    <script src="logout.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script>
    document.querySelector('form').addEventListener('submit', async function (event) {
    event.preventDefault();

    // Create a FormData object from the form element
    const formData = new FormData(this);
    console.log(formData)
     // Get the message element to display result messages
     const messageElement = document.getElementById('message');

    try {
        // Send the form data using fetch
        const response = await fetch('add_category.php', {
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


//---------------------------------------------------------


function editCategory(id) {
    // Fetch category details and populate the form
    fetch(`get_category.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editCategoryId').value = data.id;
            document.getElementById('editCategoryName').value = data.name;
            document.getElementById('editCategoryDescription').value = data.description;
            document.getElementById('editCategoryModal').style.display = 'block';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to fetch category details');
        });
}

function closeEditModal() {
    document.getElementById('editCategoryModal').style.display = 'none';
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    let modal = document.getElementById('editCategoryModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function deleteCategory(id) {
    if (confirm('Are you sure you want to delete this category?')) {
        fetch(`delete_category.php?id=${id}`, { method: 'DELETE' })
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