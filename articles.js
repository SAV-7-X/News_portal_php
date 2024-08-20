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

// Articles page specific JavaScript
if (document.querySelector('.activity-data')) {
    // Sample article data (replace with actual data from your backend)
    const articles = [
        { id: 1, title: "Breaking News: Major Event", author: "John Doe", date: "2024-08-03", category: "World", status: "Published" },
        { id: 2, title: "Tech Giants Announce Merger", author: "Jane Smith", date: "2024-08-02", category: "Technology", status: "Published" },
        { id: 3, title: "New Climate Change Study", author: "Mike Johnson", date: "2024-08-02", category: "Science", status: "Draft" },
        { id: 4, title: "Sports Team Wins Championship", author: "Sarah Williams", date: "2024-08-01", category: "Sports", status: "Published" },
        { id: 5, title: "Economic Forecast Released", author: "Robert Brown", date: "2024-08-01", category: "Business", status: "Under Review" },
    ];

    function populateArticles() {
        const activityData = document.querySelector('.activity-data');
        const dataColumns = activityData.querySelectorAll('.data');

        articles.forEach(article => {
            dataColumns[0].innerHTML += `<span class="data-list">${article.title}</span>`;
            dataColumns[1].innerHTML += `<span class="data-list">${article.author}</span>`;
            dataColumns[2].innerHTML += `<span class="data-list">${article.date}</span>`;
            dataColumns[3].innerHTML += `<span class="data-list">${article.category}</span>`;
            dataColumns[4].innerHTML += `<span class="data-list">${article.status}</span>`;
            dataColumns[5].innerHTML += `
                <span class="data-list">
                    <button class="edit-btn" onclick="editArticle(${article.id})">Edit</button>
                    <button class="delete-btn" onclick="deleteArticle(${article.id})">Delete</button>
                </span>
            `;
        });

        updateArticleStats();
    }

    function updateArticleStats() {
        document.getElementById('totalArticles').textContent = articles.length;
        document.getElementById('publishedArticles').textContent = articles.filter(a => a.status === "Published").length;
        document.getElementById('draftArticles').textContent = articles.filter(a => a.status === "Draft").length;
    }

    function editArticle(id) {
        console.log(`Editing article with id ${id}`);
        // Implement edit functionality
    }

    function deleteArticle(id) {
        console.log(`Deleting article with id ${id}`);
        // Implement delete functionality
    }

    // Call this function when the page loads
    populateArticles();
}