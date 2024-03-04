<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="form-container">
        <form id="signupForm" class="signup-form" action="signup1.php" method="POST" >    
	    <h2>Sign Up</h2>
            <input type="text" id="signupUsername"  name =" signupUsername" placeholder="Username" required autocomplete="off">
            <input type="password" id="signupPassword"name ="signupPassword" placeholder="Password" required>
            <button type="submit">Sign Up</button>
            <p class="message">Already registered? <a href="index.php">Login</a></p>
        </form>
    </div>
</div>



</body>
</html>	
