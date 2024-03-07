<?php
// Database configuration

//$servername = $_SERVER['SERVER_ADDR'];
$servername = $_ENV['MYSQL_ROOT_HOST'];

// Create connection
$conn = new mysqli($servername, $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get login form data
    $susername = $_POST['loginUsername'];
    $spassword = $_POST['loginPassword'];

    // Prepare and execute SQL statement to select user data from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $susername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
	    $row = $result->fetch_assoc();
	    if ($spassword == $row['password']) {
            // Password is correct, login successful
		    // echo "Login successful";
            session_start();
	    $_SESSION['authenticated'] = true;
	    $_SESSION['username'] = $susername;
            header("Location: home.php"); 
                exit();
        } else {
            // Incorrect password
            echo "Invalid username or password";
        }
        } 
        else {
             // User not found
        echo "Invalid user";
    }
}

