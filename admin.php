<?php
session_start();

// Check if the user is already logged in, redirect to reservation.php if so
if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: reservation.php");
    exit;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulated credentials, replace with your actual authentication logic
    $username = "admin";
    $password = "password";

    // Check if provided credentials match
    if($_POST["username"] == $username && $_POST["password"] == $password) {
        // Authentication successful, set session variable
        $_SESSION['admin_logged_in'] = true;
        
        // Redirect to reservation.php
        header("Location: reservation.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title><link rel="stylesheet" href="styles.css">

    <style>
     
    </style>
</head>
<body>   
    <header class="header-container">
        <div class="logo-container">
            <a href="index.php">
                <img src="pastedimage-uoln-200h.png" alt="CODEJET:Airlines Logo" class="logo-img">
            </a>
            <span class="logo-text">CODEJET</span>
        </div>
    </header>

    <div class="container">
    <div class="form-container1">
        <!-- Place the image on the left side of the form -->
        <img src="plane.png" alt="Plane" style="float: left; margin-right: 5px; width: 50px; height: 50px;">

        <h2>Admin Login</h2>
        <?php if(isset($error)) echo "<p>$error</p>"; ?>
        <form method="post" class="admin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="coolinput" id="admin">
    <label for="username" class="text">Username:</label>
    <input type="text" id="username" name="username" required class="input"><br><br>
    <label for="password" class="text">Password:</label>
    <input type="password" id="password" name="password" required class="input"><br><br>
</div>
            <button type="submit" onclick="submitForm()">
    <span class="box">Login</span>
</button>

        </form>
    </div>
</div>


</body>
</html>