<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loan_mg";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     

     
    $checkQuery = "SELECT email FROM user WHERE email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Username already exists, display an alert
        echo '<script>alert("USER already exists. Please try with another username.");</script>';
    } else {
        // Username is unique, proceed to insert the data
        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === true) {
             
            echo '<script>alert("Account created successfully!");</script>';
            echo '<script>window.location.href = "./login.php";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>