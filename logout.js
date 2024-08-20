function logout() {
    if (confirm("Are you sure you want to logout?")) {
        fetch('logout.php')
            .then(response => response.text()) // Process response as text
            .then(data => {
                // Optionally handle any additional logic here
                // console.log(response.text());
                window.location.href = 'login_admin.php'
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred. Please try again.");
            });
    }
}