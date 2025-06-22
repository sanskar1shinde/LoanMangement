 <?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "loan_mg";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];


        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION['email'] = $email;
            header("Location: UserDash.php");
            exit();
        } 
        else 
        {
            echo '<script>alert("Login failed. Please check your username and password.");</script>';
            echo '<script>window.location.href = "./login.php";</script>';
           // echo '<script>window.location.href = "./UserDash.php";</script>';
            exit();
        }
    }
    
?>