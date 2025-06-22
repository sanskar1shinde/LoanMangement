<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

     $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'loan_mg';

     $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     $sql = "SELECT * FROM admin WHERE username = '$email' or email='$email'";

     $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $adminDetails = $result->fetch_assoc(); 
    } else {
         
        $adminDetails = [];
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the session variable is not set
    $adminDetails = [];
}
?>

<!Doctype html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

 
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
 <link rel="stylesheet" href="css/adstyle.css">

  
 </head>
 <body> 
<div class="wrapper">

    <div class="sidebar">
    <h1 style="color: white;"> Admin</h1>
    <br><br><br><br>
         <ul>
            <li><a href="#" onclick="displaySection('home-section')"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="#" onclick="displaySection('map-section')"><i class="fas fa-eye"></i>Loans</a></li>
            <li><a href="#" onclick="displaySection('about-section')"><i class="fas fa-eye"></i>Requests </a></li>
            <li><a href="#" onclick="displaySection('portfolio-section')"><i class="fas fa-eye"></i>Borrowers</a></li>
            <li><a href="#" onclick="displaySection('blogs-section')"><i class="fas fa-plus"></i>EMI - Calculator </a></li>
            <li><a href="#" onclick="displaySection('contact-section')"><i class="fas fa-plus"></i>Users</a></li>
             

        </ul>
        <div class="social_media">
            <a href="../index.php"><i class="fa fa-power-off"></i> Logout</a>
        </div>
    </div>
            

    <div class="main_content">

            <header class="header1">
                <h1>Welcome to Admin Dashboard</h1>

                
            </header>
            <div class="info" id="home-section1">

            <!-- Home Section -->
                <div id="home-section">
                    <!-- Container for displaying counts -->
                    <div class="count-container">
                        <!-- Box 1: Active Loans -->
                        <div class="count-box">
                            < 
                            <i class="fas fa-users"></i>
                            <h3 style="color:Black">Active Loans</h3>
                            <p>1</p>
                        </div>
                        <!-- Box 2: Requests -->
                        <div class="count-box">
                            <i class="fas fa-users"></i>
                            <h3 style="color:Black">Requests</h3>
                            <p>2</p>
                        </div>
                        <!-- Box 3: Borrowers -->
                        <div class="count-box">
                            <i class="fas fa-shopping-cart"></i>
                            <h3 style="color:Black">Borrowers</h3>
                            <p>3</p>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div id="map-section">
                    <?php
                    // PHP code for fetching and displaying data from the database
                    // Database connection details
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "loan_mg";

                    // Establish connection to the database
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from the database
                    $sql = "SELECT * FROM borrower INNER JOIN loan ON borrower.bid = loan.bid";
                    $result = $conn->query($sql);

                    // Display fetched data in a table
                    if ($result) {
                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo "<tr><th>Borrower ID</th><th>Name</th><th>Email</th><th>Loan Type</th><th>Loan Plan</th><th>Documents</th></tr>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['bid'] . "</td>";
                                echo "<td>" . $row['bname'] . "</td>";
                                echo "<td>" . $row['bemail'] . "</td>";
                                echo "<td>" . $row['ltype'] . "</td>";
                                echo "<td>" . $row['lplan'] . "</td>";
                                echo "<td>";

                                // Display images or document links if they exist
                                if ($row['dsal'] == 1) {
                                    echo "<a href='uploads/" . $row['dsal_filename'] . "' target='_blank'>Salary Slip</a><br>";
                                }
                                // ... (similar conditions for other documents)

                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No records found";
                        }
                    } else {
                        echo "Error: " . $conn->error;
                    }

                    $conn->close();
                    ?>
                </div>

                <!-- Profile Section -->
                <div id="profile-section">
                    <h1>Profile Section</h1>
                </div>

                <!-- About Section -->
                <div id="about-section">
                    <?php
                    // PHP code for fetching and displaying data from the database
                    // Database connection details
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "loan_mg";

                    // Establish connection to the database
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from the database
                    $sql = "SELECT * FROM borrower INNER JOIN loan ON borrower.bid = loan.bid";
                    $result = $conn->query($sql);

                    // Display fetched data in a table
                    if ($result) {
                        if ($result->num_rows > 0) {
                            echo "<table border='1'>";
                            echo "<tr><th>Borrower ID</th><th>Name</th><th>Email</th><th>Loan Type</th><th>Loan Plan</th><th>Documents</th></tr>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['bid'] . "</td>";
                                echo "<td>" . $row['bname'] . "</td>";
                                echo "<td>" . $row['bemail'] . "</td>";
                                echo "<td>" . $row['ltype'] . "</td>";
                                echo "<td>" . $row['lplan'] . "</td>";
                                echo "<td>";

                                // Display images or document links if they exist
                                if ($row['dsal'] == 1) {
                                    echo "<a href='uploads/" . $row['dsal_filename'] . "' target='_blank'>Salary Slip</a><br>";
                                }
                                // ... (similar conditions for other documents)

                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No records found";
                        }
                    } else {
                        echo "Error: " . $conn->error;
                    }

                    $conn->close();
                    ?>
                </div>

                <!-- Portfolio Section -->
                <div id="portfolio-section">
                    <h1>Borrower</h1>
                </div>

            <div id="blogs-section">
            <h1>EMI Calculator</h1> 
                <div class="container5">
                    <h1>Loan Calculator</h1>
                    <div class="wrapper5">
                        <div>
                            <p>Loan Amount (₹)</p>
                            <input id="amount" type="number">
                        </div>
                        <div>
                            <p>Interest Rate(%)</p>
                            <input id="interest" type="number">
                        </div>
                        <div>
                            <p>Tenure(in months)</p>
                            <input id="tenure" type="number">
                        </div>
                    </div>
                    <h2 id="emi"></h2>
                    <h2 id="totalAmount"></h2>
                    <h2 id="totalInterest"></h2>
                </div>
                <script>
                    window.onload = () =>{
                        const inputs = document.querySelectorAll("input");

                        inputs.forEach(input => {
                            input.addEventListener('change',calculateLoan)
                        })
                    }

                    function calculateLoan () {
                        const principal  = document.querySelector('#amount').value;
                        const interestRate = document.querySelector('#interest').value;
                        const tenure = document.querySelector('#tenure').value;

                        if(!principal || !interestRate || !tenure) return;  

                        const monthlyInterest = interestRate / 100 / 12;
                        const emi = principal * monthlyInterest * Math.pow(1 + monthlyInterest,tenure) /  (Math.pow(1 + monthlyInterest,tenure)-1);

                        const totalAmount = emi * tenure;
                        const totalInterest = totalAmount - principal;

                        document.querySelector('#emi').innerText = 'EMI: ₹' + emi.toFixed(2);
                        document.querySelector('#totalAmount').innerText = 'Total Amount ₹' + totalAmount.toFixed(2);
                        document.querySelector('#totalInterest').innerHTML = 'Total Interest ₹' + totalInterest.toFixed(2);


    
}
                    </script>
            </div>
            <div id="contact-section">
                <h1>user</h1> 
            </div>
             
</div>

<script>
    function displaySection(sectionId) {
    // Get all section elements
    const sections = document.getElementsByClassName('info')[0].children;

    // Hide all sections initially
    for (let i = 0; i < sections.length; i++) {
        sections[i].style.display = 'none';
    }

    // Display the selected section when clicked
    if (sectionId) {
        const selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }
    } else {
        // Display the "Dashboard" section by default
        const dashboardSection = document.getElementById('dashboard');
        if (dashboardSection) {
            dashboardSection.style.display = 'block';
        }
    }
}

 
    </script>

    </body>
</html>