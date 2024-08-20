const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

// Add this to your existing script.js

// Function to fetch and display recent articles
function fetchRecentArticles() {
    // This would typically be an API call to your backend
    console.log("Fetching recent articles...");
}

// Function to update dashboard statistics
function updateDashboardStats() {
    // This would typically be an API call to your backend
    console.log("Updating dashboard statistics...");
}

// Call these functions when the page loads
document.addEventListener('DOMContentLoaded', (event) => {
    fetchRecentArticles();
    updateDashboardStats();
});