<?php
session_start();
$host = "localhost";
$db_username = "root";
$db_password = "";
$database = "loan_mg";

$conn = new mysqli($host, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrUsername = $_POST["email"];
    $password = $_POST["password"];

    // Assuming 'username' is the correct column name in your 'admin' table
    $sql = "SELECT * FROM admin WHERE (email = '$emailOrUsername' OR username = '$emailOrUsername') AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['emailOrUsername'] = $emailOrUsername;
        $_SESSION['password'] = $password;
        header("Location: dashboard.php");
        exit();
    } else {
        echo '<script>alert("Login failed. Please check your username/email and password.");</script>';
        echo '<script>window.location.href = "AdminLogin.php";</script>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
 
<div class="login">
    <div class="login-triangle"></div>
    
    <h2 class="login-header">Log in</h2>

    <form class="login-container" method="post" onsubmit="return validateForm()">
        <p><input type="text" placeholder="Email or Username" name="email" id="emailOrUsername"></p>
        <p><input type="password" placeholder="Password" name="password" id="password"></p>
        <p><input type="submit" value="Log in"></p>
    </form>
</div>

<script>
    function validateForm() {  
        var emailOrUsername = document.getElementById("emailOrUsername").value;  
        var password = document.getElementById("password").value;   

        if (emailOrUsername === null || emailOrUsername === "") {  
            alert("Email/Username can't be blank");  
            return false;  
        } else if (password === null || password === "") {  
            alert("Password can't be blank");  
            return false;  
        }

        // Additional validation logic can be added here

        return true;
    }
</script>
</body>
</html>
