const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle"),
      sidebar = body.querySelector("nav"),
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if(body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
    } else {
        localStorage.setItem("status", "open");
    }
});

// Users page specific JavaScript
if (document.querySelector('.activity-data')) {
    // Sample user data (replace with actual data from your backend)
    const users = [
        { id: 1, name: "John Doe", email: "john.doe@example.com", joined: "2023-01-01", status: "Active" },
        { id: 2, name: "Jane Smith", email: "jane.smith@example.com", joined: "2023-02-15", status: "Inactive" },
        { id: 3, name: "Mike Johnson", email: "mike.johnson@example.com", joined: "2023-03-10", status: "Active" },
        { id: 4, name: "Sarah Williams", email: "sarah.williams@example.com", joined: "2023-04-05", status: "Inactive" },
        { id: 5, name: "Robert Brown", email: "robert.brown@example.com", joined: "2023-05-20", status: "Active" },
    ];

    function populateUsers() {
        const activityData = document.querySelector('.activity-data');
        const dataColumns = activityData.querySelectorAll('.data');

        users.forEach(user => {
            dataColumns[0].innerHTML += `<span class="data-list">${user.name}</span>`;
            dataColumns[1].innerHTML += `<span class="data-list">${user.email}</span>`;
            dataColumns[2].innerHTML += `<span class="data-list">${user.joined}</span>`;
            dataColumns[3].innerHTML += `<span class="data-list">${user.status}</span>`;
            dataColumns[4].innerHTML += `
                <span class="data-list">
                    <button class="edit-btn" onclick="editUser(${user.id})">Edit</button>
                    <button class="delete-btn" onclick="deleteUser(${user.id})">Delete</button>
                </span>
            `;
        });

        updateUserStats();
    }

    function updateUserStats() {
        document.getElementById('totalUsers').textContent = users.length;
        document.getElementById('activeUsers').textContent = users.filter(u => u.status === "Active").length;
        document.getElementById('inactiveUsers').textContent = users.filter(u => u.status === "Inactive").length;
    }

    function editUser(id) {
        console.log(`Editing user with id ${id}`);
        // Implement edit functionality
    }

    function deleteUser(id) {
        console.log(`Deleting user with id ${id}`);
        // Implement delete functionality
    }

    // Call this function when the page loads
    populateUsers();
}
