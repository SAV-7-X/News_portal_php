<?php
session_start();

// Check if session ID and username are set
if (isset($_SESSION['user_id']) || isset($_SESSION['username'])) {
    header('Location: dashboard.php'); // Redirect to login page
    exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - News Portal</title>
    <link rel="stylesheet" href="login.css">
    <style>
        body {
            background-color: #ecf0f1;
            /* background: url('images/new-4166472_1280.png'); */
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
        .wrapper {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Admin Login</h2>
        <p style="color: rgb(0, 255, 110); margin-top: 10px; margin-bottom: 5px;" id="message"></p>
        <p style="color: red; margin-top: 10px; margin-bottom: 5px;" id="error"></p>
        <form>
            <div class="input-box">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="input-box button">
                <input type="submit" value="Login">
            </div>
            <div class="text">
                <!-- <h3>Don't have an account? <a href="register.html">Register now</a></h3> -->
            </div>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            try {
                const response = await fetch('login.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();
                // Display message
                if (result.message) {
                    document.getElementById('message').innerText = result.message;
                }
                
                // Redirect on successful login
                if (result.message === 'Login successful') {
                    window.location.href = 'dashboard.php'; // Redirect to welcome page
                }
            } catch (error) {
                // Display error message
                document.getElementById('error').innerText = error;
            }
        });
    </script>
</body>
</html>
