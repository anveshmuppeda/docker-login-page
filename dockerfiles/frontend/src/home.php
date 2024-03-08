<?php
// Check if the user is authenticated
session_start();
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    // User is not authenticated, redirect to login page
    header("Location: index.php");
    exit();
}

// Get the username from the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to the Home Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        color: #333;
    }
    .username {
        text-align: center;
        margin-bottom: 20px;
    }
    .username span {
        font-weight: bold;
        color: #007bff;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Welcome to the Home Page</h1>
    <div class="username">Logged in as: <span><?php echo htmlspecialchars($username); ?></span></div>

    <!-- Your home page content goes here -->
    <p> Thank you from Team Aplha </p>
</div>

</body>
</html>

